<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends LH_Controller {

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

	//public $scope;

	public function index()
	{
		if(!$this->Auth_model->isLoggedIn())
		{
			$this->scope['head_title'] = 'Sign up';

			if($this->session->userdata('ref'))
	        {
	            $this->scope['ref_code'] = $this->session->userdata('ref');
	        }
	        
			$this->load->view('Signup_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
	}

	public function register()
	{
		if(!$this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if ($this->form_validation->run('signup') == FALSE)
	        	{
	        		response_bad(validation_errors());
	        	}
	        	else
	        	{
	        		$this->Auth_model->setName($this->input->post('name'));
	        		$this->Auth_model->setUsername($this->input->post('username'));
	        		$this->Auth_model->setEmail($this->input->post('email'));
		        	$this->Auth_model->setPassword(myHash($this->input->post('password')));
		        	$this->Auth_model->setRepassword(myHash($this->input->post('repassword')));
		        	$this->Auth_model->setBitcoin($this->input->post('bitcoinaddress'));
	        		$this->Auth_model->setRef($this->input->post('ref'));
	        		$this->Auth_model->setSkype($this->input->post('skype'));


		        	if($this->Auth_model->register(1))
		        	{

		        		response_good('Correcto','Ya puede ingresar a su cuenta. (En tu email tambien deberias recibir tu informacion)');


		        		$this->Table_model->autoSortUsers();

		        		$this->load->model('Mail_model');
	        			$this->Mail_model->setTo($this->input->post('email'));
	        			$this->Mail_model->setSubject('Only1Week - Bienvenida');
	        			$data = array( 
        				"usuario" => $this->input->post('username'),
        				"password" => $this->input->post('password')
        				);

	        			$this->Mail_model->setMessage($data);
	        			$this->Mail_model->sendMail_None('emailconfirm');
		        	}
		        	else
		        	{
		        		response_bad('Error - intente mas tarde');
		        	}

	        	}
	        }
	    }
	}

}
