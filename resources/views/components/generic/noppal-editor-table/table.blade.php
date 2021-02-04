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

@once
@push('script')
<script src="{{ URL::asset('dist/js/editorTable/api.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/column.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/column-select.js') }}"></script>
<script src="{{ URL::asset('dist/js/editorTable/column-text.js') }}"></script>
@endpush
@endonce

@push('script')
    <script>
        $(function(){
            let editorTable = $("#{{ $idTable }}").nplEditorTable({
                columns:[
                    @foreach($columns as $column)
                        new $.fn.NplEditorTable.{{ $column->classColumn }}(@json($column)),
                    @endforeach
                ],
                data:@json($dd),
            });
            console.log(editorTable);
            let row = editorTable.data[0];
            row.prix=55888;
            editorTable.update();
            editorTable.addEmptyRow();
        });
    </script>
@endpush