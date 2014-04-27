/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 04/08/13
 * Time: 21:09
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {
    //$("#location").select2();

    $("#location").change(function(){
        var newLoc = $(this).val();

        $.ajax({
            url: BASE_URL+"market_location/set_location",
            type: 'POST' ,
            data: { loc: newLoc}
        }).done(function() {
            location.reload();
        });
    });

    $('#geolocationBtn').click(function(){
        CCPEVE.requestTrust(BASE_URL);
        $.ajax({
            url: BASE_URL+"market_location/geolocation"
        }).done(function() {
            location.reload();
        });
    });
});