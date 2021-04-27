@extends('layouts.ly-list')

@section("ly-toolbar")
    <x-generic.tool-bar.bar>
        <x-generic.tool-bar.link id="nouveau_user_tb" icon="add" text="Nouveau" url="{{ url('param-compte/users/create') }}"  evidence="btn-primary"/>
        
        <x-generic.tool-bar.button id="modifier_user_tb" icon="edit" text="Modifier"/>
        {{-- <x-generic.tool-bar.button id="supprimer_user_tb" icon="delete" text="Supprimer" /> --}}
        <x-generic.tool-bar.button id="archiver_user_tb" icon="archive" text="Archiver"/>
        <x-generic.tool-bar.button id="desarchiver_user_tb" icon="unarchive" text="Déarchiver"/>
    </x-generic.tool-bar.bar>
@endsection

@section("ly-title")
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="group" taille="16"/>
        </x-slot>
        <x-generic.links.select-link-dt idDataTable="myDataTable" value="tous" 
                                    :dt="[
                                        url('param-compte/users/data')=>'Liste des Utilisateurs',
                                        url('param-compte/users/data/archiver')=>'Liste des Utilisateurs Archivées',
                                    ]" 
                                    class="mx-2" />
        <x-slot name="right">
            <x-generic.filters.search-filter id='mySearch' name="tous" dataTableId="myDataTable" />
        </x-slot>
    </x-generic.title-bar.bar>
@endsection


@section('ly-main-content')
    <x-user.util.liste :users="$users" />
@endsection