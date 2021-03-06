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
        },

        serializeObject : function()
        {
           var o = {};
           var a = this.serializeArray();
           $.each(a, function() {
               if (o[this.name]) {
                   if (!o[this.name].push) {
                       o[this.name] = [o[this.name]];
                   }
                   o[this.name].push(this.value || '');
               } else {
                   o[this.name] = this.value || '';
               }
           });
           return o;
        },

    
    });


//    les arlert
    $.fn.nplAlertShow= function (idContentAlert,message,typeClass,removeClass,fade=0){
        idContentAlert="#"+idContentAlert;
        $(idContentAlert).removeClass(removeClass);
        $(idContentAlert).html(message);
        $(idContentAlert).addClass(typeClass);
        $(idContentAlert).fadeIn();
        if(fade!=1){
            $(idContentAlert).delay(fade*2000).fadeOut(500);
        }

    };
    $.fn.nplAlertHide = function(idContentAlert){
        $('#'+idContentAlert).alert('close');
    }
 
    // show and hide dropdown
    $(function(){
  
        $('.ddw-cacha').on('show.bs.dropdown',function(){
               $('.cacha').css('z-index','-10'); 
        });
        $('.ddw-cacha').on('hide.bs.dropdown',function(){
               $('.cacha').css('z-index','auto'); 
        });
    });

    // Filter & Search add filter tosearch
    // NB : class_name avec point
    $.pushFilterToSearch=(idSearch,idElement,idChecks,name,values,titre,text,class_name='')=>{
        let textHtml='';
        for (const k in values) {
            let x=k;
            let nameValue='';
            
            
            if(Array.isArray(values[k])){
                nameParent=name+'['+k+']';
                let valueChild=values[k];
                loop1:
                for(const o of valueChild.keys()){ 
                    if(Array.isArray(o)){
                        valueChild=valueChild[o];
                        nameParent+='['+o+']';
                        continue loop1;
                    }
                    nameValue=nameParent+'[]';
                    textHtml +="<input type='hidden' name='"+nameValue+"' value='"+valueChild[o]+"'>";
                }
            }
            else{
                textHtml +="<input type='hidden' name='"+name+"["+k+"]' value='"+values[k]+"'>";
            }
            
             
        }
         textHtml +=  "                               \
                <span class='search-item-title bg-success pl-2 pr-1  py-1'>"+titre+": </span>\
                <span class='search-item-text py-1 px-2 no-wrap'>"+text+"</span>\
                <button class='search-item-close btn btn-secondary' type='button' data-id-check='"+idChecks+"'><i class='material-icons md-14'>close</i></button>\
        ";
        if($('#'+idElement).length)
            $('#'+idElement).html(textHtml)
        else
            $(idSearch).append(
                "<div id='"+idElement+"' class='search-item mx-1 rounded-pill '> "
                +textHtml+
                "</div> " 
             );
             $(idSearch).trigger('n-resize');
        $('#'+idElement).find(".search-item-close").bind('click',function(){
                if(!class_name.length){
                    console.log(idChecks+" ");
                    $(idChecks).prop('checked',false);
                    $(idChecks).trigger('change');
                }
                else{
                    console.log(idChecks+" "+class_name);
                    $(idChecks).find(class_name).prop('checked',false);
                    $(idChecks).find(class_name).trigger('change');
                }
     
        });
    };
    

    $.removeFilterToSearch=(idElement,idSearch)=>{
        $(idElement).remove();
        if($(idSearch))
            $(idSearch).trigger('n-resize');
    };
 
});