@extends('layouts-page.noppal')

@section('header')
    <x-util.header/>
@endsection

@section('sidebar')
    <x-generic.navs.sidebar :model="App\Constante\ParamCompte\SidebarData::data()" id="sidebar" />
@endsection