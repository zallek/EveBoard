<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 06/08/13
 * Time: 14:04
 *
 * Name : about_view.php
 * Description : *
 */
?>

<h2>The creator</h2>
<p>Nicolas FORTIN, french student at the University of Technology of Compiègne (UTC). Currently at KAIST in South Korea for studying purpose. <br/>
In-game name : Tarh Damir</p>

<h2>Data used</h2>
<h3>Static game data</h3>
<ul>
    <li><b>CCP Static Data Dump (Odyssey_1.0.12) :</b> map information, items in-game, refining information, ... </li>
    <li><b>LpDatabase by <i>Sable Blitzmann</i> (version 0.6) :</b> Loyalty Store information</li>
</ul>
<h3>Dynamic game data</h3>
<ul>
    <li><b>EVE-Central API :</b> live market pricing information </li>
</ul>
<h3>Data related to players</h3>
<ul>
    <li><b>EVE API :</b> Skills, assets and current market orders <a href="#eveAPI">more info</a></li>
    <li><b>In-game browser IGB information :</b> used to locate the player while he is playing</li>
</ul>

<h2>EVE API</h2>
<p>Some features of this website needs a EVE player API key allowing :</p>
<ul>
    <li>Market orders</li>
    <li>Skill in training</li>
    <li>Asset List</li>
</ul>
<p>To create a predefined API key visit this <a href="http://community.eveonline.com/support/api-key/CreatePredefined?accessMask=135170">link</a></p>
<p>No one illicit usage is made with your data. Pulled data is not store on the website database.</p>

<?php
/* End of file about_view.php */