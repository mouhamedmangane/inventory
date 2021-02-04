
$(function(){
    $.fn.NplEditorTable.ColumnSelect = function(ob){

        $.fn.NplEditorTable.Column.call(this,ob);
        this.defaultOption = ob.options.defaultOption;
        this.defaultValue = ob.options.defaultOption.value;
        this.unique=false;
        if(ob.options.unique){
            this.unique=ob.options.unique;
        }
        this.dataRestant=function(i){
            let name = this.name;
            let toutesLesValeurs = $.map(this.optionsSelectData(i),function(o){return o['value']});
            if(this.unique==true){
                let valeurDessines= $.map(this.editorTable.data,function(o){return o[name]});
                return $(toutesLesValeurs).not(valeurDessines);
            }
            else{
                return $(toutesLesValeurs) ;
            }
            
        };

        this.optionsSelectData =function(i){
            let tab=this.options.selectOption;
            if(tab){
                return tab;
            }
            return[];
        };
        this.createOption=function(item,value){
            let option=document.createElement('option');
            option.value=item.value;
            let optionText = document.createTextNode(item.text);
            option.appendChild(optionText);
            if(value==item.value && value)
                option.selected=true;
            return option;
        };
        

        this.updateElementOption=function(restant,element,value,i){
            element.innerHTML="";
            let isNotValue=true;;
            let optionDefault=this.createOption(this.defaultOption,'');
            optionDefault.selected=false;
            element.prepend(optionDefault); 
            if(this.optionsSelectData(i)){
                for (const item of this.optionsSelectData(i)) {
                    if($.inArray(item.value,restant.get())!=-1 || value==item.value){
                        element.appendChild(this.createOption(item,value)); 
                        if(value==item.value && value){
                            isNotValue=false;
                        }
                    }
                }
            }
            
            if(isNotValue){
                optionDefault.selected=true;
            }
            
        };
        
        this.createInput=function(i,value){
            let restant =  this.dataRestant(i);
            let select= document.createElement('select');
            select.name= this.name+'[]';
            select.value=value;
            select.className=this.classNameInput+'  custom-select';
            this.updateElementOption(restant,select,value,i);
            this.pushAllEvent(select,i);
            
            return select;
        };

        this.updateInput=function(i,value){
            let restant =  this.dataRestant(i);
            let select=this.inputs().get(i);
            this.updateElementOption(restant,select,value,i);            
            return select;
        };
    

        this.update = function(){
            let inputs=this.inputs();console.log(inputs);
            
            for (let index = 0; index < this.editorTable.data.length; index++) {
                let restant = this.dataRestant(index);
                console.log(index);
                let element = inputs.get(index);
                element.value= this.getCellData(index);
                this.updateElementOption(restant,element,element.value,index);                    
            }
        };

        

        this.addEventInputBefore('change',function(e){
            console.log('change 2');
            e.column.update();
        });
        
      
    };

    $.fn.NplEditorTable.ColumnSelect.prototype = Object.create($.fn.NplEditorTable.Column.prototype);;
    $.fn.NplEditorTable.ColumnSelect.prototype.constructeur = $.fn.NplEditorTable.ColumnSelect;




    // columnSelectFree
    $.fn.NplEditorTable.ColumnSelectFree=function(ob){
        $.fn.NplEditorTable.ColumnSelect.call(this,ob);
        this.nameDep=ob.nameDep;
        this.urlDep = ob.urlDep;   
    
        this.optionsSelectData =function(i){
            let rowData=this.editorTable.data[i];
            let valueDep=rowData[this.nameDep];
            let tab=this.options.selectOption[valueDep];
            if(!tab && valueDep){
                tab=this.getOptionAjax(valueDep);
                this.options.selectOption[valueDep]=tab;
            }
            return tab;
        };
        this.getOptionAjax=(valueDep)=>{
            let tab=[];
            $.ajax({
                type: 'get',
                url: this.urlDep+'/'+valueDep,
                dataType: "json",
                success: function (response) {
                    if(response.status){
                        tab=response.data;
                    }
                    else{
                        alert('probléme de retrouver les donner veuiller reactualiser');
                    }
                },
                error:function(err){
                    alert('probléme de connexion ou d acces a la ressource veuiller reactualiser');
                    console.log(err);
                }
            });
            return tab;
        };
  

        this.afterSetEditor=()=>{
            if(!this.once){
                let name=this.name;
                this.editorTable.getColumn(this.nameDep).addEventInput('change',function(e){
                    alert('bonjour');
                    e.editorTable.getColumn(name).update();
                });
            }
            
            this.once=true;
        }
                
    };
    $.fn.NplEditorTable.ColumnSelectFree.prototype = Object.create($.fn.NplEditorTable.ColumnSelect.prototype);;
    $.fn.NplEditorTable.ColumnSelectFree.prototype.constructeur = $.fn.NplEditorTable.ColumnSelectFree;

});