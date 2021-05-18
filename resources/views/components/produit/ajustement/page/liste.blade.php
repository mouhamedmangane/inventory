@extends('layouts.ly-list')



@section('header')
    <link rel="stylesheet" href="{{ URL::asset('plugin/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.bar >
        <x-generic.tool-bar.prev-button id="prev_tb"  url="/produit/ajustement"  />

        <x-generic.tool-bar.link id="nouveau_prod_tb" text="Nouveau" icon="add" url="/produit/ajustement/new" evidence="btn-primary" />
        <x-generic.tool-bar.button id="modifier_prod_tb" text="Modifier" icon="edit"  disabled="disabled" />
        <x-generic.tool-bar.button id="supprimer_prod_tb" text="Supprimer" icon="delete"  disabled="disabled" />
        <x-generic.tool-bar.divider/>
        <x-generic.tool-bar.button id="imprimer_prod_tb" text="Imprimer" icon="print"  />
        <x-generic.data-table.group-by-btn id="groupby_prod_tb"  label="Grouper Par" idDataTable="myDataTable"
                                           :dt="['date'=>'Date d\'ajustement','produit'=>'Produit Ajusté']" defaultSelected=''  />
    </x-generic.tool-bar.bar>
@endsection


@section('ly-alert')
    <div class="" id="" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection
@section("ly-title")
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="gavel" taille="16"/>
        </x-slot>
        <x-generic.links.select-link-dt idDataTable="myDataTable" value="tous"
                                    :dt="[
                                        url('produit/ajustement/data')=>'Liste Ajustements',
                                        url('produit/ajustement/data/')=>'Liste Ajustements Archivés',
                                    ]"
                                    class="mx-2" />
        <x-slot name="right">
            <x-generic.filters.search-filter id='mySearch' name="tous" dataTableId="myDataTable" />
        </x-slot>
    </x-generic.title-bar.bar>
@endsection




@section('ly-main-content')
    <x-produit.ajustement.util.liste/>
@endsection



@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce
