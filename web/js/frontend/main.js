  

/* global let, path, to, dynamics */

$(document).ready(function(){
//    var windowHeight = $(window).height(); 
//     $('#section').css('height',(windowHeight));
//     
//$(window).resize(function(){
//    var windowHeight = $(window).height(); 
//    $('#section').css('height',(windowHeight));  
//});





});




//(function(){
//    
//   
//   
//    var path = document.querySelector('#Vague path');
//    var from = path.getAttribute('d');
//    var to = path.getAttribute('data-to');
//    
// dynamics.animate(path, {
//  d:  to
//}, {
//  type: dynamics.spring,
//  frequency: 155
//});
//    
//    
//});


var path = document.querySelector('#Vague path');
var from = path.getAttribute('d');
var to = path.getAttribute('data-to');

// Over animation

$('.anim-home').click(function(){
    

function animateOver() {
  dynamics.animate(path, {
    d: to
  }, {
     type: dynamics.spring,
//     duration: 8000,
//     returnsToSelf: true
       friction: 94
  });
 $('.vague').css('top','0');
}

// Start
animateOver();

});