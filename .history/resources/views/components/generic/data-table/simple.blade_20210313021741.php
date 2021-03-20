{{-- selectDataName le name recuperer au niveau du data pour les case a coché --}}
@if (!$attributes['selectDataName'])
    @props(['selectDataName'=> 'id'])
@else
    @props(['selectDataName'=> $attributes['selectDataName']])
@endif

@props(['idSelectAll'=>($name.'selectAll')])







@if ($attributes['selectName'])
    @props(['init'=> 1 ])  
@else
    @props(['init'=> 0])
@endif

<div class="position-relative">


    <table class="dataTable-simple table table-borderless w-100 {{ $attributes['class'] }}" id="{{ $name }}">
        <thead class="dataTable-simple-head border-bottom">
            {{-- si selectionnable --}}
            @if ($attributes["selectName"])
                <th>
                    <input type="checkbox" class="dataTable-simple-selectAll" id="{{ $idSelectAll }}" data-var-table="{{ $name }}">
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
        <tbody class="dataTable-simple-body" id="{{ $name }}__tbody">
    
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
                           @if (isset($column->visible) && !$column->visible)
                            checked="false"
                           @else
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

<x-generic.modal.optional-confirm />
<x-generic.modal.optional-alert />

{{-- push datatable src --}}
@once
    @push('script')
        <script src="{{ URL::asset('plugin/DataTables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset("plugin\DataTables\RowGroup-1.1.2\js\dataTables.rowGroup.min.js") }}"></script>
        <script>
            $(function(){
                $('.dataTable-simple-visible-check').on('change',function(){
                    $("#"+$(this).data('var-table')).DataTable().column($(this).data('key')).visible($(this).prop('checked'));
                });
                $('.dataTable-simple-selectAll').on('change',function(e){
                    
                    let checked= $(this).prop('checked');
                    table = $("#"+$(this).data('var-table')).DataTable();
                    table.rows({ page: 'current' }).nodes().to$().find(".dataTable-simple-selectItem").each(function(){
                        $(this).prop("checked",checked);
                        $(this).trigger('change');
                    });
                    //
                })
            })
        </script>
    @endpush
@endonce

