$(function(){
    $.fn.NplEditorTable.Column = function(ob){
        this.name=ob.name;
        this.options=ob.options;
        this.classNameInput= $.fn.NplEditorTable.defaultClassInput;
        this.classNameTd= $.fn.NplEditorTable.defaultClassTd;
        this.isVisible=ob.visible;
        this.defaultValue= ob.options.defaultValue;
        // data et table
        this.editorTable=null;
        this.getCellData=(index)=>{
            let row=this.editorTable.data[index];
            console.log(index);
            return row[this.name];
        }
        this.setCellData=(index,value)=>{
            console.log(this.editorTable.data);
            console.log(index);
            let row =  this.editorTable.data[index];
            console.log(row);
            row[this.name]=value;
        }
      ;
        // inputs
        this.createInput=undefined;
        this.updateInput=undefined;
        this.inputs= function(){
            if(this.editorTable)
                return $(this.editorTable.selector).find('.'+this.classNameInput+'[name="'+this.name+'[]"]');
            else
                throw new Exception("editorTable de la colonne est undefined");
        };
        this.update = function(){
            let inputs=this.inputs();console.log(inputs);
            let fngetDataCell =this.getCellData;
            inputs.each(function(index,element){
                element.value= fngetDataCell(index);
            });
        }

        
        //Cellule
        this.createCell=(value,i)=>{
            let td= document.createElement('td');
            td.className=this.classNametd;
            td.appendChild(this.createInput(i,value));
            return td;
        }

        //table editor
        
        this.setEditorTable=function(editorTable){
            this.editorTable = editorTable;
        };
        this.afterSetEditor=()=>{};
       
        //Event Input
        this.eventInputs=[];
        this.addEventInputBefore=(eventName,fonction)=>{
            this.eventInputs.push({name:eventName,fonction:fonction}); 
     
        };
        this.addEventInput=(eventName,fonction)=>{
            this.addEventInputBefore(eventName,fonction); 
            let elements= this.inputs();
            let column =this;
            elements.each(function (index, element) {
                console.log('eeeeeeeeeeeee');
                console.log(element);
                column.pushEvent(element,{name:eventName,fonction:fonction},index);
            });
        };
        this.pushEvent=(input,eventI,rowIndex)=>{
            let column=this;
            let editorTable=this.editorTable;
            if(eventI){
                input.addEventListener(eventI.name,function(e){ 
                    console.log('test');
                    e.column= column;
                    e.editorTable= editorTable;
                    e.rowIndex=rowIndex;
                    eventI.fonction(e);
                 });
            }
            else{
                throw new Exception('impossible de recuperer la fonction de l evement il se peut que le nom de l evement donné n est pas bonn' )
            }
            
        };
        this.pushAllEvent=(input,rowIndex)=>{
            for (const eventInput of this.eventInputs ) {
                this.pushEvent(input,eventInput,rowIndex);  
            }
        };
        
        this.addEventInputBefore('change',function(e){
            e.column.setCellData(e.rowIndex,e.target.value);
            console.log(e.editorTable.data);
            console.log('change 1');
        });
        
    };

});