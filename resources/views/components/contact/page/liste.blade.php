@extends('layouts.ly-list')

@section("ly-toolbar")
    <x-generic.tool-bar.bar>
        <x-generic.tool-bar.link id="nouveau_contact_tb" icon="add" text="Nouveau" url="{{ URLInventory::wBurl('contact/create') }}"  evidence="btn-primary"/>

        <x-generic.tool-bar.button id="modifier_contact_tb" icon="edit" text="Modifier"/>
        <x-generic.tool-bar.button id="supprimer_contact_tb" icon="delete" text="Supprimer" />
        <x-generic.tool-bar.button id="archiver_contact_tb" icon="archive" text="Archiver"/>
        <x-generic.tool-bar.button id="desarchiver_contact_tb" icon="unarchive" text="Déarchiver"/>
        <x-generic.filters.filter :filter="$getFilter()"/>
        <x-generic.data-table.group-by-btn id="groupby_contact_tb"  label="Grouper Par" idDataTable="myDataTable"
                                           :dt="['type'=>'type']" defaultSelected=''  />

    </x-generic.tool-bar.bar>
@endsection

@section("ly-title")
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="people" taille="16"/>
        </x-slot>
        <x-generic.links.select-link-dt idDataTable="myDataTable" value="tous"
                                    :dt="[
                                        URLInventory::wBurl('contact/data')=>'Tous les Contacts',
                                        URLInventory::wBurl('contact/data/client')=>'Clients',
                                        URLInventory::wBurl('contact/data/client_dette')=>'Clients Endettés',
                                        URLInventory::wBurl('contact/data/client_credit')=>'Clients Créditeurs',
                                        URLInventory::wBurl('contact/data/fournisseur')=>'Fournisseurs',
                                        URLInventory::wBurl('contact/data/fournisseur_dette')=>'Fournisseur Endettés',
                                        URLInventory::wBurl('contact/data/fournisseur_credit')=>'Fournisseur Créditeurs',
                                        URLInventory::wBurl('contact/data/archiver')=>'Contacts Archivés',
                                    ]"
                                    class="mx-2" />
        <x-slot name="right">
            <x-generic.filters.search-filter id='mySearch' name="tous" dataTableId="myDataTable" />
        </x-slot>
    </x-generic.title-bar.bar>
@endsection


@section('ly-main-content')
    <x-contact.util.liste :liste="$liste" />
@endsection
