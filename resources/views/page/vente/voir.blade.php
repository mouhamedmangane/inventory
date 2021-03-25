@extends('layouts-page.inventory')

@section('content')
    <x-page.vente.voir-vente :vente="$vente"/>
@endsection