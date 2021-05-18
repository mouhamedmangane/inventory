<x-generic.modal.simple id="form_new_categorie" titre="Nouvelle Categorie" :url="url('categorie/save')" idForm="form_new_categorie" class="">

    <div class="d-flex justify-content-center my-3 flex-wrap">
        <x-generic.forms.form-table >
            <x-generic.forms.form-table-text name="groupe_name" labelText="Categorie " required="true" placeholder="" id="modal-categorie"/>
        </x-generic.forms.form-table>
    </div>
    <x-slot name="actions">

    </x-slot>
</x-generic.modal.simple>
