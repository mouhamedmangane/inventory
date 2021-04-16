

        <div class="row">
            <div class="col-md-5">

              <x-generic.forms.form-table >
                  <x-generic.forms.form-table-item>

                          <table style="">
                              <td><h6 class="text-primary" >Note :</h6></td>

                              <tr style="">

                                  <td> <span class="font-weight-bold" style="font-size:15px ">{{$ajustement->note}}</span></td>

                              </tr>
                          </table>
                   </x-generic.forms.form-table-item>

              </x-generic.forms.form-table >
          </div>

          <div class="col-md-12">
            <x-generic.data-table.simple
                class="ly-list-table table-fixed"
                scrollY="100"
                name="myDataTable" :data="$lignes()" :columns="$columns()"
                idDivPaginate="bass-right" idDivInfo="bas-left" pageLength="10"
                selectName="myDataTableSelect" searchId='mySearch'
                pageLength="25"
                idAlert=""
                groupByEnable="true"
                groupBy="date"
                :actions="[
                    {{-- ['op'=>'Suppression','id'=>'supprimer_prod_tb','url'=>'produit/delete/','type'=>'action','canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'],
                    ['op'=>'Archivage','id'=>'archiver_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                    ['op'=>'Favoris','id'=>'favoris_btn_id','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                    ['op'=>'Modifier','id'=>'modifier_prod_tb','url'=>'/produit','type'=>'link','canSelect'=>'1'], --}}
                ]"
            />

          </div>



      </div>
