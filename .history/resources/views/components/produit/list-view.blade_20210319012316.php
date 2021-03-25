
        <x-generic.data-table.simple 
            class="ly-list-table table-fixed"
            scrollY="100"
            name="myDataTable" url="{{ url('/produit/data/') }}" :columns="$columns()"
            idDivPaginate="bass-right" idDivInfo="bas-left" pageLength="10"
            selectName="myDataTableSelect" searchId='mySearch'
            pageLength="25"
            idAlert="addProduitAlert"
            groupByEnable="true"
            {{-- groupBy="categorie" --}}
            :actions="[
                ['op'=>'Suppression','id'=>'supprimer_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'],
                ['op'=>'Archivage','id'=>'archiver_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Favoris','id'=>'favoris_btn_id','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Modifier','id'=>'modifier_prod_tb','url'=>'/produit','type'=>'link','canSelect'=>'1'],
            ]"
            />
 

@endsection

@section('ly-main-bot')
    <div class="d-flex justify-content-between align-items-center  border">
        <div id='bas-left' class="ml-2">
        </div>
        <div id="bass-right" class="mr-2 d-flex">

        </div>
    </div>

@endsection
