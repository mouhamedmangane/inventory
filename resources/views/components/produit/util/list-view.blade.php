        <x-generic.data-table.simple
            class="ly-list-table table-fixed"
            scrollY="100"
            name="myDataTable" url="{{ url('/produit/data/') }}" :columns="$columns()"
            idDivPaginate="bass-right" idDivInfo="bas-left" pageLength="10"
            selectName="myDataTableSelect" searchId='mySearch'
            pageLength="6"
            idAlert="addProduitAlert"
            groupByEnable="true"
            groupBy=""
            :actions="[
                ['op'=>'Suppression','id'=>'supprimer_prod_tb','url'=>'produit/delete/','type'=>'action','canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'],
                ['op'=>'Archivage','id'=>'archiver_prod_tb','url'=>'/produit/archived/','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Favoris','id'=>'favoris_btn_id','url'=>'/produit/favoris','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Modifier','id'=>'modifier_prod_tb','url'=>'/produit/{id}/edit','type'=>'link','canSelect'=>'1'],
                ['op'=>'Filtre','id'=>'filtrer_prod_tb','url'=>'/produit/filtrer/{filter}','type'=>'link','canSelect'=>'1'],
            ]"
            />


