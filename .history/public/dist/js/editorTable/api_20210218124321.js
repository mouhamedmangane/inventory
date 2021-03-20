
$(function(){
    $.chargement=function(){
        $('#content').append('<div id="apieditorchargement" \
                                    class="position-absolute w-100 "\
                                    style="top:0px;left:0px;height:calc(100vh - 48px);background:rgba(0,0,0,0.5);"\
                              ></div>');
        $('#content').append('<div id="apieditorchargementmessage" \
                                    class="position-absolute  text-align-center px-4 py-2"\
                                    style="top:calc(50% - 20px);left:calc(50% - 125px);background:white;color:black; width:300px;text-align:center;">\
                                    Requete Asynchrone chargment ...\
                             </div>');
    };
    $.rmchargement=function(){
        $('#apieditorchargement').remove();
        $('#apieditorchargementmessage').remove();
    };
    $.fn.NplEditorTable={};
    
    // Constantes
    $.fn.NplEditorTable.defaultClassTr ='npl-editor-tr';
    $.fn.NplEditorTable.defaultClassTD ='npl-editor-td';
    $.fn.NplEditorTable.defaultClassInput ='npl-editor-input';
    

    $.fn.NplEditorTable.Api =  function(id,ob){
        console.log('entre');
        this.selector = "#"+id;
        this.data=ob.data;
        this.columns=ob.columns;
        this.hideColumns=ob.hideColumns;
        this.columns.push(new $.fn.NplEditorTable.GcellSup({
            name:'sup__col',
        }));
        // init column
        for (const column of this.columns) {
            column.editorTable=this;  
        }
      
        this.getColumn = (name)=>{
            if(Number.isInteger(name)){
                if(name>=0 && name<this.columns.lenght)
                    return this.columns[name];
                else
                    throw new Exception('column '+name+' n existe pas');
            }
            else{
                return this.columns.find((col) => col.name == name);
            }
            
        };
        this.drawRow=function(item,i){
            let tr = document.createElement('tr');
            tr.className=$.fn.NplEditorTable.defaultClassTr;
            for (const column of this.columns) {
                tr.appendChild(column.createCell(item[column.name],i));
            }
            return tr;
          
        }

        this.draw=function(){
            console.log('ererer');
            console.log(this.selector);
            let tbody=$(this.selector).children('tbody');
            let i=0;
            for (const item of this.data) {
                let tr=this.drawRow(item,i);
                tbody.append(tr);
                i++
            }
            
        };
        this.updateInput=(i,name,value)=>{
            this.getColumn(name).update(i,value);
        };
        this.update =async ()=>{
            for (const column of this.columns) {
                await column.update();
            }
        };
        this.getTr=function(i){
            return $(this.selector).find('.'+$.fn.NplEditorTable.defaultClassTr).get(i);
        };
        this.getTd=function(i,name){
            return $(this.selector).find('.'+$.fn.NplEditorTable.defaultClassTD+'"'+name+'"]').get(i);
        };
        this.getInput=function(i,name){
            return $(this.selector).find('.'+$.fn.NplEditorTable.defaultClassTD+'"'+name+'"]').get(i);
        };
        this.getInputValue=(columnName,rowIndex)=>{
            let row=this.data[rowIndex];
            return row[columnName];
        }

        this.newEmptyData=function(){
            let data={};
            for (const column of this.columns) {
                data[column.name] = column.defaultValue;
            }
            return data;
        };

        this.addEmptyRow=function(row){
            if(!row)
                row= this.newEmptyData();
            this.data.push(row);
            console.log(this.data.length-1);
            let tr=this.drawRow(row,this.data.length-1);
            let tbody=$(this.selector).children('tbody');
            tbody.append(tr);

            
        };

        this.removeRow=(i)=>{
            console.log('ssssssssssssssssssssss');
            console.log(this.data);
            console.log(i);
            this.data.splice(i,1);
            console.log(this.data);
            console.log('ssssssssssssssssssssss');
            console.log('ssssssssssssssssssssss');
            let tr= this.getTr(i);
            tr.remove();
            this.update();
        }
        
        this.draw();
        for (const column of this.columns) {
            column.afterSetEditor() ;
        }

    };

    $.fn.NplEditorTable.Intances=[];
    $.fn.extend({
        nplEditorTable:function(ob=null){
            let api = $.fn.NplEditorTable.Intances.find((instance)=>{
                console.log(instance.selector );
                console.log(this.prop('id'));
               return  instance.selector == ('#'+this.prop('id'))
            } );
            if(!api){
                api = new $.fn.NplEditorTable.Api(this.prop('id'),ob);
                $.fn.NplEditorTable.Intances.push(api);
            }
            return api;   
        
           
        },
    });
    

    

});