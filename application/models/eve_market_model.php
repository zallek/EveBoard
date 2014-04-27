<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : eveMarket_model.php
 * Description : *
 */
class Eve_market_model extends CI_Model
{
    private $maketSystem = 0;
    private $MARKET_LOCATION_COOKIE = 'market_location';
    private $marketStat_cache;

    public function __construct()
    {
        parent::__construct();

        $this->load->library_load('PHPEVECentral');
        $this->load->library('PHPEveCentral\PHPEveCentral', '', 'php_eve_central');
        $this->load->helper('cookie');
        $this->get_cookie_location();
    }

    private function get_cookie_location(){
        $newSystem = get_cookie($this->MARKET_LOCATION_COOKIE);
        $this->maketSystem = !$newSystem ? 0 : $newSystem;

        return $this->maketSystem;
    }

    public function get_location(){
        return $this->maketSystem;
    }

    public function set_location($loc){
        $cookie = array(
            'name'   => $this->MARKET_LOCATION_COOKIE,
            'value'  => $loc,
            'expire' => '2000000'
        );

        $this->maketSystem = $loc;
        set_cookie($cookie);
    }

    /**
     * @param $typeid
     * @return MarketStat Object
     * MarketStat->buy->volume (double)
     * MarketStat->buy->avg (double)
     * MarketStat->buy->max (double)
     * MarketStat->buy->min (double)
     * MarketStat->buy->stddev (double)
     * MarketStat->buy->median (double)
     * MarketStat->buy->percentile (double)
     * MarketStat->sell (same)
     * MarketStat->all  (same)
     */
    public function get_market_stat($typeid){
        if(!isset($this->marketStat_cache[$typeid])){
            $request = $this->php_eve_central->MarketStat($typeid);
            if($this->maketSystem != 0){
                $request->setUseSystem($this->maketSystem);
            }

            $response = $request->send();
            $res = $response->getType($typeid);
            $this->marketStat_cache[$typeid] = $res;
        }
        else {
            $res = $this->marketStat_cache[$typeid];
        }
        return $res;
    }
}

/* End of file eve_market_model.php */
