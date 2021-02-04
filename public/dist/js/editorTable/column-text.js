$(function(){
    // Column Input
    $.fn.NplEditorTable.ColumnText = function(ob){
        $.fn.NplEditorTable.Column.call(this,ob);
        this.createInput=function(i,value){
            let input = document.createElement('input');
            input.name=this.name+'[]';
            input.type=this.options.type;
            input.value=value;
            input.className=this.classNameInput+' form-control';
            let editor=this.editorTable;
            this.pushAllEvent(input,i);
            return input;
        };
        this.updateInput=function(i,value){
            if(cell=$(this.editor.seletor).find('.npl-editor-input [name="'+this.name+'"]')){
                cell.value=value;
            }
            else{
                throw new Exception("Impossible de selectionner la ligne "+i+" colonne "+this.name);
            }
            
        };
        
    };
    $.fn.NplEditorTable.ColumnText.prototype = Object.create($.fn.NplEditorTable.Column.prototype);
    $.fn.NplEditorTable.ColumnText.prototype.constructor = $.fn.NplEditorTable.ColumnText;
    
});