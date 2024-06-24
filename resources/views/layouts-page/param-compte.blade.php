@extends('layouts-page.noppal')

@section('head-body')
    <x-util.header/>
@endsection

@section('sidebar')
    <x-generic.navs.sidebar :model="App\Constante\ParamCompte\SidebarData::data()" id="sidebar" />
@endsection