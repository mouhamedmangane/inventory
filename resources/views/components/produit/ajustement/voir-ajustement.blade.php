
      <div class="col-md-3">

        <x-generic.forms.form-table >
            <x-generic.forms.form-table-item>
                    <h6 class="text-primary" >Enregistré le:</h6>

                    <table style="font-size: 0.8rem;">

                        <tr style="line-height: 70%">
                            <td> <span class="font-weight-bold" style="font-size:15px ">{{$ajustement->created_at}}</span></td>

                        </tr>
                    </table>
             </x-generic.forms.form-table-item>

        </x-generic.forms.form-table >
    </div>

            <div class=" col-md-6">

        <x-generic.forms.form-table >
            <x-generic.forms.form-table-item>
                <h6 class="text-primary" >Note: </h6>


                    <tr style="line-height: 70%">
                        <td>
                            <textarea class="form-control" name="" id="" rows="2">{{$ajustement->note}}</textarea>
                        </td>

                    </tr>

                </x-generic.forms.form-table-item>

            </x-generic.forms.form-table >


            </div>



        <x-generic.data-table.simple
        class="ly-list-table table-fixed"
        scrollY="100"
        name="myDataTable" :data="$lignes()" :columns="$columns()"
        idDivPaginate="bass-right" idDivInfo="bas-left" pageLength="10"
        selectName="myDataTableSelect" searchId='mySearch'
        pageLength="25"
        idAlert="addProduitAlert"
        {{-- groupByEnable="true"
        groupBy="date" --}}
        :actions="[
            ['op'=>'Suppression','id'=>'supprimer_prod_tb','url'=>'produit/delete/','type'=>'action','canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'],
            ['op'=>'Archivage','id'=>'archiver_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
            ['op'=>'Favoris','id'=>'favoris_btn_id','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
            ['op'=>'Modifier','id'=>'modifier_prod_tb','url'=>'/produit','type'=>'link','canSelect'=>'1'],
        ]"
        />


