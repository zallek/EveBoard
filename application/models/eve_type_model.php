<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : eve_type_model.php
 * Description : *
 */
class Eve_type_model extends CI_Model
{
    private $invTypes_table = 'invTypes';
    private $invGroups_table = 'invGroups';
    private $invRefine_table = 'invTypeMaterial';

    public function get_type($typeID)
    {
        return $this->db->query(
            "SELECT t.typeName, t.groupID, g.categoryID, t.volume, g.groupName, g.allowRecycler,
             '".$this->get_type_image($typeID, 64)."' AS img
            FROM $this->invTypes_table t
            JOIN $this->invGroups_table g ON g.groupID = t.groupID
            WHERE t.typeID = $typeID")
            ->row();
    }

    /**
     * @param $typeID
     * @param int $size valid size : 32, 64
     * @return string
     */
    public function get_type_image($typeID, $size = 64){
        return $typeID.'_'.$size.'.png';
    }

    public function get_refined_materials($typeID){
        return $this->db->query(
            "SELECT r.typeID, r.materialTypeID, r.quantity, t.typeName AS materialTypeName
            FROM invTypeMaterials r
            JOIN invTypes t ON t.typeID = r.materialTypeID
            WHERE r.typeID = $typeID")
            ->result();
    }
}

/* End of file eve_type_model.php */
