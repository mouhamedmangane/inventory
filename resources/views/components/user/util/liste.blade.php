<x-generic.data-table.simple 
    class="ly-list-table"
    scrollY="100"
    name="myDataTable"
    url="{{ url('/param-compte/users/data') }}"
    :columns="$getHeadTable()"
    dom="t"
    selectName="user_select" 
    selectColWidth="150px"
    searchId="mySearch"
    :actions="[
        ['op'=>'Suppression','id'=>'supprimer_user_tb',
         'url'=>url('param-compte/users'),'type'=>'action','method'=>'DELETE',
         'canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'
        ],
        ['op'=>'Archivage','id'=>'archiver_user_tb',
         'url'=>'/testRemove','type'=>'action',
         'canSelect'=>'*','confirm'=>true
        ],
        ['op'=>'Modification','id'=>'modifier_prod_tb',
        'url'=>url('param-compte/users'),
        'type'=>'link','canSelect'=>'1'
        ],
    ]"

/>