
    @section('ly-main-top')
        <x-generic.navs-tabs.nav id="tabProduct" class=" ">
            <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab" active="true" classLink="ml-3" />
            {{-- <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab"  /> --}}
            {{-- <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  /> --}}
            <x-generic.navs-tabs.item text="Mouvement Stock" idPane="stock" id="stock-tab"  />
            {{-- <x-generic.navs-tabs.item text="Statistique" idPane="statistique" id="statistique-tab"  /> --}}
            <x-generic.navs-tabs.item text="Historique" idPane="historique" id="historique-tab"  />

        </x-generic.navs-tabs.nav>

    @endsection
        <x-generic.navs-tabs.content id="tabProductContent" class="px-4 py-3" >

                <x-generic.navs-tabs.pane id="general" active="true"  >
                    <div class="row m-auto">
                        <div class="col-md-8">
                                <div class="col-md-12 justify-content-center mr-0">

                                    <x-generic.forms.form-table >
                                        <x-generic.forms.form-table-item>
                                            <h4 class="text-primary" >{{$produit->libelle}}</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <x-slot name="label">
                                                        <x-generic.forms.form-table-label  labelText="Image" :required="false" />
                                                    </x-slot>
                                                    <x-generic.input.photo id="photo" name="photo" activeText="false" :url='asset("images/produits/$produit->img")' x="220" y="220" />

                                                </div>

                                                <div class="col-md-8">
                                                    <table style="font-size: 0.8rem;">

                                                    <tr style="line-height: 70%">
                                                        <td style="width: 70%;"class="text-muted">Categorie :</td>
                                                        <td> <span class="font-weight-bold" style="font-size:15px ">{{$produit->groupe_produit->groupe_name}}</span></td>

                                                    </tr>
                                                    <tr style="line-height: 50%">
                                                        <td style="width: 50%;"class="text-muted">Type :</td>
                                                        <th> <span class="font-weight-bold" style="font-size:15px ">{{$produit->type}}</span></th>

                                                    </tr>

                                                    <tr style="">
                                                        <td class="text-muted ">Code :</td>
                                                        <th > <span class="font-weight-bold" style="font-size:15px ">{{$produit->code}}</span></th>

                                                    </tr>
                                                    <tr style="line-height: 50%">
                                                        <td class="text-muted ">R.Interne :</td>
                                                        <th> <span class="font-weight-bold" style="font-size:15px ">{{$produit->rI}}</span></th>
                                                    </tr>
                                                    <tr style="line-height: 50%">
                                                        <td class="text-muted ">Peut être vendu :</td>
                                                        <th>
                                                                <x-generic.input.checkbox id="estvendu" name="estvendu" :checked="$produit->vendable" disabled="disabled" />
                                                        </th>
                                                    </tr>
                                                    <tr style="line-height: 20%">
                                                        <td class="text-muted ">Peut être acheté :</td>
                                                        <th>
                                                            <x-generic.input.checkbox id="estvendu" name="estvendu" :checked="$produit->achetable" disabled="disabled" />


                                                        </th>
                                                    </tr>
                                                    </table>

                                                </div>
                                            </div>

                                        </x-generic.forms.form-table-item>
                                    </x-generic.forms.form-table >
                                </div>



                                 @if ($produit->isPaquet())
                                <div class="col-md-12 ">
                                    <x-generic.forms.form-table>
                                        <x-generic.forms.form-table-item>
                                            <h5 class="text-primary mt-2" >Composants</h5>
                                            <x-generic.data-table.simple class="" name="myDataTable" :data="$getComposants()" :columns="$composants()" dom="t"
                                            idDivPaginate="bass-right" idDivInfo="bas-left" searchId='mySearch'/>
                                        </x-generic.forms.form-table-item>

                                    </x-generic.forms.form-table>

                                </div>
                                 @endif

                        </div>

                        <div class="col-md-4">


                                    <x-generic.forms.form-table>
                                        <x-generic.forms.form-table-item>

                                            <table class="table table-sm " >
                                                <h6 class="text-primary" >Situation Stock <span width=20px height="20px" class="badge badge-warning "> ok</span></h6>

                                                <tr style="line-height: 50% ;">

                                                    <th style="width: 30%;"> <span class="font-weight-bold text-muted text-align-center" style="font-size:10px ">Stock</span></th>
                                                    <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">Seuil</span></th>
                                                    <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px "></span></th>


                                                </tr>

                                                <tr>
                                                    <th class="align-middle"> <span class="font-weight-bold" style="font-size:18px ">{{$produit->qteStock}}</span></th>
                                                    <th class="align-middle"> <span class="font-weight-lighter" style="font-size:15px ">{{$produit->qteSeuil}}</span></th>
                                                    <th> <span class="badge badge-primary">{{$produit->unite}} </span></th>


                                                </tr>

                                            </table>
                                        </x-generic.forms.form-table-item>

                                    </x-generic.forms.form-table>

                             @if ($produit->prixVenteMin!= NULL)

                                <x-generic.forms.form-table>
                                    <x-generic.forms.form-table-item>

                                        <table class="table table-sm m-auto" >
                                            <h6 class="text-primary" >Prix de Vente</h6>

                                            <tr style="line-height: 50% ;">
                                                <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">min</span></th>

                                                @if ($produit->prixVenteMin!==$produit->prixVenteMax)
                                                    <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">max</span></th>
                                                @endif
                                                <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px "></span></th>



                                            </tr>

                                            <tr>
                                                <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixVenteMin,0,','," ")}}</span></th>
                                                @if ($produit->prixVenteMin!==$produit->prixVenteMax)

                                                    <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixVenteMax,0,','," ")}}</span></th>
                                                @endif
                                                <th> <span class="badge badge-primary">FCFA </span></th>
                                            </tr>

                                        </table>
                                    </x-generic.forms.form-table-item>

                                </x-generic.forms.form-table>

                            @endif
                            @if ($produit->prixAchatMin!= NULL)

                                <x-generic.forms.form-table>
                                    <x-generic.forms.form-table-item>

                                        <table class="table table-sm m-auto" >
                                            <h6 class="text-primary" >Prix d'Achat</h6>

                                            <tr style="line-height: 50% ;">
                                                <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">min</span></th>

                                                @if ($produit->prixAchatMin!==$produit->prixAchatMax)
                                                    <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">max</span></th>
                                                @endif
                                                <th > <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px "></span></th>



                                            </tr>

                                            <tr>
                                                <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixAchatMin,0,','," ")}}</span></th>
                                                @if ($produit->prixAchatMin!==$produit->prixAchatMax)
                                                    <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixAchatMax,0,','," ")}}</span></th>
                                                @endif
                                                <th> <span class="badge badge-primary">FCFA </span></th>
                                            </tr>

                                        </table>
                                    </x-generic.forms.form-table-item>

                                </x-generic.forms.form-table>

                            @endif

                        </div>
                    </div>
                </x-generic.navs-tabs.pane>



                <x-generic.navs-tabs.pane id="historique" >
                    <div class="row">

                            les modifications
                            les quantités de ventes par jour
                            les quantité d'achats par jour
                    </div>
                </x-generic.navs-tabs.pane>


                <x-generic.navs-tabs.pane id="vente" >


                        <div class="row">
                            <div class="col-md-9 col-sm-12  m-auto">
                                <x-generic.forms.form-table>
                                     <x-generic.forms.form-table-item>

                                        <table class="table table-sm m-auto" >
                                            <tr>
                                                <td style="width: 30%;"></td>
                                                <th style="width: 30%;"> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">min</span></th>
                                                <th> <span class="font-weight-lighter text-muted text-align-center" style="font-size:10px ">max</span></th>


                                            </tr>

                                            <tr>
                                                <td class="text-muted ">Prix Vente :</td>
                                                <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixVenteMin,0,','," ")}}<button class="btn align-middle"><span class="badge badge-primary">FCFA</span></button></span></th>
                                                <th> <span class="font-weight-bold" style="font-size:15px ">{{number_format($produit->prixVenteMax,0,','," ")}}<button class="btn align-middle"><span class="badge badge-primary">FCFA </span></button></span></th>

                                            </tr>

                                        </table>
                                    </x-generic.forms.form-table-item>



                                </x-generic.forms.form-table>
                            </div>
                             <div class="col-lg-12 col-md-12 col-sm-12  ">
                                <x-generic.forms.form-table>
                                    <x-generic.forms.form-table-item>
                                        <div>Reductions</div>
                                        {{-- <x-generic.noppal-editor-table.table
                                        idTable='reductions'
                                        :dd="[]"
                                        :columns="$getColumnsReductions()"/> --}}


                                    </x-generic.forms.form-table-item>

                                </x-generic.forms.form-table>
                            </div>

                        </div>
                </x-generic.navs-tabs.pane>




                <x-generic.navs-tabs.pane id="stock" >

                    <div class="row">
                        Mouvement Stock (entree achat sortie vente rejet ajustement ) tableau E/S quantité action date


                    </div>
                </x-generic.navs-tabs.pane>


         </x-generic.navs-tabs.content>


    @once
         @push('script')
             {{-- <script type="text/javascript">
                $("#photo").on("change",function(){
                    alert("changement phote");
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    $.ajax({
                        type:'',
                        url: "produit/edit/img/ ",
                        data: "data",
                        dataType: "json",
                        success: function (response) {
                            if(response.status){
                                alerter(btn_data,'Operation effectuée '+btn_data.op,message,true);
                                disabledAllActions(false);
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
                     });

             </script>--}}
         @endpush
     @endonce




