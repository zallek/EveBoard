<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 08/08/13
 * Time: 12:30
 *
 * Name : logged_view.php
 * Description : *
 */
?>

<div id="CharacterBar">
    <div class="little">
         Tarh Damir
    </div>
    <div class="big">
        <select name="characters">
            <?php foreach($characters as $char): ?>
                <option value="<?php echo $char['characterID']; ?>"><?php echo $char['characterName']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<?php
/* End of file logged_view.php */