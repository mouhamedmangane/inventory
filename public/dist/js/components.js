$(function(){
    jQuery.fn.extend({
        try_component: function(my_method){
            return this.each(function(){
                let div =document.createElement('div');
                div.className="try_again superposistion d-flex justify-content-center align-items-center";
                let text = document.createTextNode("Echec Requete ...");
                let button = document.createElement('button');
                button.innerHTML="Réessayer";
                button.className ="btn btn-secondary";
                button.addEventListener('click',my_method);
                button.type='button';
                div.appendChild(text);
                div.appendChild(button);
                $(this).html('').append(div);
            });
        },
        loading:function(){
            return this.each(function(){
                let div =document.createElement('div');
                div.className = "loading superposistion d-flex justify-content-center align-items-center";
                $(div).html('<div class="spinner-border" role="status"> \
                        <span class="sr-only">Loading...</span> \
                    </div>');

                $(this).append($(div));
            });
        }
    });


   
 
    // show and hide dropdown
    $(function(){
  
        $('.ddw-cacha').on('show.bs.dropdown',function(){
               $('.cacha').css('z-index','-10'); 
        });
        $('.ddw-cacha').on('hide.bs.dropdown',function(){
               $('.cacha').css('z-index','auto'); 
        });
    });
 
});