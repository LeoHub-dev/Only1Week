<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends LH_Controller {

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

			$this->scope['cantidad_referidos'] = $this->Cuenta_model->cantidadReferidosUsuario($this->session->userdata('id_usuario'));

			$this->load->view('Perfil_view',$this->scope);
		}
		else
		{
			redirect('/login' ,'refresh');
		}
	}

	public function editar()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				if($this->scope['info_usuario']->usuario != $this->input->post('usuario'))
        		{
        			if($this->form_validation->noEsUnUsuarioUnico($this->input->post('usuario')))
        			{
        				response_bad('El usuario ya existe');
        				return;
        			}
        		}

        		if(empty($this->input->post('image')))
				{
					response_bad('Imagen vacia');
					return;
				}

				if($this->Auth_model->editarUsuario($this->input->post(),$this->scope['info_usuario']->id_persona))
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

	public function uploadimg()
	{
		$output_dir = './assets/img/users/';

		if(isset($_FILES["imgPerfil"]))
		{
			$ret = array();
			
			//	This is for custom errors;	
			/*	$custom_error= array();
				$custom_error['jquery-upload-file-error']="File already exists";
				echo json_encode($custom_error);
				die();
			*/

			$error = $_FILES["imgPerfil"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData() 

			if(!is_array($_FILES["imgPerfil"]["name"])) //single file
			{
				$ext = pathinfo($_FILES["imgPerfil"]["name"], PATHINFO_EXTENSION);
		 	 	$fileName = myHash($_FILES["imgPerfil"]["name"]).'.'.$ext;
		 	 	$nh = 0;

		 	 	if(file_exists($output_dir.$fileName))
		 	 	{
		 	 		$fileName = $nh.$fileName;

		 	 		while(file_exists($output_dir.$fileName))
			        {
			            $fileName = $nh.$fileName;
			            $nh++;
			        }
		 	 	}
		 	 	
		 		move_uploaded_file($_FILES["imgPerfil"]["tmp_name"],$output_dir.$fileName);
		    	$ret[] = $fileName;
			}
			else  //Multiple files, file[]
			{
			  $fileCount = count($_FILES["imgPerfil"]["name"]);

			  for($i=0; $i < $fileCount; $i++)
			  {

			  	$fileName = $_FILES["imgPerfil"]["name"][$i];

			  	$nh = 0;

		 	 	if(file_exists($output_dir.$fileName))
		 	 	{
		 	 		$fileName = $nh.$fileName;

		 	 		while(file_exists($output_dir.$fileName))
			        {
			            $fileName = $nh.$fileName;
			            $nh++;
			        }
		 	 	}
		 	 	
				move_uploaded_file($_FILES["imgPerfil"]["tmp_name"][$i],$output_dir.$fileName);
			  	$ret[]= $fileName;
			  }
			
			}

		    echo json_encode($ret);
	 	}
	}

	


}
