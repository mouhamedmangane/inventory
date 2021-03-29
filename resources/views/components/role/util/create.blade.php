@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Details" idPane="details" id="details-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="" method="post" id="create_user_form">
    @csrf
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >  
        {{-- div general --}}
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-text name="nom" labelText="Nom Role" 
                                required="true" placeholder="Nom role" id="nom_role"/>              
                         
                    </x-generic.forms.form-table>
                </div>

            </div>
            <div class=" mt-1 ">
                <x-generic.forms.form-table >

                    <x-generic.forms.form-table-item class=" rounded rounded-circle ">

                        <h6 class="text-underline pb-2 border-bottom">Liste Droits</h6>
                        

                        <x-role.util.droit-objet-group />

                    </x-generic.forms.form-table-item>

                </x-generic.forms.form-table>
            </div>
        </x-generic.navs-tabs.pane>
        <x-generic.navs-tabs.pane id="details"  >
        </x-generic.navs-tabs.pane>

    </x-generic.navs-tabs.content>

</form>
