/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

//var $container = $('div#appbundle_burgerspecial_ingredient');
//    var index = $container.find(':input').length;
//    $('#add_category2').click(function(e) {
//      addCategory($container);
//
//      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
//      return false;
//    });
//
//    if (index === 0) {
//      addCategory($container);
//    } else {
//
//      $container.children('div').each(function() {
//        addDeleteLink($(this));
//      });
//    }
//
//    function addCategory($container) {
//
//      var template = $container.attr('data-prototype')
//        .replace(/__name__label__/g, 'n°' + (index+1))
//        .replace(/__name__/g,        index)
//
//      ;
//
//      var $prototype = $(template);
//      addDeleteLink($prototype);
//      $container.append($prototype);
//
//      index++;
//    }
//
//    function addDeleteLink($prototype) {
//      var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
//  
// 
//  if (index > 0) {  // ci y'a qu'un seul ingredient je n'affiche pas le btn supprimer
//      $prototype.append($deleteLink);
//  }
//      $deleteLink.click(function(e) {
//        $prototype.remove();
//
//        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
//        return false;
//      });
//    }
    
    
      function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#appbundle_burgerspecial_ingredient').tagsInput({
        width: 'auto',
        defaultText: 'ajouter un ingrédient'
      });
      $('#appbundle_burgerspecial_ingredient_tagsinput').after('<p class="ingredient-info red">*séparer vos ingrédients par une virgule</p>');
    });
    
    });