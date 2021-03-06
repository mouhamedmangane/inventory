<table id="{{ $idTable }}">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column->name }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    </tbody>

</table>
<div>
    <a href="#" class="text-primary" id="{{ $idTable }}__btn___add">
        <span class="material-icons bg-primary">
            add_circle
            </span>
    </a>
</div>


@once
@push('script')
<script src="{{ URL::asset('dist/js/editorTable/api.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/gcell.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/gcell-select.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/gcell-text.js') }}"></script>
@endpush
@endonce

@push('script')
    <script>
        $(function(){
            let  btn_add = "{{ $idTable }}__btn___add";
            let editorTable = $("#{{ $idTable }}").nplEditorTable({
                columns:[
                    @foreach($columns as $column)
                        new $.fn.NplEditorTable.{{ $column->classGCell }}(@json($column)),
                    @endforeach
                ],
                data:@json($dd),
            });
            console.log(editorTable);
            //let row = editorTable.data[0];
            //row.prix=55888;
            //editorTable.update();
            //editorTable.addEmptyRow();
            //editorTable.removeRow(0);
           // editorTable.update()
            //editorTable.addEmptyRow();
             $('#'+btn_add).on('click',function(){
                editorTable.addEmptyRow(); 
            });
        });
        
    </script>
@endpush