
@extends('layouts.ly')


@section('header')
    <link rel="stylesheet" href="{{ URL::asset("plugin/DataTables/datatables.min.css") }}">  
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">  
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.barlist/>
@endsection



@section('ly-alert')
<div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection


@section('ly-title')
<div class="d-flex align-items-center justify-content-between pl-3 mt-1" >
    <div class="d-flex align-items-center my-2">
        {{-- <div  class="bg-primary text-white rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px;@if ($attributes['img'])border-color:black!important;@endif">
            @if ($attributes['img'])
                <img src="{{ asset("images/profig.jpg") }}"  
              width="43px"
              height="43px"
              class="rounded-circle" 
              style="">
            @else 
             <i class="material-icons md-18 ">assignment</i>
            @endif
            
        </div> --}}
         <x-generic.links.select-link contentCible="my-main" value="test1"  class="ml-2"
                                      :dt="['/test1'=>'Liste Produits','/test2'=>'Produit  Vendable']" />
        
    </div>
    <div class="col-md-5 d-flex aligns-items-center pr-2" >

        <div class="w-100 position-relative "  >
            <input type="text" class="form-control border" style="width: 100%;" placeholder="Rechercher">
            <i class="material-icons text-muted position-absolute" style="top:6px;right: 10px;color:#dee2e6;">search</i>
        </div>
    </div>
</div>
@endsection


@section('ly-main-content')
<div class=" pt-2">
    <x-generic.data-table.simple name="myDataTable" 
       url="{{ url('/produit/testDataTable')}}"
       :columns="$columns()"
       idDivPaginate="bass-right"
       idDivInfo="bas-left"
       {{-- selectName="myDataTableSelect" --}}
       pageLength="25" />
</div>
   
@endsection

@section('ly-main-bot')
<div class="d-flex justify-content-between align-items-center  border">
  <div id='bas-left' class="ml-2">
    
  </div> 
  <div id="bass-right" class="mr-2 d-flex">

  </div>
</div>
   
@endsection

