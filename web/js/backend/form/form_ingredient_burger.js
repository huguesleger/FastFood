/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//----------ajout champs ingredient----------///
$(document).ready(function(){
    

    var $container = $('div#appbundle_burger_ingredient');
    var index = $container.find(':input').length;

    $('#add_category').click(function(e) {
      addCategory($container);

      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
      return false;
    });

    if (index === 0) {
      addCategory($container);
    } else {

      $container.children('div').each(function() {
        addDeleteLink($(this));
      });
    }

    function addCategory($container) {

      var template = $container.attr('data-prototype')
        .replace(/__name__label__/g, 'n°' + (index+1))
        .replace(/__name__/g,        index)
        
      ;

      var $prototype = $(template);
      addDeleteLink($prototype);
      $container.append($prototype);

      index++;
    }

    function addDeleteLink($prototype) {
      var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
  
 
  if (index > 0) {  // ci y'a qu'un seul ingredient je n'affiche pas le btn supprimer
      $prototype.append($deleteLink);
  }
      $deleteLink.click(function(e) {
        $prototype.remove();

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
      });
    }
    
});