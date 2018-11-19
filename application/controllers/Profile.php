<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends LH_Controller {

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
			$this->scope['head_title'] = 'Perfil';
			$this->scope['page_title'] = 'Perfil';
			$this->load->view('Profile_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function edit()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if($this->form_validation->run('edituser') == FALSE)
	        	{
	        		response_bad(validation_errors());
	        	}
	        	else
	        	{
	        		if(empty($this->input->post('image')))
					{
						response_bad('Imagen vacia');
						return;
					}

					if($this->Auth_model->editUser($this->input->post(),$this->scope['user_info']['id_user']))
					{
						response_good('Usuario editado','Tu información ha sido editada');
					}
					else
					{
						response_bad('Error al editar (Contraseña incorrecta)');
					}
	        	}
			}
		}
	}


	public function uploadimg()
	{

		$config['upload_path']          = './assets/images/users/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('imgPerfil'))
        {
                $error = array('error' => $this->upload->display_errors());

                $check = array(
                   'ip' => $_SERVER['REMOTE_ADDR'],
                   'reason' => "Error al subir archivo ID: ".$this->scope['user_info']['id_user'].$this->upload->display_errors()
                );

                $this->db->insert('admin_check',$check); 

      
            echo json_encode($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                echo json_encode($data['upload_data']['file_name']);
        }
	}

}
