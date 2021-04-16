@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar> 
        <x-generic.tool-bar.prev-button id="prev_tb" url=""/>
        <x-generic.input.button-submit id="submit_produit_tb"
                                       idForm="create_user_form"
                                       idContentAlert="listUserAlert"
                                       class="btn btn-primary btn-sm d-flex align-items-center mr-3"
                                       text="Enregistrer"
                                       isReset=""
                                       parentMessageClass=""
                                       elementMessageClass=""
                                       icon="save"/>
        <x-generic.tool-bar.link id="all_user" icon="group  " url="/param-compte/users" text="Tous les utilisateurs"  />

    </x-generic.tool.bar.bar>
@endsection

@section('ly-alert')
    <x-generic.alert.bar id='listUserAlert' />
@endsection

@section('ly-title')
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="user" taille="16" />
        </x-slot>
        <x-generic.links.select-link contentCible="my-main" 
                                     value="test1" class="mx-2" 
                                    :dt="['/produit/data/'=>'Nouveau Utilisateur']" />

        <x-slot name="right">
            <x-generic.filters.search-filter id="mySearch" name="all" dataTableId='myDataTable' />
        </x-slot>
    </x-generic.title-bar.bar>
@endsection

@section('ly-main-content')
    <x-user.util.create  :user="$user" />
@endsection
