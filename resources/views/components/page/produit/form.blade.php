
@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar >
        <x-generic.tool-bar.prev-button id="prev_tb"  url="/produit/"  />
        <x-generic.input.button-submit  id="test-button-submit"
                                        idForm="addProduct"
                                        idContentAlert="addProduitAlert"
                                        class="btn btn-primary btn-sm d-flex align-items-center mr-3 "
                                        text="Enregistrer"
                                        isReset="true"
                                        {{-- hrefId="/produit/list" --}}j
                                        parentMessageClass="n-form-table-col-input"
                                        elementMessageClass="form-table-feedback"
                                        icon="save"/>
        <x-generic.tool-bar.button id="modifier_prod_tb" text="Annuler" icon="clear" evidence=""  />
        <x-generic.tool-bar.button id="new_categorie" text="Nouvelle Catégorie" icon="add" evidence="" />

    </x-generic.tool-bar.bar >
@endsection

@section('ly-alert')
    <div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection
@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div class="rounded-circle border  text-align center d-flex align-items-center justify-content-center"
             style="width: 43px; height: 43px; background: rgba(0,0,0,.1);"{{--@if ($attributes['img'])border-color:black!important;@endif"--}}>
           {{-- @if ($attributes['img'])    ! --}}
           @if(false)
                <img src="{{ asset("images/profig.jpg") }}"
                    width="43px"
                    height="43px"
                    class="rounded-circle"
                    style=""
                >
            @else
             <i class="material-icons">add_shopping_cart</i>
            @endif
        </div>
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/produit/newProd'=>'Nouveau Produit Simple','/test2'=>'Nouveau Produit Composé']" />
    </div>

</div>
@endsection



@section('ly-main-content')
    <x-produit.new-product  />
@endsection



@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce
