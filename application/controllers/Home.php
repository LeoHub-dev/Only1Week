<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends LH_Controller {

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

		$this->load->view('Home_view',$this->scope);
		
	}

	public function suscription()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			if($this->form_validation->run('suscription') == FALSE)
        	{
        		echo json_encode(array('response' => false, 'errors' => validation_errors()));
        	}
        	else
        	{

				$data = array( 
				"email" => $this->input->post('email')
				);

				$query = $this->db->insert('suscription',$data); 

		        if($query)
		        {
		            echo json_encode(array('response' => true, 'response_title' => 'Listo', 'response_text' => 'Has sido agregado a la lista de noticias.'));
		        }
		        else
		        {
		            echo json_encode(array('response' => false, 'errors' => 'Error - intente mas tarde'));
		        }  
			}
		}
	}

	/*public function leer()
	{

		$inputFile = "C:\Users\Leonardo Jimenez\Documents\#CosasDeLeo\#Trabajando\#Only1Week\#Datos Final\datosfinal.xls";
		

		$this->Core_model->leer($inputFile);



		
	}

	public function revisarref()
	{
		$inputFile = "C:\Users\Leonardo Jimenez\Documents\#CosasDeLeo\#Trabajando\#Only1Week\#Datos Final\datosfinal.xls";
		

		$this->Core_model->revisarReferidos($inputFile);
	}

	public function agregarextra()
	{
		//$inputFile = "http://only1week.es/assets/preregistrados.xls";
		$inputFile = "./assets/preregistrados.xls";
		

		$this->Core_model->agregarextra($inputFile);
	}

	public function agregarextra()
	{
		//$inputFile = "http://only1week.es/assets/preregistrados.xls";
		//$inputFile = "C:\Users\Leonardo Jimenez\Documents\#CosasDeLeo\#Trabajando\#Only1Week\#TodoFinal\preregistrados2.xls";
		$inputFile = "./assets/preregistrados2.xls";
		

		$this->Core_model->agregarextra2($inputFile);
	}

	public function autosort()
	{
		$this->Table_model->autoSortUsers();
	}*/

	public function autosort()
	{
		$this->Table_model->autoSortUsers();
		response_good(FALSE,FALSE);
	}

	public function autoclear()
	{
		$this->Table_model->clearUnpaid();
	}

	public function william()
	{
		echo myHash('password123');
	}

	public function autonumber()
	{
		$this->db->select('*');
        $this->db->where('id_user >','459');
        $query = $this->db->get('auth_users');
        $count = 0;
        if($query->num_rows() > 0)
        {
        	foreach ($query->result() as $row)
            {

            	$data_user = array(
	                'n_order' => $count
	            );

            	$user_status = $this->db->update('auth_users', $data_user, array('id_user' => $row->id_user));

            	$count++;

            }
        }
	}

}
