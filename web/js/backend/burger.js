/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//////////notification form/////////////////
$(document).ready(function(){
    
    
$(function(){
//$('#no_publish').fadeIn('slow').delay(2000).fadeOut('slow');
$('#confirm').fadeIn('slow').delay(2000).fadeOut('slow');
$('#delete').fadeIn('slow').delay(2000).fadeOut('slow');
$('#maj_post').fadeIn('slow').delay(3500).fadeOut('slow');
});

///////////////////////////////////////
///////////////////////////////////////

////////////////////////liste burger////////////////
$(function() { 
  $('#datatable').dataTable({
           url: "admin/burger",
            async: true,
            type: 'GET',
            datatype: "json",
            success: function (datas) {
                alert(datas);
  }
  }
            );
            $('#datatable-keytable').DataTable({
              keys: true
            });
 
        });
 
///////////////////////////////////////
///////////////////////////////////////


});
