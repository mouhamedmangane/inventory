@if(isset($contact->id))
   @props([
        'url_form'=>url(URLInventory::wB("contact/".$contact->id)),
        'method_form'=>'post'
   ])
@else
    @props([
        'url_form'=>URLInventory::wBurl("contact/"),
        'method_form'=>'post'
    ])
@endif



@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text=""  idPane="droit" id="droit-tab" />
    <x-generic.navs-tabs.item text="Details" idPane="details" id="details-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="{{ $url_form}}" method="post" id="create_contact_form" enctype="multipart/form-data">
    @if(isset($contact->id))
        @method('PUT')
    @endif
    @csrf
    <input type="hidden" value="{{ $contact->id }}">
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
        {{-- div general --}}
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">

                    <div class="shadow border mb-3 p-2">
                        <x-generic.input.photo id="photo" name="photo"
                                               :url="(isset($contact->photo) && !empty($contact->photo))?asset('images/contacts/'.$contact->photo):''" x="150" y="150"
                                               classImage=" rounded-circle"/>
                    </div>

                     <x-generic.forms.form-table>
                        <x-generic.forms.form-table-multi-check name="client_fournisseur" labelText="Le Contact" required="true" type="switch"
                        :dt="['client'=>'Client','fournisseur'=>'Founisseur']" :value="$client_fournisseur" />
                        @if(!$contact->id)
                            <x-generic.forms.form-table-text name="compte" labelText="Etat Compte Initial" :value="$contact->compte"
                                typpe="number"  placeholder="Ex : 1000 ou -1000" id="email"  />
                        @endif
                    </x-generic.forms.form-table>
                </div>


                <div class="col-lg-7 col-md-6 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-text name="nom" labelText="nom" :value="$contact->nom"
                                required="true"  placeholder="Donner le nom" id="nom"  />

                        <x-generic.forms.form-table-text name="email" labelText="Email" :value="$contact->email"
                                required="true" placeholder="Donner le login" id="Email"/>

                        <x-generic.forms.form-table-text name="ncni" labelText="N° CNI" :value="$contact->ncni"
                                   placeholder="N° carte d'identité" id="ncni" />

                        <x-generic.forms.form-table-telephone name="tel1" labelText="Telephone 1"  :indicatif="$telephones[0]['indicatif']"
                                 :numero="$telephones[0]['numero']" :idTelephone="$telephones[0]['id']"
                                 required="true"  placeholder="Donner le Telephone" id="telephone1" />
                        <x-generic.forms.form-table-telephone name="tel2" labelText="Telephone 2"  :indicatif="$telephones[1]['indicatif']"
                                :numero="$telephones[1]['numero']" :idTelephone="$telephones[1]['id']"
                                 placeholder="Donner le Telep  hone" id="telephone1" />

                        <x-generic.forms.form-table-text name="fonction" labelText="Fonction" :value="$contact->fonction"
                                    placeholder="Ex: électricien,livreur ..." id="fonction" />

                    </x-generic.forms.form-table>
                </div>




            </div>
        </x-generic.navs-tabs.pane>
        {{-- droit --}}
        <x-generic.navs-tabs.pane id="droit"  >
        </x-generic.navs-tabs.pane>


    </x-generic.navs-tabs.content>

</form>
<div>
    <!-- An unexamined life is not worth living. - Socrates -->
</div>
