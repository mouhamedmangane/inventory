@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Boutique & Droit"  idPane="droit" id="droit-tab" />
    <x-generic.navs-tabs.item text="Details" idPane="details" id="details-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="" method="post" id="create_user_form">
    @csrf
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >  
        {{-- div general --}}
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <x-generic.forms.form-table-line class=" rounded rounded-circle ">
                        <x-slot name="label">
                            <x-generic.forms.form-table-label  labelText="Photo Profil" :required="false" />
                        </x-slot>
                        <x-generic.input.photo id="photo" name="photo" url="" x="150" y="150" classImage=" rounded-circle"/>
                     </x-generic.forms.form-table-line>
                </div>
                
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-text name="prenom" labelText="Prenom" 
                                required="true" placeholder="Donner le prenom" id="prenom"/> 
                       
                        <x-generic.forms.form-table-text name="nom" labelText="nom" 
                                required="true"  placeholder="Donner le nom" id="nom" />

                        <x-generic.forms.form-table-text name="prenom" labelText="login" 
                                required="true" placeholder="Donner le login" id="prenom"/> 

                        <x-generic.forms.form-table-text name="nom" labelText="Mot de passe" 
                                required="true"  placeholder="Creer un mot de passe" id="password" typpe="password" />   

                        <x-generic.forms.form-table-text name="nom" labelText="Confirmer mot de passe"
                                 required="true"  placeholder="Confirmer le mot de passe" id="password-confirm" typpe="password"/>              
                         
                    </x-generic.forms.form-table>
                </div>

            </div>
        </x-generic.navs-tabs.pane>
        {{-- droit --}}
        <x-generic.navs-tabs.pane id="droit"  >
           {{-- <x-user.util.boutiques-access /> --}}
            
        </x-generic.navs-tabs.pane>


    </x-generic.navs-tabs.content>

</form>