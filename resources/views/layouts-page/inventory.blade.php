@extends('layouts-page.noppal')

@section('header')
    <x-util.header/>
@endsection

@section('sidebar')
    <x-generic.navs.sidebar :model="App\Constante\Inventory\SidebarData::data()" id="sidebar" />
@endsection