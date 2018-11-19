<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\HttpClient;
use Coinbase\Wallet\Mapper;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Psr\Http\Message\ResponseInterface;

class Coinbase
{

    /** @var \PHPUnit_Framework_MockObject_MockObject|HttpClient */
    private $http;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Mapper */
    private $mapper;

    /** @var Client */
    private $client;

    /** @var Client */
    private $account;

    private $cb;

    private $id_user;
    private $table_type;
    private $id_table;
    private $n_child;
    private $table_father;

    private $coinbase_secret;
    private $coinbase_apikey;

    public function setCB($n)
    {
        $this->cb = $n;
    }

    public function setIdUser($id)
    {
        $this->id_user = $id;
    }

    public function setTableType($type)
    {
        $this->table_type = $type;
    }

    public function setIdTable($id)
    {
        $this->id_table = $id;
    }

    public function setNChild($n)
    {
        $this->n_child = $n;
    }

    public function setTableFather($id)
    {
        $this->table_father = $id;
    }
	
    public function __construct()
    {
        // Call the CI_Model constructor
        $this->config->load('coinbase_config');

        // Call the CI_Model constructor
        $this->config->load('coinbase_config');

        if(!$datacb = $this->Auth_model->getUserFullData($this->session->userdata('id_user')))
        {
            $this->cb = 0;
        }

        $this->cb = $datacb->cb;

        $this->cb = 0;

        $this->coinbase_secret = $this->config->item('coinbase_secret');
        $this->coinbase_apikey = $this->config->item('coinbase_apikey');

        //$configuration = Configuration::apiKey($this->coinbase_apikey, $this->coinbase_secret);

        $configuration = Configuration::apiKey($this->coinbase_apikey[$this->cb], $this->coinbase_secret[$this->cb]);
        
        $this->client = Client::create($configuration);
        $this->account = $this->client->getPrimaryAccount();
        //$this->mapper = $this->getMock(Mapper::class);

        
    }

    public function dataIsOk()
    {
        if($this->table_type == 1)
        {
            $this->db->where('id_table_one',$this->id_table);

            if($this->n_child < 4 && is_numeric($this->n_child))
            {
                $this->db->where('tb1_child_'.$this->n_child,$this->id_user);
            }
            
            $query = $this->db->get('table_one');

            if($query->num_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }  
        }
        else
        {
            $this->db->where('id_table_two',$this->id_table);

            if($this->n_child < 3 && is_numeric($this->n_child))
            {
                $this->db->where('tb2_child_'.$this->n_child,$this->id_user);
            }
            
            $query = $this->db->get('table_two');

            if($query->num_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            } 
        }
          
    }

    public function createCoinBaseInvoice()
    {

        $coinbase_invoice_search = array(
           'id_user' => $this->id_user,
           'table_type' => $this->table_type,
           'id_table' => $this->id_table,
           'n_child' => $this->n_child,
           'table_father' => $this->table_father
        );

        $coinbase_invoice = array(
           'id_user' => $this->id_user,
           'table_type' => $this->table_type,
           'id_table' => $this->id_table,
           'n_child' => $this->n_child,
           'table_father' => $this->table_father
        );

        if($this->table_type == 1)
        {
            $coinbase_invoice = array('total_to_pay' => 0.03) + $coinbase_invoice;
        }

        if($this->table_type == 2)
        {
            $coinbase_invoice = array('total_to_pay' => 0.09) + $coinbase_invoice;
        }

        $this->db->where($coinbase_invoice_search);

        $coinbase_address = $this->db->get('coinbase_invoice');

        if($coinbase_address->num_rows() > 0)
        {
            foreach($coinbase_address->result() as $invoice)
            {
                return $invoice->id_invoice;
            }
        }
        else
        {
            $this->db->insert('coinbase_invoice',$coinbase_invoice); 

            return $this->db->insert_id();
        }

    }

    public function createCoinbaseAddress($name = NULL)
    {

        $address = new Address([
            'name' => $name
        ]);

        $address_info = $this->client->createAccountAddress($this->account, $address);

        if($address_info)
        {
            return $address_info->getAddress();
        }
        else
        {
            return FALSE;
        }
    }

