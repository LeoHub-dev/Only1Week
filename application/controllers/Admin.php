<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends LH_Controller {

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

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        if($this->session->userdata('level') != 1)
        {
        	redirect('/signin' ,'refresh');
        }

    }

    public function test()
    {
    	$this->Admin_model->setMoney();
    }

	public function index()
	{
		
		if($this->Auth_model->isLoggedIn())
		{

			$this->scope['head_title'] = 'Admin Panel';
			$this->scope['page_title'] = 'Panel Administrativo';
			$this->scope['user_list'] = $this->Admin_model->getUserList();
			
			$this->load->view('Admin_users_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}


	public function users()
	{
		if($this->Auth_model->isLoggedIn())
		{

			$this->scope['head_title'] = 'Admin Panel';
			$this->scope['page_title'] = 'Panel Administrativo';
			$this->scope['user_list'] = $this->Admin_model->getUserList();
			
			$this->load->view('Admin_users_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}


	public function notifications()
	{
		if($this->Auth_model->isLoggedIn())
		{

			$this->scope['head_title'] = 'Admin Panel';
			$this->scope['page_title'] = 'Panel Administrativo';
			$this->scope['admin_notifications'] = $this->Admin_model->getAdminNotifications();
			
			$this->scope['admin_payments_info'] = $this->Admin_model->getPayments();

			$this->scope['admin_payments_list'] = $this->Admin_model->getFullInvoiceData();

			$this->scope['admin_payments_users'] = $this->Admin_model->getFullUsersMoneyData();

			$this->scope['admin_list_cycle_payment'] = $this->Admin_model->getUserCyclePayment();
			
			$this->load->view('Admin_notifications_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function tables()
	{
		if($this->Auth_model->isLoggedIn())
		{

			$this->scope['head_title'] = 'Admin Panel';
			$this->scope['page_title'] = 'Panel Administrativo';
			$this->scope['user_list'] = $this->Admin_model->getUserList();
			$this->scope['cycle_list'] = $this->Admin_model->getActiveCycleAll();
			$this->scope['table_1_list'] = $this->Admin_model->getTable1List();
			$this->scope['table_2_list'] = $this->Admin_model->getTable2List();
			
			$this->load->view('Admin_tables_view',$this->scope);
		}
		else
		{
			redirect('/signin' ,'refresh');
		}
	}

	public function addcycle()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{

				$table_id_1 = NULL;
				$table_id_2 = NULL;
				$table_id_3 = NULL;
				$table_id_4 = NULL;

        		$cycle_user = (!empty($this->input->post('cycle_user'))) ? $this->input->post('cycle_user') : FALSE;

        		if(!$cycle_user) { response_bad('Error - no se pudo ingresar la mesa'); return FALSE;}

        		if($this->input->post('table_1_active') == 1)
        		{
        			$table_1_father = (!empty($this->input->post('table_1_1_father'))) ? $this->input->post('table_1_1_father') : NULL;
        			$table_1_child_1_active = $this->input->post('table_1_1_child_1_active');
        			$table_1_child_2 = (!empty($this->input->post('table_1_1_child_2'))) ? $this->input->post('table_1_1_child_2') : NULL;
        			$table_1_child_2_active = $this->input->post('table_1_1_child_2_active');
        			$table_1_child_3 = (!empty($this->input->post('table_1_1_child_3'))) ? $this->input->post('table_1_1_child_3') : NULL;
        			$table_1_child_3_active = $this->input->post('table_1_1_child_3_active');
        			$table_active = $this->input->post('table_1_1_active');


        			$table_id_1 = $this->Admin_model->addTable(1,$table_1_father,$cycle_user,$table_1_child_1_active,$table_1_child_2,$table_1_child_2_active,$table_1_child_3,$table_1_child_3_active,$table_active);
        		}

        		if($this->input->post('table_2_active') == 1)
        		{

        			$table_2_child_1 = (!empty($this->input->post('table_1_2_child_1'))) ? $this->input->post('table_1_2_child_1') : NULL;
        			$table_2_child_1_active = $this->input->post('table_1_2_child_1_active');
        			$table_2_child_2 = (!empty($this->input->post('table_1_2_child_2'))) ? $this->input->post('table_1_2_child_2') : NULL;
        			$table_2_child_2_active = $this->input->post('table_1_2_child_2_active');
        			$table_2_child_3 = (!empty($this->input->post('table_1_2_child_3'))) ? $this->input->post('table_1_2_child_3') : NULL;
        			$table_2_child_3_active = $this->input->post('table_1_2_child_3_active');
        			$table_active = $this->input->post('table_1_2_active');


        			$table_id_2 = $this->Admin_model->addTable(1,$cycle_user,$table_2_child_1,$table_2_child_1_active,$table_2_child_2,$table_2_child_2_active,$table_2_child_3,$table_2_child_3_active,$table_active);
        		}

        		if($this->input->post('table_3_active') == 1)
        		{
        			$table_3_father = (!empty($this->input->post('table_2_1_father'))) ? $this->input->post('table_2_1_father') : NULL;
        			$table_3_child_1_active = $this->input->post('table_2_1_child_1_active');
        			$table_3_child_2 = (!empty($this->input->post('table_2_1_child_2'))) ? $this->input->post('table_2_1_child_2') : NULL;
        			$table_3_child_2_active = $this->input->post('table_2_1_child_2_active');
        			$table_active = $this->input->post('table_2_1_active');

        			$table_id_3 = $this->Admin_model->addTable(2,$table_3_father,$cycle_user,$table_3_child_1_active,$table_3_child_2,$table_3_child_2_active,$table_active);
        		}

        		if($this->input->post('table_4_active') == 1)
        		{
        			$table_4_child_1 = (!empty($this->input->post('table_2_2_child_1'))) ? $this->input->post('table_2_2_child_1') : NULL;
        			$table_4_child_1_active = $this->input->post('table_2_2_child_1_active');
        			$table_4_child_2 = (!empty($this->input->post('table_2_2_child_2'))) ? $this->input->post('table_2_2_child_2') : NULL;
        			$table_4_child_2_active = $this->input->post('table_2_2_child_2_active');
        			$table_active = $this->input->post('table_2_2_active');

        			$table_id_4 = $this->Admin_model->addTable(2,$cycle_user,$table_4_child_1,$table_4_child_1_active,$table_4_child_2,$table_4_child_2_active,$table_active);
        		}


        		$cycle = $this->Admin_model->addCycle($cycle_user,$table_id_1,$table_id_2,$table_id_3,$table_id_4);

				if($cycle)
				{
					response_good('Ciclo agregado','El ciclo se agrego, ingrese las tablas',array('cycle_id' => $cycle));
				}
				else
				{
					response_bad('Error - no se pudo ingresar la mesa');
				}
				
			}
		}
	}

	public function addtable()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if ($this->form_validation->run('admin_table') == FALSE)
	        	{
	        		response_bad(validation_errors());
	        	}
	        	else
	        	{
	        		$father = (!empty($this->input->post('father'))) ? $this->input->post('father') : NULL;
	        		$child_1 = (!empty($this->input->post('child_1'))) ? $this->input->post('child_1') : NULL;
	        		$child_2 = (!empty($this->input->post('child_2'))) ? $this->input->post('child_2') : NULL;
	        		$child_3 = (!empty($this->input->post('child_3'))) ? $this->input->post('child_3') : NULL;

	        		$tabla_id = $this->Admin_model->addTable($this->input->post('type'),$father,$child_1,$child_2,$child_3);

					if($tabla_id)
					{
						if($this->input->post('table_n') == 1)
						{
							$this->db->where('id_cycle', $this->input->post('cycle_id'));
        					$query_insertusertotable = $this->db->update('cycle', array('table_1' => $tabla_id));
						}
						if($this->input->post('table_n') == 2)
						{
							$this->db->where('id_cycle', $this->input->post('cycle_id'));
        					$query_insertusertotable = $this->db->update('cycle', array('table_2' => $tabla_id));
						}
						if($this->input->post('table_n') == 3)
						{
							$this->db->where('id_cycle', $this->input->post('cycle_id'));
        					$query_insertusertotable = $this->db->update('cycle', array('table_3' => $tabla_id));
						}
						if($this->input->post('table_n') == 4)
						{
							$this->db->where('id_cycle', $this->input->post('cycle_id'));
        					$query_insertusertotable = $this->db->update('cycle', array('table_4' => $tabla_id));
						}
						response_good('Tabla agregada','La tabla ha sido agregada correctamente');
					}
					else
					{
						response_bad('Error - no se pudo ingresar la mesa');
					}
				}
			}
		}
	}

	

	public function adduser()
	{
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if ($this->form_validation->run('signupAdmin') == FALSE)
        	{
        		response_bad(validation_errors());
        	}
        	else
        	{
        		$this->Auth_model->setName($this->input->post('name'));
        		$this->Auth_model->setUsername($this->input->post('username'));
        		$this->Auth_model->setEmail($this->input->post('email'));
	        	$this->Auth_model->setPassword(myHash($this->input->post('password')));
	        	$this->Auth_model->setBitcoin($this->input->post('bitcoinaddress'));
        		$this->Auth_model->setRef($this->input->post('ref'));
        		$this->Auth_model->setSkype($this->input->post('skype'));

        		

        		$id = $this->Auth_model->register(1);

	        	if($id)
	        	{

	        		response_good('Correcto','Se ha agregado al usuario y se le ha enviado un email.',array('post_data' => $this->input->post(), 'id_user' => $id));

	        		$this->load->model('Mail_model');
        			$this->Mail_model->setTo($this->input->post('email'));
        			$this->Mail_model->setSubject('Only1Week - Correo de confirmacion');
        			$data = array( 
    				"email" => $this->input->post('email'),
    				"hash" => $this->Auth_model->getHash()
    				);

        			//$this->Mail_model->setMessage($data);
        			//$this->Mail_model->sendMail('emailconfirm');
	        	}
	        	else
	        	{
	        		response_bad('Error - intente mas tarde');
	        	}

        	}
        }
	    
	}


	public function load_addressInfo()
    {
    	if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$address =  $this->input->post('address');

	    		if($address && !empty($address))
				{
					response_good(false,false,array('address_info' => $this->Admin_model->loadAddressData($address)));
				}
				else
				{
					response_bad('No carga');
				}
			}
		}
    }


    public function clear_notification()
    {
    	if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$id =  $this->input->post('id');

	    		if($this->Admin_model->clearNotification($id))
				{
					response_good(false,false);
				}
				else
				{
					response_bad('No carga');
				}
			}
		}
    }

    


	public function load_userinfo()
    {
    	if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$user =  $this->input->post('id_user');

	    		if($user && !empty($user))
				{
					response_good(false,false,array('user_info' => $this->Auth_model->getUserFullData($user)));
				}
				else
				{
					response_bad('No carga');
				}
			}
		}
    }

    public function edit_userinfo()
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
	        		if($this->input->post('defaultusername') != $this->input->post('username'))
	        		{
	        			if($this->form_validation->isNotUniqueUsername($this->input->post('username')))
	        			{
	        				response_bad('El usuario ya existe');
	        				return;
	        			}
	        		}

					if($this->Admin_model->editUser($this->input->post()))
					{
						response_good('Usuario editado','Informacion editada',array('posted_data' => $this->input->post()));
					}
					else
					{
						response_bad('Error al editar');
					}
				}
	        	
			}
		}
	}

	public function delete_user()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				

				if($this->Admin_model->deleteUser($this->input->post('id_user')))
				{
					response_good('Usuario eliminado','El usuario ha sido eliminado',array('id_user' =>$this->input->post('id_user')));
				}
				else
				{
					response_bad('Error al editar');
				}
	        	
			}
		}
	}


	public function load_tableinfo()
    {
    	if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$table_id =  $this->input->post('table_id');
				$table_type =  $this->input->post('table_type');

	    		if($table_id && !empty($table_id))
				{

					
					$table = $this->Table_model->getTable($table_type,$table_id);

					

					if($table)
					{

						if($table_type == 1)
						{
							$table_child_1 = ($table->tb1_child_1) ? $this->Auth_model->getUserFullData($table->tb1_child_1) : FALSE;
							$table_child_2 = ($table->tb1_child_2) ? $this->Auth_model->getUserFullData($table->tb1_child_2) : FALSE;
							$table_child_3 = ($table->tb1_child_3) ? $this->Auth_model->getUserFullData($table->tb1_child_3) : FALSE;

							response_good(false,false,array('table_info' => $table, 'table_father_info' => $this->Auth_model->getUserFullData($table->tb1_father), 'table_users_info' => array(1 => $table_child_1, 2 => $table_child_2, 3 => $table_child_3)));
						}
						else
						{
							$table_child_1 = ($table->tb2_child_1) ? $this->Auth_model->getUserFullData($table->tb2_child_1) : FALSE;
							$table_child_2 = ($table->tb2_child_2) ? $this->Auth_model->getUserFullData($table->tb2_child_2) : FALSE;

							response_good(false,false,array('table_info' => $table, 'table_father_info' => $this->Auth_model->getUserFullData($table->tb2_father), 'table_users_info' => array(1 => $table_child_1, 2 => $table_child_2)));
						}
					}
					
				}
				else
				{
					response_bad('No carga');
				}
			}
		}
    }


    public function edit_tableinfo()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				

				if($this->Admin_model->editTable($this->input->post()))
				{
					if($this->Table_model->ifTableIsActive($this->input->post('edit_table_id'),$this->input->post('edit_table_type')))
					{
						$this->Table_model->autoSortUsers();
					}
					response_good('Mesa editada','La informacion de la mesa ha sido editada',array('posted_data' => $this->input->post()));
				}
				else
				{
					response_bad('Error al editar');
				}
	        	
			}
		}
	}


	public function delete_table()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				

				if($this->Admin_model->deleteTable($this->input->post('table_type'),$this->input->post('table_id')))
				{
					response_good('Mesa eliminada','La mesa ha sido asignada y todos los integrantes de la misma han vuelto al sistema',array('id_user' =>$this->input->post('id_user')));
				}
				else
				{
					response_bad('Error al editar');
				}
	        	
			}
		}
	}

	public function delete_cycle()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				

				if($this->Admin_model->deleteCycle($this->input->post('id_cycle')))
				{
					response_good('Ciclo eliminado','El ciclo ha sido eliminado');
				}
				else
				{
					response_bad('Error al borrar');
				}
	        	
			}
		}
	}

	public function mark_as_paid()
	{
		if($this->Auth_model->isLoggedIn())
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				

				if($this->Admin_model->markPaid($this->input->post('id_paid_cycle')))
				{
					response_good('El estado ha cambiado','Se cambio el estado a pagado');
				}
				else
				{
					response_bad('Error al cambiar estado');
				}
	        	
			}
		}
	}



}
