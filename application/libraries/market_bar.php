<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 13/02/13
 * Time: 22:45
 *
 * Name : market_location.php
 * Description : *
 */

class Market_bar
{
    private $CI;

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct()
    {
        $this->CI =& get_instance();

        //  Chargement des ressources pour tout le contrôleur
        $this->CI->load->model('Location_model');
        $this->CI->load->model('Igb_model');
        $this->CI->load->model('Eve_market_model');

        $this->CI->layout->add_js('select2-3.4.1/select2.min');
        $this->CI->layout->add_css_('javascript/select2-3.4.1/select2');
        $this->CI->layout->add_js('marketBar');
        $this->CI->layout->add_css('marketBar');
    }


    public function render()
    {
        $data['selectedLocation'] = $this->CI->Eve_market_model->get_location();

        $locationDb = $this->CI->Location_model->get_all_regions_and_systems();
        $data['location'][0]['name'] = 'All';
        foreach($locationDb as $loc){
            $regionId = $loc->regionID;
            $regionName = $loc->regionName;
            $systemId = $loc->solarSystemID;
            $systemName = $loc->solarSystemName;

            $data['location'][$regionId]['name'] = $regionName;
            $data['location'][$regionId]['systems'][$systemId] = $systemName;
        }

        $data['igb'] = $this->CI->Igb_model->igb_detect();

        //  On charge la vue
        return $this->CI->load->view('market_location/default_view', $data, true);
    }
}

/* End of file market_location.php */
