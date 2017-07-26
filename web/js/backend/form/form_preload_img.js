
$(document).ready(function(){

  
    ////////////// preload image dans form//////////////:
    /////////////////////////////////////////////////////
    ////////////////////////////////////////////////////


 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                
                $('#blah').attr('src', e.target.result);
                $('#blah').show();
                
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#appbundle_burger_thumbnail").change(function(){
        readURL(this);
        
    });

});
