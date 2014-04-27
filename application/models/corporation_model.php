<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : corporation_model.php
 * Description : *
 */
class Corporation_model extends CI_Model
{
    private $crpNPCCorporations_table = 'crpNPCCorporations';
    private $chrFactions_table = 'chrFactions';

    public function get_corp($corpId)
    {
        if(!is_integer($corpId))
        {
            return false;
        }

        return $this->db->query(
            "SELECT c.corporationID, c.description AS name, c.factionID, f.factionName
            FROM $this->crpNPCCorporations_table c
            JOIN $this->chrFactions_table f ON c.factionID = f.factionID
            WHERE s.corporationID = $corpId")
            ->result();
    }

    public function get_corps($factionID)
    {
        if(!is_integer($factionID))
        {
            return false;
        }

        return $this->db->query(
            "SELECT c.corporationID, c.description AS corporationName, c.factionID, f.factionName
            FROM $this->crpNPCCorporations_table c
            JOIN $this->chrFactions_table f ON c.factionID = f.factionID
            WHERE f.factionID = $factionID")
            ->result();
    }

    public function get_all_corps()
    {
        return $this->db->query(
            "SELECT c.corporationID, c.description AS corporationName, c.factionID, f.factionName
            FROM $this->crpNPCCorporations_table c
            JOIN $this->chrFactions_table f ON c.factionID = f.factionID")
            ->result();
    }

    public function get_all_factions()
    {
        return $this->db->query(
            "SELECT f.factionID, f.factionName
            FROM $this->chrFactions_table f ")
            ->result();
    }
}

/* End of file corporation_model.php */
