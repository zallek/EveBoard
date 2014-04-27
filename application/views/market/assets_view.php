<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 07/08/13
 * Time: 18:47
 *
 * Name : assets_view.php
 * Description : *
 */
?>

<table border="1">
    <tr>
        <th>TypeName</th><th>Quantity</th><th>Location</th><th>R</th><th>Sell min.</th><th>Refined Price</th><th>Should refine</th>
    </tr>
<?php
foreach($assets as $asset){
    echo '<tr>';
//    echo '<td>'.$asset['typeName'].'</td><td>'.$asset['quantity'].'</td><td>'.$asset['stationName'].'</td><td>'.$asset['allowRecycler'].'</td><td>'.$asset['sell']['min'].'</td><td>'.$asset['refinedPrice'].'</td><td>'.$asset['shouldRefine'].'</td>';
    echo '<td>'.$asset['typeName'].'</td><td>'.$asset['quantity'].'</td><td>'.$asset['stationName'].'</td><td>'.$asset['allowRecycler'].'</td><td>'.$asset['groupID'].'</td><td>'.$asset['categoryID'].'</td>';
    echo '</tr>';
}
?>
</table>


<?php
/* End of file assets_view.php */