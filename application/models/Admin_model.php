<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

    public function getUserList()
    {

        $query_user = $this->db->get('auth_users'); //Ciclos de X usuario

        if($query_user->num_rows() > 0)
        {
            foreach ($query_user->result() as $user)
            {
                $list[$user->id_user] = $user;
            }
        }

        return $list;

    }

    public function getActiveCycleAll()
    {
        $this->db->where('cycle_active',0);

        $query_cycle = $this->db->get('cycle');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $list_cycles_active[] = $cycle;
            }

            return $list_cycles_active;
        }

        return FALSE;
    }

    public function getTable1List()
    {

        $query_table = $this->db->get('table_one'); //Ciclos de X usuario

        if($query_table->num_rows() > 0)
        {
            foreach ($query_table->result() as $table)
            {
                $list[$table->id_table_one] = $table;
            }
        }

        return $list;

    }

    public function getTable2List()
    {

        $query_table = $this->db->get('table_two'); //Ciclos de X usuario

        if($query_table->num_rows() > 0)
        {
            foreach ($query_table->result() as $table)
            {
                $list[$table->id_table_two] = $table;
            }
        }

        return $list;

    }


    public function editUser($post)
    {

        $data_user = array(
            'name' => $post['name'],
            'username' => $post['username'],
            'bitcoin_wallet' => $post['bitcoinaddress']
        );

        $data_user = array('active' => $post['status']) + $data_user;

        $data_user = array('donation' => $post['donation']) + $data_user;
        

        if(isset($post['ref']) && !empty($post['ref']))
        {
            $data_user = array('ref' => $post['ref']) + $data_user;
        }

        if(isset($post['skype']) && !empty($post['skype']))
        {
            $data_user = array('skype' => $post['skype']) + $data_user;
        }

        if(isset($post['image']) && !empty($post['image']))
        {
            $data_user = array('profile_image' => $post['image']) + $data_user;
        }

        if(isset($post['email']) && !empty($post['email']))
        {
            $data_user = array('email' => $post['email']) + $data_user;
        }

     

        
        if(isset($post['password']) && !empty($post['password']) && $post['default_password'] != $post['password'])
        {
            $data_user = array('password' => myHash($post['password'])) + $data_user;
        }

        $user_status = $this->db->update('auth_users', $data_user, array('id_user' => $post['id']));

        $user_id = $this->db->insert_id();

        if($user_status)
        {
            return TRUE;
        }
        
        return FALSE;
    }


    public function deleteUser($id)
    {
        $query = $this->db->delete('auth_users', array('id_user' => $id));

        if($query)
        {
            return TRUE;
        }

        return FALSE;

    }

    public function editTable($post)
    {
        if($post['edit_table_type'] == 1)
        {

            if($post['edit_table_cycle'] == 'table_1')
            {
                if($post['tb1_father'] != $post['tb1_father_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_1' => NULL), array('table_1' => $post['edit_table_id'], 'cycle_user' => $post['tb1_father_default'], 'id_cycle' => $post['edit_cycle_id']) );
                }

                if($post['tb1_child_1'] != $post['tb1_child_1_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_1' => NULL), array('table_1' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_1_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb1_child_2'] != $post['tb1_child_2_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_1' => NULL), array('table_1' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_2_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb1_child_3'] != $post['tb1_child_3_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_1' => NULL), array('table_1' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_3_default'], 'id_cycle' => $post['edit_cycle_id']));
                }
            }

            if($post['edit_table_cycle'] == 'table_2')
            {
                if($post['tb1_father'] != $post['tb1_father_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_2' => NULL), array('table_2' => $post['edit_table_id'], 'cycle_user' => $post['tb1_father_default'] , 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb1_child_1'] != $post['tb1_child_1_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_2' => NULL), array('table_2' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_1_default'] , 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb1_child_2'] != $post['tb1_child_2_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_2' => NULL), array('table_2' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_2_default'] , 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb1_child_3'] != $post['tb1_child_3_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_2' => NULL), array('table_2' => $post['edit_table_id'], 'cycle_user' => $post['tb1_child_3_default'], 'id_cycle' => $post['edit_cycle_id']));
                }
            }

            


            $data_table = array(
                'tb1_father' => $post['tb1_father'],
                'tb1_child_1' => (!empty($post['tb1_child_1'])) ? $post['tb1_child_1'] : NULL,
                'tb1_child_2' => (!empty($post['tb1_child_2'])) ? $post['tb1_child_2'] : NULL,
                'tb1_child_3' => (!empty($post['tb1_child_3'])) ? $post['tb1_child_3'] : NULL,
                'tb1_child_1_active' => $post['tb1_child_1_active'],
                'tb1_child_2_active' => $post['tb1_child_2_active'],
                'tb1_child_3_active' => $post['tb1_child_3_active'],
                'tb1_active' => $post['tb1_active']
            );

            $table_status = $this->db->update('table_one', $data_table, array('id_table_one' => $post['edit_table_id']));


            if($table_status)
            {
                return TRUE;
            }
            
            return FALSE;
        }
        else
        {
            if($post['edit_table_cycle'] == 'table_3')
            {
                if($post['tb2_father'] != $post['tb2_father_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_3' => NULL), array('table_3' => $post['edit_table_id'], 'cycle_user' => $post['tb2_father_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb2_child_1'] != $post['tb2_child_1_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_3' => NULL), array('table_3' => $post['edit_table_id'], 'cycle_user' => $post['tb2_child_1_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb2_child_2'] != $post['tb2_child_2_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_3' => NULL), array('table_3' => $post['edit_table_id'], 'cycle_user' => $post['tb2_child_2_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

            }

            if($post['edit_table_cycle'] == 'table_4')
            {
                if($post['tb2_father'] != $post['tb2_father_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_4' => NULL), array('table_4' => $post['edit_table_id'], 'cycle_user' => $post['tb2_father_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb2_child_1'] != $post['tb2_child_1_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_4' => NULL), array('table_4' => $post['edit_table_id'], 'cycle_user' => $post['tb2_child_1_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

                if($post['tb2_child_2'] != $post['tb2_child_2_default'])
                {
                    $remove_from_cycle = $this->db->update('cycle', array('table_4' => NULL), array('table_4' => $post['edit_table_id'], 'cycle_user' => $post['tb2_child_2_default'], 'id_cycle' => $post['edit_cycle_id']));
                }

            }
            
            $data_table = array(
                'tb2_father' => $post['tb2_father'],
                'tb2_child_1' => (!empty($post['tb2_child_1'])) ? $post['tb2_child_1'] : NULL,
                'tb2_child_2' => (!empty($post['tb2_child_2'])) ? $post['tb2_child_2'] : NULL,
                'tb2_child_1_active' => $post['tb2_child_1_active'],
                'tb2_child_2_active' => $post['tb2_child_2_active'],
                'tb2_active' => $post['tb2_active']
            );

            $table_status = $this->db->update('table_two', $data_table, array('id_table_two' => $post['edit_table_id']));


            if($table_status)
            {
                return TRUE;
            }
            
            return FALSE;

        }
    }

   
        

    public function addTable($type,$father,$child_1 = NULL,$child_1_active = 0,$child_2 = NULL,$child_2_active = 0,$child_3 = NULL,$child_3_active = 0,$table_active = 0)
    {
        if($type == 1)
        {
            $data = array(
               'tb1_father' => $father,
               'tb1_child_1' => $child_1,
               'tb1_child_1_active' => $child_1_active,
               'tb1_child_2' => $child_2,
               'tb1_child_2_active' => $child_2_active,
               'tb1_child_3' => $child_3,
               'tb1_child_3_active' => $child_3_active,
               'tb1_active' => $table_active
            );

            $query = $this->db->insert('table_one',$data); 

            if($query)
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }  
        }
        else if($type == 2)
        {
            $data = array(
               'tb2_father' => $father,
               'tb2_child_1' => $child_1,
               'tb2_child_1_active' => $child_1_active,
               'tb2_child_2' => $child_2,
               'tb2_child_2_active' => $child_2_active,
               'tb2_active' => $table_active
            );

            $query = $this->db->insert('table_two',$data); 

            if($query)
            {
                return $this->db->insert_id();
            }
            else
            {
                return FALSE;
            }  
        }
        
    }

    public function addCycle($cycle_user,$table_1,$table_2 = NULL,$table_3 = NULL,$table_4 = NULL)
    {
        $data = array(
           'cycle_user' => $cycle_user,
           'table_1' => $table_1,
           'table_2' => $table_2,
           'table_3' => $table_3,
           'table_4' => $table_4
        );

        $query = $this->db->insert('cycle',$data); 

        if($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }  
    }


    public function deleteTable($type,$id)
    {
        if($type == 1)
        {
            
            $query = $this->db->delete('table_one', array('id_table_one' => $id));

            if($query)
            {
                return TRUE;;
            }
            else
            {
                return FALSE;
            }  
        }
        else if($type == 2)
        {
            $query = $this->db->delete('table_two', array('id_table_two' => $id));

            if($query)
            {
                return TRUE;;
            }
            else
            {
                return FALSE;
            }
        }

        
        return FALSE;

    }

    public function deleteCycle($id)
    {
        $query = $this->db->delete('cycle', array('id_cycle' => $id));

        if($query)
        {
            return TRUE;
        }

        return FALSE;

    }


    public function setMoney()
    {
        $this->db->where('tb1_active',0);

        $query_table = $this->db->get('table_one');

        if($query_table->num_rows() > 0)
        {
            foreach ($query_table->result() as $table)
            {

                if($table->tb1_child_1_active == 1)
                {
                    $this->Auth_model->addMoney($table->tb1_father,0.03,'Un usuario te ha realizado una donacion');
                }

                if($table->tb1_child_2_active == 1)
                {
                    $this->Auth_model->addMoney($table->tb1_father,0.03,'Un usuario te ha realizado una donacion');
                }

                if($table->tb1_child_3_active == 1)
                {
                    $this->Auth_model->addMoney($table->tb1_father,0.03,'Un usuario te ha realizado una donacion');
                }
                
            }
        }

        $this->db->where('tb2_active',0);

        $query_table = $this->db->get('table_two');

        if($query_table->num_rows() > 0)
        {
            foreach ($query_table->result() as $table)
            {
                if($table->tb2_child_1_active == 1)
                {
                    $this->Auth_model->addMoney($table->tb2_father,0.09,'Un usuario te ha realizado una donacion');
                }

                if($table->tb2_child_2_active == 1)
                {
                    $this->Auth_model->addMoney($table->tb2_father,0.09,'Un usuario te ha realizado una donacion');
                }
            }
        }
    }


    public function getAdminNotifications()
    {
        $this->db->select('*');
        $this->db->where('status',0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('admin_notification');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $not[] = $row;
            }
        }
        

        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('admin_notification');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $not[] = $row;
            }
        }

        return $not; 
    }

    public function getPayments()
    {
        $this->db->select('*');
        $query = $this->db->get('coinbase_payments');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $payments[$row->address][] = $row;
            }
        }
        else
        {
            return FALSE;
        }

        return $payments;
    }

    public function clearNotification($id_notification)
    {
        $status = $this->db->update('admin_notification', array('status' => 1), array('id' => $id_notification));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }


    public function getFullInvoiceData()
    {
        $this->db->select('*');
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_payments = $this->db->get();

        $n = 0;

        $list_payments = NULL;

        if($query_payments->num_rows() > 0)
        {
            foreach ($query_payments->result() as $coinbase_invoice)
            {

                $list_payments[$n]['invoice']['info'] = $coinbase_invoice;
                $list_payments[$n]['invoice']['father'] = $this->Auth_model->getUserFullData($coinbase_invoice->table_father);
                $list_payments[$n]['invoice']['user'] = $this->Auth_model->getUserFullData($coinbase_invoice->id_user);
                $list_payments[$n]['invoice']['table'] = $this->Table_model->getTable($coinbase_invoice->table_type,$coinbase_invoice->id_table);

                $this->db->select('*');
                $this->db->where('coinbase_payments.address',$coinbase_invoice->address);
                $this->db->from('coinbase_payments');

                $query_paid = $this->db->get();

                $total_paid = 0;

                if($query_paid->num_rows() > 0)
                {
                    foreach ($query_paid->result() as $paid)
                    {
                        $list_payments[$n]['payments'][] = $paid;
                    }
                }

                $list_payments[$n]['paid'] = $total_paid;

                $n++;


            }
        }

        return $list_payments;

    }

    public function getFullUsersMoneyData()
    {
        $this->db->select('*');
        $this->db->from('auth_users');
        $query_users = $this->db->get();

        $n = 0;
        $list_user_money = NULL;

        if($query_users->num_rows() > 0)
        {
            foreach ($query_users->result() as $user)
            {

                $list_user_money[$n]['info'] = $user;
                $money = 0;

                

                $this->db->select('*');
                $this->db->where('system_payments.payment_to',$user->id_user);
                $this->db->from('system_payments');

                $query_paid = $this->db->get();

                if($query_paid->num_rows() > 0)
                {
                    foreach ($query_paid->result() as $paid)
                    {
                        $money = $money + $paid->amount;
                    }
                }

                $this->db->select('*');
                $this->db->where('system_debt.debt_from',$user->id_user);
                $this->db->from('system_debt');

                $query_paid = $this->db->get();

                if($query_paid->num_rows() > 0)
                {
                    foreach ($query_paid->result() as $paid)
                    {
                        $money = $money - $paid->amount;
                    }
                }

                $list_user_money[$n]['money'] = $money;

                $n++;

                

            }
        }

        return $list_user_money;

    }

    public function getUserCyclePayment()
    {
        $this->db->select('*');
        $this->db->order_by('status', 'ASC');
        $this->db->from('system_user_payment');
        $query_cycle = $this->db->get();

        $n = 0;
        $list_user_money = NULL;
        

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle_notice)
            {

                $this->db->select('*');
                $this->db->where('id_user',$cycle_notice->id_user);
                $this->db->from('auth_users');
                $query_users = $this->db->get();


                if($query_users->num_rows() > 0)
                {
                    foreach ($query_users->result() as $user)
                    {

                        $list_user_money[$n]['data'] = $cycle_notice;
                        $list_user_money[$n]['info'] = $user;
                        $money = 0;

                        $this->db->select('*');
                        $this->db->where('system_payments.payment_to',$user->id_user);
                        $this->db->from('system_payments');

                        $query_paid = $this->db->get();

                        if($query_paid->num_rows() > 0)
                        {
                            foreach ($query_paid->result() as $paid)
                            {
                                $money = $money + $paid->amount;
                            }
                        }

                        $this->db->select('*');
                        $this->db->where('system_debt.debt_from',$user->id_user);
                        $this->db->from('system_debt');

                        $query_paid = $this->db->get();

                        if($query_paid->num_rows() > 0)
                        {
                            foreach ($query_paid->result() as $paid)
                            {
                                $money = $money - $paid->amount;
                            }
                        }

                        $list_user_money[$n]['money'] = $money;

                        $n++;

                    }
                }
            }
        }

        return $list_user_money;
    }



    public function loadAddressData($address)
    {
        $this->db->select('*');
        $this->db->where('address',$address);
        $this->db->from('coinbase_invoice');
        $this->db->join('coinbase_address', 'coinbase_invoice.id_invoice = coinbase_address.id_invoice', 'left');

        $query_payments = $this->db->get();

        $n = 0;

        $payment = NULL;

        if($query_payments->num_rows() > 0)
        {
            foreach ($query_payments->result() as $coinbase_invoice)
            {
                $payment['table_father'] = $this->Auth_model->getUserFullData($coinbase_invoice->table_father);
                $payment['user'] = $this->Auth_model->getUserFullData($coinbase_invoice->id_user);


                $payment['table_type'] = $coinbase_invoice->table_type;
                $payment['table_id'] = $coinbase_invoice->id_table;



            }
        }

        return $payment;

    }

    public function markPaid($id)
    {
        $status = $this->db->update('system_user_payment', array('status' => 1), array('id_sysuserpayment' => $id));

        if($status)
        {
            return TRUE;
        }

        return FALSE;
    }




    ////////////////////SERIO FIN

    

    
   
}
?>