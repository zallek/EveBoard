<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 21:59
 *
 * Name : market.php
 * Description : *
 */
class Market extends CI_Controller
{
    public function __construct()
    {
        //parent::Controller();
        parent::__construct();

        $this->load->library('market_bar');
        $this->load->library('character_bar');

        $this->load->model('Eve_market_model');
        $this->load->model('Api_eve_model');
    }

    public function get_stats($typeId)
    {
        if(!isset($typeId) || !is_integer($typeId))  //reconnu comme string ?
        {
           // return false;
        }
        $stats = $this->Eve_market_model->get_market_stat($typeId);

        $data['stats'] = $stats;

        $this->layout->add_rendered_fixed($this->market_bar->render(), true);
        $this->layout->add_view_content('market/stats_view', $data);
    }

    public function get_assets()
    {
        if($this->Api_eve_model->logged()){
            $assets = $this->Api_eve_model->get_assets();

            $this->load->model('Location_model');
            $this->load->model('Eve_type_model');

            foreach($assets as $asset){
                //Location
                $loc = $this->Location_model->get_all_systems($asset['locationID']);
                $asset['locationID'] = null;
                $asset['stationID'] = $loc[0]->stationID;
                $asset['stationName'] = $loc[0]->stationName;
                $asset['solarSystemID'] = $loc[0]->solarSystemID;
                $asset['solarSystemName'] = $loc[0]->solarSystemName;
                $asset['regionID'] = $loc[0]->regionID;
                $asset['regionName'] = $loc[0]->regionName;

                //Market information
                /*$market = $this->Eve_market_model->get_market_stat($asset['typeID']);
                $asset['sell']['min'] = $market->sell->min;
                $asset['sell']['max'] = $market->sell->max;
                $asset['sell']['avg'] = $market->sell->avg;
                $asset['sell']['median'] = $market->sell->median;  */

                //Item information
                $type = $this->Eve_type_model->get_type($asset['typeID']);
                $asset['typeName'] = $type->typeName;
                $asset['allowRecycler'] = $type->allowRecycler;
                $asset['groupID'] = $type->groupID;
                $asset['categoryID'] = $type->categoryID;

                //Refine
                /*$refinePrice = 0;
                $refine = $this->Eve_type_model->get_refined_materials($asset['typeID']);
                foreach($refine as $r){
                    $price = $this->Eve_market_model->get_market_stat($r->materialTypeID);
                    $price = $price->sell->min;
                    $refinePrice += ($price*$r->quantity);
                }
                $asset['refinedPrice'] = $refinePrice;

                $asset['shouldRefine'] = ($refinePrice > $asset['sell']['min']) ? 'Oui' : '-'; */
            }

            uasort($assets, 'ascendingOrder');
            debug_var($assets);
            $data['assets'] = $assets;

            $this->layout->add_rendered_fixed($this->market_bar->render(), true);
            $this->layout->add_rendered_fixed($this->character_bar->render(), true);
            $this->layout->add_view_content('market/assets_view', $data);
        }
        else {
            $this->layout->add_rendered_fixed($this->market_bar->render(), true);
            $this->layout->add_rendered_fixed($this->character_bar->render(), true);
            $this->layout->add_view_content('market/error_must_be_logged');
        }
    }

    function ascendingOrder($x, $y)
    {
        if ( $x->groupID == $y->groupID )
            return 0;
        else if ( $x->groupID < $y->groupID )
            return -1;
        else
            return 1;
    }
}

/* End of file market.php */