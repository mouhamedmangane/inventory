@extends('layouts.noppal')


@section('content')
@extends('layouts.ly')

@section('ly-toolbar')
    <x-generic.tool-bar.bar />
@endsection

@section('ly-alert')
    <div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection

    <x-produit.new-product  />
@endsection