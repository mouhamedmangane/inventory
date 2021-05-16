@if(isset($contact->id))
   @props([
        'url_form'=>url("contact/".$contact->id),
        'method_form'=>'post'
   ]) 
@else
    @props([
        'url_form'=>url("contact/"),
        'method_form'=>'post'
    ]) 
@endif



@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Boutique & Droit"  idPane="droit" id="droit-tab" />
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
                
                
                
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-text name="nom" labelText="nom" :value="$contact->nom"
                                required="true"  placeholder="Donner le nom" id="nom"  />

                        <x-generic.forms.form-table-text name="email" labelText="Email" :value="$contact->email" 
                                required="true" placeholder="Donner le login" id="Email"/> 
            
                        <x-generic.forms.form-table-text name="ncni" labelText="N° CNI" :value="$contact->ncni"
                                   placeholder="N° carte d'identité" id="ncni" />

                        <x-generic.forms.form-table-telephone name="tel1" labelText="Telephone 1"  indicatif="" numero=""
                                 required="true"  placeholder="Donner le Telephone" id="telephone1" />
                        <x-generic.forms.form-table-telephone name="tel2" labelText="Telephone 2"  indicatif="" numero=""
                                 placeholder="Donner le Telep  hone" id="telephone1" />

                    </x-generic.forms.form-table>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-12">
                    <x-generic.forms.form-table-line class=" rounded rounded-circle ">
                        <x-slot name="label">
                            <x-generic.forms.form-table-label  labelText="Photo Profil" :required="false" />
                        </x-slot>
                        <x-generic.input.photo id="photo" name="photo" :url="(isset($contact->photo) && !empty($contact->photo))?asset('images/contacts/'.$contact->photo):''" x="150" y="150" classImage=" rounded-circle"/>
                     </x-generic.forms.form-table-line>
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