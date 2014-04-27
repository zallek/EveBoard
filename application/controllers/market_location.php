<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:59
 *
 * Name : market_location.php
 * Description : *
 */

class Market_location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Igb_model');
        $this->load->model('Eve_market_model');
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        show_404();
    }

    // ------------------------------------------------------------------------

    //AJAX function
    public function geolocation(){
        $loc = $this->Igb_model->get_location();

        if(!$loc){
            $this->Eve_market_model->set_location($loc['solarSystemID']);
        }
    }

    //AJAX function
    public function set_location(){
        $newLoc = $this->input->post('loc');
        $this->Eve_market_model->set_location($newLoc);
    }
}


/* End of file market_location.php */
