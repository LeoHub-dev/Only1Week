<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends LH_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->Auth_model->isLoggedIn())
		{
			$this->load->library('Coinbase');
			$this->scope['head_title'] = 'Donaciones';
			$this->scope['page_title'] = 'Donaciones';
			$this->scope['donations_list'] = $this->coinbase->getUserDonationsHistory($this->session->userdata('id_user'));
			$this->scope['system_donations_list'] = $this->Auth_model->getSystemPaymentsHistory($this->session->userdata('id_user'));
			$this->load->view('Donation_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}


	public function get_coinbase_hash()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$this->load->library('Coinbase');

				$this->coinbase->setIdUser($this->input->post('id_user'));
				$this->coinbase->setTableType($this->input->post('table_type'));
				$this->coinbase->setIdTable($this->input->post('id_table'));
				$this->coinbase->setNChild($this->input->post('n_child'));
				$this->coinbase->setTableFather($this->input->post('table_father'));

				if($this->coinbase->dataIsOk())
				{
					$invoice_id = $this->coinbase->createCoinBaseInvoice();
					$payment_info_address = $this->coinbase->coinBaseAddress($invoice_id);

					$payment_amount = ($this->input->post('table_type') == 1) ? '0.03' : '0.09';

					response_good(FALSE,FALSE,array('data' => $payment_info_address, 'payment_amount' => $payment_amount));

				}
				
			}
		}
	}

	public function verify_payment($payment = NULL)
	{
		$this->load->library('Coinbase');
		$response = $this->coinbase->verifyPayment($payment);

		if($response || $response == 0)
		{
			response_good(FALSE,FALSE,array('amount_paid' => $response));
		}
		else
		{
			response_bad('Error al verificar');
		}

	}

	public function verify_coinbase_notifications()
	{
		$this->load->library('Coinbase');
		$this->coinbase->verifyNotifications();
	}

	public function verify_all_payments()
	{
		$this->load->library('Coinbase');
		$this->coinbase->verifyAllPayments();
	}

	public function coinbase_callback()
	{
		$this->load->library('Coinbase');

		$data = file_get_contents('php://input');
		$signature = $_SERVER['HTTP_CB_SIGNATURE'];

		$this->coinbase->callback($data,$signature);

	}

	public function coinbase_notifications()
	{
		$this->load->library('Coinbase');

		$notifications = $this->coinbase->getNotificationsList();

		foreach ($notifications as $notification) {
			echo '<br>Nombre : '.$notification->getData()->getName();
			echo '<br>Direccion donde se dono '.$notification->getData()->getAddress();
			echo '<br>Id de la notificacion '.$notification->getId();
			echo '<br>Hash de la transaccion '.$notification->getAdditionalData()['hash'];
			echo '<br>Monto de la transaccion '.$notification->getAdditionalData()['amount']['amount'];
			echo '<br>Id de la transaccion '.$notification->getAdditionalData()['transaction']['id'];

			//var_dump($notification);
		}

	}

	public function coinbase_notification($id)
	{
		$this->load->library('Coinbase');


		$notification = $this->coinbase->getNotification($id);

		
		echo '<br>Nombre : '.$notification->getData()->getName();
		echo '<br>Direccion donde se dono '.$notification->getData()->getAddress();
		echo '<br>Id de la notificacion '.$notification->getId();
		echo '<br>Hash de la transaccion '.$notification->getAdditionalData()['hash'];
		echo '<br>Monto de la transaccion '.$notification->getAdditionalData()['amount']['amount'];
		echo '<br>Id de la transaccion '.$notification->getAdditionalData()['transaction']['id'];

	}

	public function get_blockchain_hash()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$this->load->library('Blockchain');

				$this->blockchain->setIdUser($this->input->post('id_user'));
				$this->blockchain->setTableType($this->input->post('table_type'));
				$this->blockchain->setIdTable($this->input->post('id_table'));
				$this->blockchain->setNChild($this->input->post('n_child'));

				if($this->blockchain->dataIsOk())
				{
					$invoice_id = $this->blockchain->createBlockChainInvoice();
					$payment_info_address = $this->blockchain->blockChainAddress($invoice_id);
				}
				
			}
		}
	}

	public function blockchain_callback()
	{
		$this->load->library('Blockchain');

		$invoice_id = $this->input->get('invoice_id');
		$transaction_hash = $this->input->get('transaction_hash');
		$address = $this->input->get('address');
		$secret = $this->input->get('secret');
		$confirmations = $this->input->get('confirmations');
		$value = $this->input->get('value');

		$this->blockchain->callback($invoice_id,$value,$transaction_hash,$address,$secret,$confirmations);

	}


}
