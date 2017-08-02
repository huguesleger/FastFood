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

//
// function calculeLongueur(){
//   var iLongueur, iLongueurRestante;
//   iLongueur = document.getElementById('#appbundle_burger_description').value.length;
//   if (iLongueur>250) {
//      document.getElementById('#appbundle_burger_description').value = document.getElementById('#appbundle_burger_description').value.substring(0,250);
//      iLongueurRestante = 0;
//   }
//   else {
//      iLongueurRestante = 250 - iLongueur;
//   }
//   if (iLongueurRestante <= 1)
//      document.getElementById('indic').innerHTML = iLongueurRestante + "&nbsp;caract&egrave;re&nbsp;disponible";
//   else
//      document.getElementById('indic').innerHTML = iLongueurRestante + "&nbsp;caract&egrave;res&nbsp;disponibles";
//}
//
// $('body').load(calculeLongueur());
 
 
 
$(function(){
   $('<div id="caracteres">250 caracatère(s) disponible(s)</div>').insertAfter('#appbundle_burger_description'); 
});



});

  
