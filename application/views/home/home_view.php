<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 14:03
 *
 * Name : home_view.php
 * Description : *
 */
?>

Welcome on Eve-board.

<h2>Suivi orders</h2>
- Liste les orders pour lesquel une offre moins chère a été émise par un autre joueur
- Indique le prix le plus bas.

<h2>Ventes</h2>
- Scan les items dans le hangar
- Liste les items dans le prix de vente le plus bas est plus élevé que le prix moyen.

<h2>Refine hangar</h2>
- Scan hangars -> API hangar
(tous ou un spécialisé) géolicalisation -> IGB + besoin trust
- Calcule le prix estimé des ventes refonte et compare avec prix vente item
fonction du niveau de refine -> API skills
fonction market

<h2>LP store</h2>
- Ratio LP point/ISK
- Bagde utile pour quel LP item

<?php
/* End of file home_view.php */