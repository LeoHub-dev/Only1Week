<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ref extends LH_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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

            $ref = $this->Auth_model->getUserNormalData($this->input->get('c'));

            if($ref)
            {
                $this->session->set_userdata('ref',$this->input->get('c'));
            }
            
            redirect('/signup' ,'refresh');
        }
        else
        {
            redirect('/home' ,'refresh');
        }
    }

}
