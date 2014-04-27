<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 14:03
 *
 * Name : marketLocation_view.php
 * Description : *
 */
?>

<div id="marketBar">
    <div>
        <img src="<?php echo img_url('marketIcon.png'); ?>" />
        Market prices from
        <select id="location">
            <?php foreach($location as $id => $region): ?>
                <?php if($id == 0):?>
                    <option value='<?php echo $id; ?>'><?php echo $region['name']; ?></option>
                <?php else : ?>
                    <optgroup label="<?php echo $region['name']; ?>">
                         <?php foreach($region['systems'] as $id => $name){ ?>
                            <option value='<?php echo $id; ?>' <?php if($selectedLocation == $id){ echo ' selected'; }?>>
                                <?php echo $name; ?>
                            </option>
                         <?php } ?>
                    </optgroup>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <?php if($igb): ?>
            <img id='geolocationBtn' src="<?php echo img_url('geolocation.png'); ?>" />
        <?php endif; ?>
    </div>
</div>

<?php
/* End of file marketLocation_view.php */