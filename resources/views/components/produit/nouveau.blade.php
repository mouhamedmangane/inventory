


<x-generic.tool-bar.bar/>
<div class=" ">
<div class="d-flex align-items-center px-4">
    <div  class="rounded-circle bg-info text-align center d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
        <i class="material-icons text-white">add_shopping_cart</i>
    </div>
    <h4 class="my-4 ml-2">
        <span>Nouveau Article</span>
        <i class="material-icons">keyboard_arrow_down</i>
    </h4>
</div>

<form action="" class="">
    <x-generic.navs-tabs.nav id="myTab" class="mt-2 mb-5 px-4">
        <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" />
        <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
        <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
    </x-generic.navs-tabs.nav>
    <x-generic.navs-tabs.content id="myTabContent" class="px-4">
        <x-generic.navs-tabs.pane id="general" active="true" >
           
           
           
           
           
           
           
           
            <div class="row">
                <div class="col-md-2" style="">
                    <div >
                        <div style="width: 150px; height:150px;position: relative; background-image:url('{{ asset("images/profig.jpg") }}') ;"
                             class="border">
                            <img src=""  width="150px" height="150px" alt="">
                            <div style="position: absolute;right: 0px;bottom:0px;;" >
                                <i class="material-icons">camera_alt</i>
                            </div>
                        </div>
                        
                        <div class="d-flex mt-1">
                            <button class="btn btn-sm text-white mr-1" style="background: rgba(0,0,139,.8);">
                                <i class="material-icons">edit</i>
                            </button>
                            <button class="btn btn-sm btn-danger mr-1" style="background: rgba(0,0,0,139,.8);">
                                <i class="material-icons">delete</i>
                            </button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <x-generic.forms.form-table>
                        <x-generic.forms.form-table-text name="nom" labelText="Nom Produit" required="true" placeholder="Nom Produit" /> 
                    </x-generic.forms.form-table>
                    <table class="table border">
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Nom Produit :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control    w-100" 
                                        placeholder="nom Produit">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Type Acticle:</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="Type de produit">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Reference Interne:</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="Reference">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">SKU</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control  w-100" 
                                        placeholder="SKU">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="table border">
                        
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Categorie d'article :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control w-100 " 
                                        placeholder="categorie d'article"
                                        value="All">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Prix Vente :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control w-100 " 
                                        placeholder="Prix de vente">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Taxes  :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="TVA">
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
        </x-generic.navs-tabs.pane>
        <x-generic.navs-tabs.pane id="vente" active="true" >
            
        </x-generic.navs-tabs.pane>
        <x-generic.navs-tabs.pane id="achat" active="true" >
            
        </x-generic.navs-tabs.pane>
    </x-generic.navs-tabs.content>    
   
</form>

</div>

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce