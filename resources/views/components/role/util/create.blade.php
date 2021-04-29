@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Details" idPane="details" id="details-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="{{ url('param-compte/roles') }}" method="post" id="create_user_form">
    @csrf

    <input type="hidden" name="id" value="{{ $role->id }}">
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
        {{-- div general --}}
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-text name="nom" labelText="Nom Role" class="" :value="$role->nom"
                                required="true" placeholder="Nom role" id="nom_role"/>
                        <x-generic.forms.form-table-checkbox name="archiver" labelText="Active" id="archiver"
                                :checked="(!$role->archiver)?'true':'false'" value="archiver" />

                    </x-generic.forms.form-table>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <x-generic.forms.form-table >

                        <x-generic.forms.form-table-textarea name="description" labelText="Description" class="" :value="$role->description"
                                 placeholder="Description du role" id="desc_role" rows="4" styleInput="height:89px;"/>

                    </x-generic.forms.form-table>
                </div>

            </div>
            <div class=" mt-1 ">
                <x-generic.forms.form-table >

                    <x-generic.forms.form-table-item class=" rounded rounded-circle parentMessage">
                        <div class="d-flex">
                            <h6 class="text-underline pb-2 border-bottom">Liste Droits</h6>

                            <div class="col-5 form__message" id="form__message__objet"></div>
                        </div>

                        <x-role.util.droit-objet-group :role="$role" />

                    </x-generic.forms.form-table-item>

                </x-generic.forms.form-table>
            </div>
        </x-generic.navs-tabs.pane>
        <x-generic.navs-tabs.pane id="details"  >
        </x-generic.navs-tabs.pane>

    </x-generic.navs-tabs.content>

</form>
