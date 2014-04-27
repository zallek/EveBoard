<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 07/08/13
 * Time: 18:04
 *
 * Name : api_eve_model.php
 * Description : *
 */

use Pheal\Pheal;
use Pheal\Core\Config;

class Api_eve_model extends CI_Model
{
    private $api;

    private $KEYID_COOKIE = 'keyID';
    private $VCODE_COOKIE = 'vCode';
    private $CHARACTERID_COOKIE = 'characterID';


    private $keyID;
    private $vCode;
    private $logged = false;

    private $characters;
    private $characterID;


    public function __construct()
    {
        parent::__construct();
        $this->load->library_load('Pheal');
        $this->load->helper('cookie');

        Config::getInstance()->cache = new \Pheal\Cache\FileStorage(APPPATH.'cache\Pheal\\');
        Config::getInstance()->access = new \Pheal\Access\StaticCheck();
        Config::getInstance()->http_ssl_verifypeer = false;
    }

    /**
     * @param String $keyID
     * @param String $vCode
     * @param bool $characterId optional
     * @return bool Failure : false
     */
    public function logging($keyID, $vCode, $characterId = false){
        $this->keyID = $keyID;
        $this->vCode = $vCode;
        $this->api = new Pheal($keyID, $vCode);

        try{
            $this->get_api_characters();
        }
        catch(\Pheal\Exceptions\PhealException $e){  //login failed
            return false;
        }
        set_cookie(array(
            'name'   => $this->KEYID_COOKIE,
            'value'  => $keyID,
            'expire' => '2000000'
        ));
        set_cookie(array(
            'name'   => $this->VCODE_COOKIE,
            'value'  => $vCode,
            'expire' => '2000000'
        ));
        $this->logged = true;
        $this->set_character($characterId);
        return true;
    }

    private function logging_cookie(){
        $keyID = get_cookie($this->KEYID_COOKIE);
        $vCode = get_cookie($this->VCODE_COOKIE);
        $characterId = get_cookie($this->CHARACTERID_COOKIE);

        if($keyID && $vCode && $characterId){
            $this->logging($keyID, $vCode, $characterId);
        }
    }

    public function logged(){
        $this->logging_cookie();
        return $this->logged;
    }

    /**
     * @return bool | Array Tableau des characters
     *  [characterID][characterName] => Tarh Damir
     *  [characterID][characterID] => 93619884
     *  [characterID][corporationName] => Imperial Academy
     *  [characterID][corporationID] => 1000166
     *  [characterID][corporationID] => 1000166
     */
    private function get_api_characters(){
        $response = $this->api->detectAccess();
        $response = $response->key->characters;

        $characters = false;
        foreach($response as $char){
            $id = $char['characterID'];
            foreach($char as $key => $value){ //Formatting : key = id
                $characters[$id][$key] = $value;
            }
            $characters[$id]['portrait_url'] = $this->get_url_character_portrait($id);
        }

        $this->characters = $characters;
    }

    /**
     * @param int $charID
     * @param int $size valid values for size are 30, 32, 64, 128, 200, 256, 512
     * @return string
     */
    private function get_url_character_portrait($charID, $size = 256){
        return 'http://image.eveonline.com/Character/'.$charID.'_'.$size.'.jpg';
    }

    public function get_characters(){
        return $this->characters;
    }

    public function set_character($idx = false){
        if($idx == false){  //if no idx given -> selection of the first character
            $char = reset($this->characters);
        }
        else {
            $char = element($idx, $this->characters);
        }

        if($char != false){ //character exist
            $this->characterID = $char['characterID'];
            $this->api->scope = 'char';
            set_cookie(array(
                'name'   => $this->CHARACTERID_COOKIE,
                'value'  => $this->characterID,
                'expire' => '2000000'
            ));
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @param bool $fitted returns fitted items
     * @return Array $val['locationID']
     *               $val['itemID']
     *               $val['typeID']
     *               $val['quantity']
     *               $val['flag']
     *               $val['contents]   if fitted
     */
    public function get_assets($fitted = false){
        $response = $this->api->AssetList(array("characterID" => $this->characterID));
        $response = $response->_value->assets;

        if(!$fitted){
            foreach($response as $container){
                if(isset($container['contents'])){
                    $container['contents'] = null;
                }
            }
        }

        return $response;
    }
}

/* End of file api_eve_model.php */