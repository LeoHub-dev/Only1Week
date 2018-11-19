<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends LH_Controller {

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
		redirect('/dashboard' ,'refresh');
		if($this->Auth_model->isLoggedIn())
		{
			$this->scope['head_title'] = 'Chat';
			$this->scope['page_title'] = 'Chat';
			$this->scope['menu_active'] = 'chat';
			$this->scope['chat_log'] = $this->Chat_model->getChat();
			$this->load->view('Chat_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}


	public function send()
	{
		redirect('/dashboard' ,'refresh');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if ($this->form_validation->run('chat') == FALSE)
        	{
        		response_bad(validation_errors());
        		return;
        	}
        	else
        	{
				if(empty($this->input->post('textMessage')))
				{
					response_bad('Mensaje Vacio.');
					return FALSE;
				}

				$this->Chat_model->setMessage(htmlspecialchars($this->input->post('textMessage')));
				$this->Chat_model->setFrom($this->session->userdata('id_user'));

				if($this->Chat_model->sendMessage())
				{
					response_good(false,false);
					return TRUE;
				}
				else
				{
					response_bad('Error enviando.');
					return FALSE;
				}
			
	        	return FALSE;
	        }
		}
	}

	public function chatlog()
	{
		redirect('/dashboard' ,'refresh');
		$chat = $this->Chat_model->getChat();
		echo json_encode($chat);
	}
}
