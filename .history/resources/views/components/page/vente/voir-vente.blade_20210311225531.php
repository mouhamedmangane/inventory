@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.barlist/>
@endsection
<div class="container-fluid">
    <h6 class="display-4">N° C00000V0</h6>
  </div>

@section('ly-alert')
<div class="" id="addVenteAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection

@section('ly-title')

@endsection


@section('ly-main-content')
    <x-vente.voir-vente vente=$vente/>
@endsection

@section('ly-main-bot')

@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce