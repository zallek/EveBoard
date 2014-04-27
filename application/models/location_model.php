<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : location_model.php
 * Description : *
 */
class Location_model extends CI_Model
{
    private $mapRegions_table = 'mapRegions';
    private $mapSolarSystems_table = 'mapSolarSystems';
    private $staStations_table = 'staStations';

    public function get_all_systems($stationID = null)
    {
        $sta = "";
        if(isset($stationID)) {
            $sta = " WHERE s.stationID = $stationID";
        }

        return $this->db->query(
            "SELECT r.regionID, r.regionName, ss.solarSystemID, ss.solarSystemName, s.stationID, s.stationName
            FROM $this->mapRegions_table r
            JOIN $this->mapSolarSystems_table ss ON r.regionID = ss.regionID
            JOIN $this->staStations_table s ON s.solarSystemID = ss.solarSystemID ".
            $sta)
            ->result();
    }

    public function get_all_regions_and_systems()
    {
        return $this->db->query(
            "SELECT r.regionID, r.regionName, ss.solarSystemID, ss.solarSystemName
            FROM $this->mapSolarSystems_table ss
            JOIN $this->mapRegions_table r ON ss.regionID = r.regionID")
            ->result();
    }
}

/* End of file location_model.php */
