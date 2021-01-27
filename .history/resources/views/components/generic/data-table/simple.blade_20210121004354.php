@if ($attributes['selectName'])
    @prop(['init'=> 0 ])  
@else
    @prop(['init'=> 1])
@endif
<div class="position-relative">


<table class="dataTable-simple table table-borderless w-100 {{ $attributes['class'] }}" id="{{ $name }}">
    <thead class="dataTable-simple-head border-bottom">
        {{-- si selectionnable --}}
        @if ($attributes["selectName"])
            <th>
                <input type="checkbox" class="dataTable-simple-selectAll" data-var-table="{{ $name }}">
            </th>
        @endif
        {{-- les autres titres --}}
        @foreach ($columns as $column)
            <th class="@if ($loop->last) dataTable-simple-th-end  @endif">
                {{ $column->name }}
                @if (isset($column->badge))
                    <span class="bagde {{ $column->badge->styleClass }}"> {{ $column->badge->value }}</span>
                @endif
                
            </th>
        @endforeach
    </thead>
    <tbody class="dataTable-simple-body">

    </tbody>
    <tfoot class="dataTable-simple-foot">
        @foreach ($columns as $column)
            <td></td>
        @endforeach
    </tfoot>
</table>


                    <div class="dropdown position-absolute" style="right: 3px;top:10px;">
                        <a data-toggle="dropdown" href="#">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($columns as $key => $column )
                                @props(['idd'=>App\ViewModel\GenId::newId()])
                                <span href="#" class="dropdown-item">
                                    <input type="checkbox"
                                            id="{{ $idd }}"
                                            data-key ="@if($attributes['selectName']){{ $key+1 }}@else {{ $key }}@endif"
                                            data-var-table="{{ $name }}"
                                            value="{{ $key }}"
                                           class="dataTable-simple-visible-check"
                                           @if (!isset($column->visible) || $column->visible)
                                            checked="true"
                                           @endif>
                                    <label for="{{ $idd }}">
                                      {{ $column->name }}   
                                    </label>
                                </span>
                            @endforeach

                        </div>
                    </div>

                </div>
{{-- push datatable src --}}
@once
    @push('script')
        <script src="{{ URL::asset('plugin/DataTables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset("plugin\DataTables\RowGroup-1.1.2\js\dataTables.rowGroup.min.js") }}"></script>
        <script>
            $(function(){
                $('.dataTable-simple-visible-check').on('change',function(){
                    console.log();
                    $("#"+$(this).data('var-table')).DataTable().column($(this).data('key')).visible($(this).prop('checked'));
                });
                $('.dataTable-simple-selectAll').on('change',function(){
                    let checked= $(this).prop('checked');
                    $("#"+$(this).data('var-table')).find(".dataTable-simple-selectItem").each(function(){
                        $(this).prop("checked",checked);
                    });
                })
            })
        </script>
    @endpush
@endonce

{{-- push my datatable --}}
@push('script')
<script>
    $(function(){
        let {{ $name }} = $('#{{ $name }}').DataTable({
          "dom": 'tip',
          @if($attributes['pageLength'])
            "pageLength": {{ $attributes['pageLength'] }},
          @else
            "pageLength": 20,
          @endif
          "ajax":{
             "url":"{{ $url }}",
             "dataSrc": function ( json ) {
                 console.log(json)
                @if($attributes['selectName'])            
                for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                    json.data[i].select = '<input type="checkbox" name="{{ $attributes['selectName'] }}" class="dataTable-simple-selectItem">';
                }
                @endif
                return json.data;
             }
             @if($attributes['idForm'])
                 "data":$('#{{ $attributes['idForm'] }}').serialize(),
                 "type":$('#{{ $attributes['idForm'] }}').attr('method'),
             @endif
          } ,
          "columns":[
            @if($attributes['selectName'])
                { data:"select"} ,
            @endif
            @foreach($columns as $column)
                { data:"{{ $column->propertyName }}" },
            @endforeach
          ],

          initComplete: (settings, json)=>{
            @if($attributes['idDivPaginate'])
                $('.dataTables_paginate').appendTo($('#{{ $attributes['idDivPaginate'] }}'));
            @endif
            @if($attributes['idDivInfo'])
            $('.dataTables_info').appendTo($('#{{ $attributes['idDivInfo'] }}'));
            @endif
          },

        });
        @foreach($columns as $key=>$column)
            @if(isset($column->visible) && !$column->visible)
            {{ $name }}.column({{ $key }}).visible(false);
            @endif
        @endforeach
       
    });
    
</script>
@endpush
