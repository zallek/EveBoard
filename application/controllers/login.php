<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 08/08/13
 * Time: 17:38
 *
 * Name : login.php
 * Description : *
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Api_eve_model');

        $this->load->library('character_bar');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        show_404();
    }

    // ------------------------------------------------------------------------

    //AJAX function
    public function logging()
    {
        $keyID = $this->input->post('keyID');
        $vCode = $this->input->post('vCode');

        $res = $this->Api_eve_model->logging($keyID, $vCode);
        if($res){ //Login OK
            echo $this->character_bar->render();
        }
        else {
            return false;
        }
    }
}

/* End of file login.php */