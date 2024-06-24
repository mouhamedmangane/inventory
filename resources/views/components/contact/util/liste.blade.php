<x-generic.data-table.simple
    class="ly-list-table"
    scrollY="100"
    name="myDataTable"
    url="{{ URLInventory::wBurl('contact/data') }}"
    :columns="$getHeadTable()"
    dom="t"
    groupByEnable="true"
    groupBy=""
    selectName="contact_select"
    selectColWidth="150px"
    searchId="mySearch"
    :actions="[
        ['op'=>'Suppression','id'=>'supprimer_contact_tb',
         'url'=>URLInventory::wBurl('contact'),'type'=>'action','method'=>'DELETE',
         'canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'
        ],
        ['op'=>'Archivage','id'=>'archiver_contact_tb',
         'url'=>URLInventory::wBurl('contact/archiverMany'), 'type'=>'action',
         'canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'
        ],
        ['op'=>'Archivage','id'=>'desarchiver_contact_tb',
         'url'=>URLInventory::wBurl('contact/desarchiverMany'),'type'=>'action',
         'canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'
        ],
        ['op'=>'Modification','id'=>'modifier_contact_tb',
        'url'=>URLInventory::wBurl('contact/{id}/edit'),
        'type'=>'link','canSelect'=>'1'
        ],
    ]"

/>