    public function coinBaseAddress($id_invoice)
    {

        $this->db->where('id_invoice',$id_invoice);

        $coinbase_address = $this->db->get('coinbase_address');

        if($coinbase_address->num_rows() == 0)
        {
            $coinbase_unused_address = $this->db->get('coinbase_unused_address',1);

            if($coinbase_unused_address->num_rows() > 0)
            {
                foreach($coinbase_unused_address->result() as $address)
                {
                    $coinbase_invoice = array(
                       'id_invoice' => $id_invoice,
                       'address' => $address->address,
                       'datetime' => date('Y-m-d H:i:s')
                    );

                    $this->db->where('id_address', $address->id_address);
                    $this->db->delete('coinbase_unused_address');
                }
            }
            else
            {
                $coinbase_invoice_address = $this->createCoinbaseAddress('Invoice numero '.$id_invoice);

                $coinbase_invoice = array(
                   'id_invoice' => $id_invoice,
                   'address' => $coinbase_invoice_address,
                   'coinbase_address_datetime' => date('Y-m-d H:i:s')
                );
            }
            
            $query = $this->db->insert('coinbase_address',$coinbase_invoice); 

            return (object) $coinbase_invoice;
        }
        else
        {
            foreach ($coinbase_address->result() as $row)
            {
                $data = array(
                'id_invoice' => $row->id_invoice,
                'address'=> $row->address
                );

                return (object) $data;
            }
        }
        return FALSE;
    }

    public function verifyNotifications()
    {
        $notifications_list = $this->getNotificationsList();
        foreach ($notifications_list as $notification) 
        {
            $this->db->select('*');
            $this->db->where('coinbase_payments.id_notification',$notification->getId());
            $this->db->from('coinbase_payments');

            $query_payments = $this->db->get();

            if($query_payments->num_rows() > 0)
            {
                foreach ($query_payments->result() as $payments)
                {
                }
            }
            else
            {
                $coinbase_invoice = array(
                   'name' => $notification->getData()->getName(),
                   'address' => $notification->getData()->getAddress(),
                   'id_notification' => $notification->getId(),
                   'id_transaction' => $notification->getAdditionalData()['transaction']['id'],
                   'hash_transaction' => $notification->getAdditionalData()['hash'],
                   'amount' => $notification->getAdditionalData()['amount']['amount']
                );
            
                
                $query = $this->db->insert('coinbase_payments',$coinbase_invoice); 

            }
        }
    }

