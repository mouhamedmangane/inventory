@extends('layouts-page.empty')

@push('styleBody')
    <style>
        body{
            background:linear-gradient(90deg,#edebe9,#edebe9);
        }
    </style>
@endpush

@section('content')
<div>
    <div class="container mt-3" >

        <div class="mt-2">
            <div class="py-2">
                <h5 class="  py-2" >Mes Boutiques</h5>
            </div>
            <div class="my-2">
                <div class="d-flex flex-wrap">
                    @foreach ($boutiques as $boutique)
                        <div class="col-md-2">
                            <a href="{{ url("b/$boutique->id/produit") }}">
                                @php
                                   $background= App\Constante\Couleur::aléatoires($boutique->nom);
                                @endphp
                                <x-generic.carte.module :name="$boutique->nom" icon="store" class="bg-white"/>
                            </a>
                        </div>
                              
                    @endforeach
                </div>
                
         
            </div>
        </div>



        <div class="mt-5">
            <div class="py-2">
                <h5 class="py-2">Modules</h5>
            </div>
            <div class="my-2">
                <div class="d-flex flex-wrap">

                        <div class="col-md-2">
                            <a href="{{ url('param-compte/users') }}">
                                <x-generic.carte.module name="Parametre" icon="settings"  class="text-white bg-primary"/>
                           </a>
                        </div>

                        <div class="col-md-2">
                            <a href="{{ url('param-compte/users') }}">
                                <x-generic.carte.module name="Dashboard" icon="dashboard"  class="text-white bg-success"/>
                           </a>
                        </div>
                </div>
                
         
            </div>
        </div>
        
        
    </div>
</div>
@endsection