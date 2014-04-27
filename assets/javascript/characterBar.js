/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 08/08/13
 * Time: 12:21
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {

    $("#logging").click(function(){
        var keyID = $("#CharacterBar input[name='keyID']").val();
        var vCode = $("#CharacterBar input[name='vCode']").val();

        $.ajax({
            url: BASE_URL+"login/logging",
            type: 'POST' ,
            data: { keyID: keyID, vCode : vCode}
        }).done(function(html) {
            if(html == false){   /** A améliorer **/
                $("#CharacterBar input[name='keyID']").val('');
                $("#CharacterBar input[name='vCode']").val('');
            }
            else{
                $("#CharacterBar").replaceWith(html);
            }
        });
    });

});