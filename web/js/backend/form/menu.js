/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
$('#appbundle_menu_choix').change(function () {
    var valeur =  $("#appbundle_menu_choix option:selected").val();
    $('#Choix').insertAfter('#appbundle_menu_choix');
    $('#Choix').html('<span class="burger_choice"> burger au choix + </span>' + valeur);
 
})
.trigger('change');
 


});