{{-- push my datatable --}}
@push('script')
<script>
    $(function(){


        // Pour RowGroup
        @if($attributes['groupBy'])
            var collapsedGroups = {};//  enregistre les group masquer
            let defaultCollapse=true; // designe si les group sont masquer les du premier affichage 
            var checkedGroups = {}; // enregistre les groups qui son coché
        @endif
        
        // Noms des colonnes 
        let names=@json($nameColumns());
        @if($attributes['selectName']) names.unshift('select'); @endif

        //le datatable
        let {{ $name }} = $('#{{ $name }}').DataTable({
          //le dom
          "dom": 'tip',

          @if($attributes['pageLength'])
            "pageLength": {{ $attributes['pageLength'] }},
          @else
            "pageLength": 20,
          @endif

          //ajax
          if($url)@
          "ajax":{
             "url":"{{ $url }}",
             @if($searchId && !empty($searchId))
                "data": function(d){
                    return $('#{{ $searchId }}').serializeObject();
                },
             @endif
             "dataSrc": function ( json ) {
                @if($attributes['groupBy'])collapsedGroups = {}; checkedGroups = {};@endif
                $('#{{ $name }} .dataTable-simple-selectAll').prop('checked',false);
                @if($attributes['selectName'])            
                for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                    json.data[i].select = '<input type="checkbox" name="{{ $attributes['selectName'] }}[]" class="dataTable-simple-selectItem @if($attributes['groupBy']) decaler-a-droit-1 @endif" value="'+json.data[i].{{ $selectDataName }}+'"  >';
                }
                @endif
                return json.data;
             }
             @if($attributes['idForm'])
                 "data":$('#{{ $attributes['idForm'] }}').serialize(),
                 "type":$('#{{ $attributes['idForm'] }}').attr('method'),
             @endif
          } ,
          @else
            'data':
          @endif
          
          //columns   
          "columns":[
            @if($attributes['selectName'])
                { data:"select",name:"select",orderable:false} ,
            @endif
            @foreach($columns as $column)
                { data:"{{ $column->propertyName }}",name: "{{ $column->propertyName }}"},
            @endforeach
          ],

          //initComplete
          initComplete: (settings, json)=>{
            //deplacer le pignation dans un div donnée en entrer
            @if($attributes['idDivPaginate'])
                $('.dataTables_paginate').appendTo($('#{{ $attributes['idDivPaginate'] }}'));
            @endif

            // deplacer info dans un div donné en entrer
            @if($attributes['idDivInfo'])
                $('.dataTables_info').appendTo($('#{{ $attributes['idDivInfo'] }}'));
            @endif

            // gerer les des case a cocher
            @if($attributes['selectName'])
                gsSelectChange();
            @endif

            // Masquage des group lors du premeier affichage
            @if($attributes['groupBy'])
                defaultCollapse=false;
            @endif

          },
          
          // rowGroup   
          @if($attributes['groupBy'])
          orderFixed: [[names.indexOf("{{ $attributes['groupBy'] }}"), 'asc']],
          rowGroup: {
                dataSrc: "{{ $attributes['groupBy'] }}",
                startRender: function (rows, group) {
                    var collapsed = !!collapsedGroups[group];
                    if(defaultCollapse){
                        collapsed=true;
                        collapsedGroups[group]=true;
                    }
                    var checked = !!checkedGroups[group];


                    //creation du checkox du group
                    let checkbox=document.createElement('input');
                    checkbox.type='checkbox';
                    checkbox.name='select-group';
                    checkbox.style.margin='auto 5px auto 0px';
                    checkbox.className='checkbox-group-dt';
                    checkbox.checked=checked;
                    $(checkbox).on('change',function(e,f){
                        checked= e.target.checked;
                        checkedGroups[group]=checked;
                        if(!f){
                            rows.nodes().each(function (r) {
                                $(r).find(".dataTable-simple-selectItem").each(function(){
                                    $(this).prop("checked",checked);
                                    
                                });
                            }); 
                        }   

                        updateSelectAll();
                                      
                    });

                    rows.nodes().each(function (r) {
                        r.style.display = collapsed ? 'none' : '';
                        if(collapsed)
                            $(r).addClass('collapsed');
                        let check=$(r).find('.dataTable-simple-selectItem');
                        if(checked){
                            check.prop("checked",checked);
                        }
                        $(check).on('change',function(){
                            let count=0;
                            rows.nodes().each(function (el) {
                                let jqel=$(el).find('.dataTable-simple-selectItem');
                                if(jqel.get(0)){
                                    if(!jqel.get(0).checked){
                                        count++;
                                    }
                                }
                                
                            });
                            if(count<=0){
                                checkbox.checked=true;
                                
                            }
                            else{
                                checkbox.checked=false;
                            }
                            $(checkbox).trigger('change','fils');;
                        })
                    });    

                    
                    let td=document.createElement('td');
                    td.colSpan='8';
                    td.appendChild(checkbox);
                    td.appendChild(document.createTextNode(group + ' (' + rows.count() + ')'));
                    return $('<tr/>')
                        .append(td)
                        .attr('data-name', group)
                        .toggleClass('collapsed', collapsed);
                }
          }
          @endif

        });

        //ROWGROUP
        @if($attributes['groupBy'])
        // Lors d'une clique sur un group
        $("#{{ $name }} tbody").on('click', 'tr.dtrg-start,checkbox-group-dt', function (e) {
            if(e.target.type=='checkbox'){

            }
            else{
                var name = $(this).data('name');    
                collapsedGroups[name] = !collapsedGroups[name];
                {{ $name }}.draw();
            }
            
        });
        //lors d'un changement du dataSrc du rowGroup
        {{ $name }}.on( 'rowgroup-datasrc', function ( e, dt, val ) {
            let index=names.indexOf(val);
            {{ $name }}.order.fixed( {pre: [[ index, 'asc' ]]} ).draw();
        } );
        {{ $name }}.rowGroup().dataSrc('prenom');

        @endif

        // cacher certain colonne
        @foreach($columns as $key=>$column)
            @if(isset($column->visible) && !$column->visible)
                {{ $name }}.column({{ $key+ $init }}).visible(false);
            @endif
        @endforeach

        
     

        // constante
        let idAlert='{{ $attributes['idAlert'] }}';
        let actions=[];
        


        // Activation/desactivation des button d'actions avec canSelect
        function disabledActions(canSelect,masque){
            for(let action of actions){
                if(action.canSelect==canSelect){
                    $('#'+action.id).prop('disabled',masque); 
                }
            }
        }
        //activation/desactivation de tous les buttons d'actions 
        function disabledAllActions(masque){
            for(let action of actions){
                if(action.canSelect){
                    $('#'+action.id).prop('disabled',masque);  
                }
            }
        }
        
        let selectNameSelector= '#'+'{{ $name }} .dataTable-simple-selectItem';
        @if($attributes['selectName'])

            function  saytouActionYi(){
                let count= $(selectNameSelector).filter(':checked').length ;
                    disabledAllActions(true);
                    if(count==1){
                        disabledAllActions(false);
                    }
                    else if(count>1){
                        disabledActions('1',true);
                        disabledActions('*',false);
                    }
            }

            function updateSelectAll(){
                let count= $(selectNameSelector).filter('input:checkbox:not(":checked")').length ;
                if(count>0){
                    $("#{{ $name }} .dataTable-simple-selectAll").prop('checked',false);
                }
                else{
                    $("#{{ $name }} .dataTable-simple-selectAll").prop('checked',true);
                }
            }

            function gsSelectChange(){
                $(selectNameSelector+' , #{{ $idSelectAll }}').change(function(e){
                    saytouActionYi();
                    updateSelectAll();
                });
            }
            gsSelectChange();

            {{ $name }}.on('draw',function(){
                
                saytouActionYi();
                gsSelectChange();
            });
            

        @endif
        
        // Alerter
        function alerter(btn_data,title,message,success){
            if(btn_data.typeAlert=='modal'){
                let type = (success)?'panel-warning':'bg-danger text-white';
                let modalAlert=$.fn.nplModalAlert({
                            id:'modal_alert',
                            text:message,
                            type:type,
                            title:title,
                            data:btn_data,
                        });
                modalAlert.modal('show');
            }
            else{
                let classAdded='alert alert-success';
                let classRemoved='alert alert-danger';
                if(!success){
                    let t=classAdded;
                    classAdded=classRemoved;
                    classRemoved=t;
                }
                $.fn.nplAlertShow(idAlert,title+' : '+message,classAdded,classRemoved,2.5);
            }
        }

        // Les Actions
        @if($attributes['actions']) 
            actions=@json($attributes['actions']);
            function ajaxAction(btn_data){
                $.ajax({
                    type:'delete',
                    url: btn_data.url,
                    data: "data",
                    dataType: "json",
                    success: function (response) {
                        if(response.status){
                            alerter(btn_data,'Operation effectuée '+btn_data.op,message,true);
                        }
                        else{
                            alerter(btn_data,'Echec Opération '+btn_data.op,message,false);
                        }
                    },
                    error: async function (err){
                        $("#modal_suppression").on('hidden.bs.modal', function (e) {
                            $("#modal_suppression").remove();
                        });
                        await $("#modal_suppression").modal('hide');         
                        alerter(btn_data,'Echec Opération '+btn_data.op,'Ressource Indisponible, Vérifier la connexion',false);
                    }
                });
            }

            function onClickBtnAction(btn_data){
                $("#"+btn_data.id).on('click',function(e){
                    if(btn_data.confirm){
                        let modalConfirm=$.fn.nplModalConfirm({
                            id:'modal_suppression',
                            text:'Êtes vous sûre de vouloir continuer l\'operation '+btn_data.op,
                            type:'panel-warning',
                            title:'Suppression ',
                            data:btn_data,
                            fonction: ajaxAction
                        });
                        modalConfirm.modal('show');
                    }
                    else{
                        ajaxAction(btn_data);
                    }
                    
                });
            }

            function onClickBtnLink(btn_data){
                $("#"+btn_data.id).on('click',function(e){
                    let selectedInput = $(selectNameSelector).filter(':checked');
                    if(selectedInput.length == 1){
                        window.location.href=btn_data.url+'/'+selectedInput[0].value;
                    }
                });
            }
            
            for(action of actions){
                if(action.type=='action'){
                    onClickBtnAction(action);
                }
                else if(action.type=='link'){
                    onClickBtnLink(action);
                }
            }
            
            
        @endif       
    });
    
</script>

@endpush
