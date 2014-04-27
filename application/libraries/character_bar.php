<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 13/02/13
 * Time: 22:45
 *
 * Name : login.php
 * Description : *
 */

class Character_bar
{
    private $CI;
    //'2417605', 'wCwdID4OPOmNYLm0ZORyPejHZAVPpXGd5iwWNXCr70E60nJEUseY5TrxBoLmtdHn'

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->model('Api_eve_model');

        $this->CI->layout->add_js('characterBar');
        $this->CI->layout->add_css('characterBar');
    }


    public function render()
    {
        if(!$this->CI->Api_eve_model->logged())
        {
            return $this->CI->load->view('character_bar/logging_view', null, true);
        }
        else
        {
            $characters = $this->CI->Api_eve_model->get_characters();
            $data['characters'] = $characters;
            return $this->CI->load->view('character_bar/logged_view', $data, true);
        }
    }
}

/* End of file login.php */
