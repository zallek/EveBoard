<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by Nicolas Fortin
 * Date: 12/02/13
 * Time: 23:37
 *
 * Name : lp_store_model.php
 * Description : *
 */
class Lp_store_model extends CI_Model
{
    private $lpStore_table = 'lpStore';
    private $lpOffers_table = 'lpOffers';
    private $lpOfferRequirements_table = 'lpOfferRequirements';

    private $invTypes_table = 'invTypes';

   /* public function count()
    {
        return $this->db->count_all($this->table);
    }
                   */

    public function get_offers($corpId)
    {
        if(!is_integer($corpId))
        {
            return false;
        }

        return $this->db->query(
            "SELECT s.offerID, s.corporationID, o.typeID AS itemID, o.quantity, o.lpCost, o.iskCost, r.typeID AS requiredItemID, r.quantity AS requiredItemQuantity
            FROM $this->lpStore_table s
            JOIN $this->lpOffers_table o ON s.offerID = o.offerID
            JOIN $this->lpOfferRequirements_table r ON s.offerID = r.offerID
            JOIN $this->invTypes_table i ON o.typeID = i.typeID
            WHERE s.corporationID = $corpId")
            ->result();
    }
}

/* End of file lp_store_model.php */
