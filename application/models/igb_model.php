<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : igb_model.php
 * Description : *
 */
class Igb_model extends CI_Model
{
    public function get_location()
    {
        //if($this->IGBRequireTrust()){
            $loc['stationID'] = $_SERVER['HTTP_EVE_STATIONID'];
            $loc['solarSystemID'] = $_SERVER['HTTP_EVE_SOLARSYSTEMID'];

            return $loc;
        //}

        //return false;
    }

    public function igb_detect()
    {
        return array_key_exists('HTTP_EVE_TRUSTED', $_SERVER);
    }

    /*private function IGBRequireTrust()
    {
        if($_SERVER['HTTP_EVE_TRUSTED'] != 'yes')
        {
            header('eve.trustMe:http://' . $_SERVER['HTTP_HOST'] . '/::This site needs trust to geolocation.');
            return false;
        }

        return true;
    } */
}

/* End of file igb_model.php */