    public function verifyAllPayments()
    {
        $this->db->select('*');
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_coinbase = $this->db->get();

        if($query_coinbase->num_rows() > 0)
        {
            foreach ($query_coinbase->result() as $invoice_data)
            {

                $this->db->select('*');
                $this->db->where('coinbase_payments.address',$invoice_data->address);
                $this->db->from('coinbase_payments');

                $query_payments = $this->db->get();

                $total_paid = 0;

                if($query_payments->num_rows() > 0)
                {
                    foreach ($query_payments->result() as $payments)
                    {
                        $total_paid = $total_paid + floatval($payments->amount);
                    }
                }


                if(floatval($invoice_data->total_to_pay) <= floatval($total_paid))
                {
                    
                    $this->Table_model->activeTableUser($invoice_data->table_father,$invoice_data->id_user,$invoice_data->id_table,$invoice_data->table_type);

                    $this->db->where('id_invoice', $invoice_data->id_invoice);
                    $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));

                    if($this->Table_model->ifTableIsActive($invoice_data->id_table,$invoice_data->table_type))
                    {
                        $this->Table_model->autoSortUsers();
                    }
                }
            }
        }
    }


    public function callback($data,$signature)
    {
        if($this->client->verifyCallback($data, $signature))
        {
            $info = json_decode($data);
            $invoice_data = FALSE;

            $this->db->select('*');
            $this->db->where('coinbase_address.address',$info->data->address);
            $this->db->from('coinbase_invoice');
            $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

            $query_coinbase = $this->db->get();

            if($query_coinbase->num_rows() > 0)
            {
                foreach ($query_coinbase->result() as $coinbase_invoice)
                {
                    $invoice_data = $coinbase_invoice;
                }
            }

            if(!$invoice_data)
            {
                return FALSE;
            }

            $this->db->select('*');
            $this->db->where('coinbase_payments.address',$info->data->address);
            $this->db->from('coinbase_payments');

            $query_payments = $this->db->get();

            $total_paid = 0;

            if($query_payments->num_rows() > 0)
            {
                foreach ($query_payments->result() as $payments)
                {
                    $total_paid = $total_paid + $payments->amount;
                }
            }

            $total_paid = floatval($info->additional_data->amount->amount) + $total_paid;

            if(floatval($invoice_data->total_to_pay) <= floatval($total_paid))
            {
                
                $this->Table_model->activeTableUser($invoice_data->table_father,$invoice_data->id_user,$invoice_data->id_table,$invoice_data->table_type);

                $this->db->where('id_invoice', $invoice_data->id_invoice);
                $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));

                if($this->Table_model->ifTableIsActive($invoice_data->id_table,$invoice_data->table_type))
                {
                    $this->Table_model->autoSortUsers();
                }
            }

            $coinbase_invoice = array(
               'name' => $info->data->name,
               'address' => $info->data->address,
               'id_notification' => $info->id,
               'id_transaction' => $info->additional_data->transaction->id,
               'hash_transaction' => $info->additional_data->hash,
               'amount' => $info->additional_data->amount->amount
            );
        
            
            $query = $this->db->insert('coinbase_payments',$coinbase_invoice); 

        }

        
    }

    public function verifyPayment($address)
    {
        
        $this->db->select('*');
        $this->db->where('coinbase_address.address',$address);
        $this->db->where('coinbase_invoice.status',0);
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_coinbase = $this->db->get();

        $invoice_data = FALSE;

        if($query_coinbase->num_rows() > 0)
        {
            foreach ($query_coinbase->result() as $coinbase_invoice)
            {
                $invoice_data = $coinbase_invoice;
            }
        }

        if(!$invoice_data)
        {
            return FALSE;
        }

        $this->db->select('*');
        $this->db->where('coinbase_payments.address',$address);
        $this->db->from('coinbase_payments');

        $query_payments = $this->db->get();

        $total_paid = 0;

        if($query_payments->num_rows() > 0)
        {
            foreach ($query_payments->result() as $payments)
            {
                $total_paid = $total_paid + $payments->amount;
            }
        }

        if(floatval($invoice_data->total_to_pay) <= floatval($total_paid))
        {

            
            $this->Table_model->activeTableUser($invoice_data->table_father,$invoice_data->id_user,$invoice_data->id_table,$invoice_data->table_type);

            $this->db->where('id_invoice', $invoice_data->id_invoice);
            $query_activeuser = $this->db->update('coinbase_invoice', array('status' => 1));

            if($this->Table_model->ifTableIsActive($invoice_data->id_table,$invoice_data->table_type))
            {
                $this->Table_model->autoSortUsers();
            }
            
            return $total_paid;
        }

        return $total_paid;
        
    }

    public function getNotificationsList()
    {

        $list_notifications = $this->client->getNotifications();

        return $list_notifications;
    }

    public function getNotification($id)
    {
        $notification = $this->client->getNotification($id);

        return $notification;
    }

    public function getUserDonationsHistory($id_user)
    {
        $this->db->select('*');
        $this->db->where('coinbase_invoice.id_user',$id_user);
        $this->db->or_where('coinbase_invoice.table_father',$id_user);
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_payments = $this->db->get();

        $n = 0;

        $list_payments = NULL;

        if($query_payments->num_rows() > 0)
        {
            foreach ($query_payments->result() as $coinbase_invoice)
            {
                $list_payments[$n]['invoice'] = $coinbase_invoice;

                $this->db->select('*');
                $this->db->where('coinbase_payments.address',$coinbase_invoice->address);
                $this->db->from('coinbase_payments');

                $query_paid = $this->db->get();

                $total_paid = 0;

                if($query_paid->num_rows() > 0)
                {
                    foreach ($query_paid->result() as $paid)
                    {
                        $total_paid = $total_paid + $paid->amount;
                    }
                }

                $list_payments[$n]['paid'] = $total_paid;

                $n++;


            }
        }

        return $list_payments;

    }


    



    public function store_unused_address()
    {
        $this->db->select('*');
        $this->db->where('coinbase_invoice.status',1);
        $this->db->or_where('coinbase_invoice.status', 4);
        $this->db->from('coinbase_invoice');
        $this->db->join('invoice', 'coinbase_address.id_invoice = coinbase_invoice.id_invoice', 'left');
        $query_coinbase = $this->db->get();

        if($query_coinbase->num_rows() > 0)
        {
            foreach ($query_blockchain->result() as $coinbase_invoice)
            {
                $actual_datetime = new DateTime();
                $coinbaseinvoice_datetime = new DateTime($coinbase_invoice->datetime);
                $coinbaseinvoice_datetime->modify('+15 minutes');

                if($actual_datetime >= $blockinvoice_datetime)
                {
                    $this->db->select('*');
                    $this->db->where('id_invoice',$coinbase_invoice->id_invoice);
                    $this->db->from('coinbase_invoice_payments');

                    $query_coinbasepayments = $this->db->get();

                    if($query_coinbasepayments->num_rows() <= 0)
                    {
                        $this->db->where('id_invoice', $coinbase_invoice->id_invoice);
                        $this->db->delete('coinbase_invoice');

                        $data = array(
                           'address' => $coinbase_invoice->address
                        );

                        $this->db->insert('coinbase_unused_address',$data); 
                    }
                }
            }
        }
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

}
?>