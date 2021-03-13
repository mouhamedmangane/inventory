@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar/>
@endsection


@section('ly-alert')
<div class="" id="addVenteAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection

@section('ly-title')

@endsection


@section('ly-main-content')
    <x-vente.voir-vente vente=$vente    />
@endsection

@section('ly-main-bot')

@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce