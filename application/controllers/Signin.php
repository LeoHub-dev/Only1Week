<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends LH_Controller {

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
			$this->scope['head_title'] = 'Sign in';

			
	        
			
			$this->load->view('Signin_view',$this->scope);
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
	}

	public function login()
	{
		if(!$this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				/*response_bad('Sistema En pausa - Pronto volveremos a estar disponibles');
				return;*/

				if ($this->form_validation->run('login') == FALSE)
	        	{
	        		response_bad(validation_errors());
	        	}
	        	else
	        	{
	        		$this->Auth_model->setUsername($this->input->post('username'));
		        	$this->Auth_model->setPassword(myHash($this->input->post('password')));

		        	if($this->Auth_model->login())
		        	{
		        		response_good(false,false);

		        		redirect('/dashboard' ,'refresh');
		        	}
		        	else
		        	{
		        		response_bad('Error contraseña incorrecta');
		        	}
	        	}
	        }
	    }
	    else
	    {
	    	redirect('/dashboard' ,'refresh');
	    }
	}

	public function confirm($id = NULL)
	{
		if($id == NULL)
		{
			redirect('/signin' ,'refresh');
		}

		if($this->Auth_model->isConfirmedHash($id))
		{
			$this->session->set_flashdata('notification', array(
			'type' => 'info',
			'title' => 'Cuenta ya confirmada',
			'content' => 'La cuenta ya esta confirmada'
			));
			$this->Table_model->autoSortUsers();
			redirect('/signin' ,'refresh');
		}
		else
		{
			if($this->Auth_model->confirmAccount($id))
			{
				$this->session->set_flashdata('notification', array(
				'type' => 'success',
				'title' => 'Cuenta confirmada',
				'content' => 'La cuenta se ha verificado correctamente'
				));
				$this->Table_model->autoSortUsers();
				redirect('/signin' ,'refresh');
			}
		}
	}

    public function forgotpw()
    {
    	if(!$this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if($this->form_validation->isNotUniqueMail($this->input->post('email')))
				{
					if($this->Auth_model->forgotPassword($this->input->post('email')))
					{
						response_good(false,'A email has been send');
					}
				}
				else
				{
					response_bad('Email no existe');
				}
			}
		}
		else
		{
			response_bad('Estas conectado');
		}
    }

    public function resetpassword()
	{
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$password = $this->input->post('password');
			$password_confirm = $this->input->post('confirm_password');
			$hash = $this->input->post('hash');
			$email = $this->input->post('email');

			if($password == $password_confirm)
			{
				if($this->Auth_model->newPassword($password,$hash,$email))
				{
					$this->session->set_flashdata('notification', array(
					'type' => 'success',
					'title' => 'Contraseña editada',
					'content' => 'La contraseña ha sido editada'
					));
					redirect('/signin' ,'refresh');
				}
				else
				{
					$this->session->set_flashdata('notification', array(
					'type' => 'success',
					'title' => 'Error',
					'content' => 'Error al cambiar contraseña'
					));

					redirect('/resetpassword?hash='.$hash.'$email='.$email ,'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('notification', array(
				'type' => 'success',
				'title' => 'Error',
				'content' => 'Las contraseñas no son iguales'
				));
				redirect('/resetpassword?hash='.$hash.'$email='.$email ,'refresh');
			}
		}
		else
		{
			$this->scope['hash'] = $this->input->get('hash');
			$this->scope['email'] = $this->input->get('email');

			if($this->Auth_model->verifyForgot($this->scope['hash'],$this->scope['email']))
			{
				$this->load->view('Forgot_view',$this->scope);
			}
			else
			{
				echo 'No se ha pedido recuperacion';
			}
		}
	}

    

}
