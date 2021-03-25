@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar> 
        <x-generic.tool-bar.prev-button id="prev_tb" url=""/>
        <x-generic.input.button-submit id="submit_produit_tb"
                                       idForm=""
                                       idContentAlert="listUserAlert"
                                       class=""
                                       text=""
                                       isReset=""
                                       parentMessageClass=""
                                       elementMessageClass=""
                                       iscon=""/>
        <x-generic.toolbar-link id="all_user" icon="users" url="/param-compte/users"  />

    </x-generic.tool.bar.bar>
@endsection

@section('ly-alert')
    <x-generic.alert.bar id='listUserAlert' />
@endsection

@section('ly-title')
    
@endsection

