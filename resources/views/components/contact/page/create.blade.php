@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar class="">
        <x-generic.tool-bar.prev-button id="prev_tb" :url="URLInventory::wBurl('contact')"/>
        <x-generic.input.button-submit id="submit_produit_tb"
                                       idForm="create_contact_form"
                                       idContentAlert="listContactAlert"
                                       class="btn btn-primary btn-sm d-flex align-items-center mr-3"
                                       text="Enregistrer"
                                       :hrefId="URLInventory::wBurl('contact')"
                                       parentMessageClass=""
                                       elementMessageClass=""
                                       :isReset="false"
                                       icon="save"/>
        @if($contact->id)
            @if(empty($contact->archiver))
                @props(['icon_archiver'=>'archive','text_archiver'=>'Archiver','url_archiver'=>'contact/archiver/'])
            @else
                @props(['icon_archiver'=>'unarchive','text_archiver'=>'Désarchiver','url_archiver'=>'contact/desarchiver/'])
            @endif
            <x-generic.tool-bar.ajax id="archiver_contact_tb" :icon="$icon_archiver"  :text="$text_archiver"
            :url="url($url_archiver.$contact->id)" method="get"
            :redirect="'contact/'.$contact->id" idAlert="listContactAlert" />
        @endif

        <x-generic.tool-bar.divider/>

        <x-generic.tool-bar.link id="person_add" icon="person_add" :url="URLInventory::wBurl('contact/create')" text="Nouveau Contact"  />

    </x-generic.tool.bar.bar>
@endsection

@section('ly-alert')
    <x-generic.alert.bar id='listContactAlert' />
@endsection

@section('ly-title')
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="person" taille="16" />
        </x-slot>
        <x-generic.breadcumb.bar style="font-size: 18px;" class="py-0">
            <x-generic.breadcumb.item  class="lien-sp">
                <a href="{{ URLInventory::wBurl('contact') }}">Contacts</a>
            </x-generic.breadcumb.item>
            <x-generic.breadcumb.item active="true">
                {{ ($contact->id)?$contact->nom:'Nouveau Contact' }}
            </x-generic.breadcumb.item>
        </x-generic.breadcumb>

        <x-slot name="right">
            <div class="mr-4">
                <x-generic.infos.info-list >

                    @if($contact->id)
                        <x-generic.infos.info-item title="Compte" :value="$compte_info" icon="payment" :couleur="$couleurCompte_info" />
                        <x-generic.infos.info-item title="Statut" :value="$status_info" icon="assignment_turned_in" :couleur="$couleur_info" />

                    @endif
                </x-generic.infos.info-list>
            </div>
        </x-slot>
    </x-generic.title-bar.bar>
@endsection

@section('ly-main-content')
    <x-contact.util.create  :contact="$contact" />
@endsection
