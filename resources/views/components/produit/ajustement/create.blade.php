
    <form action="/produit/ajustement/save" id="ajustement" class=" mt-0" method="post">
        @csrf
        <div class="row">

            <div class="col-md-12 m-auto">
                <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
                    <x-generic.forms.form-table-item  class="mt-0 pt-0">
                        <x-generic.noppal-editor-table.table
                                    classTable=""
                                    classTh="border-top-0 border-bottom-0"
                                    idTable='d'
                                    id='ligne_ajustement'
                                    :dd="[
                                    ]"
                                    :columns="$getColumns()"/>
                    </x-generic.forms.form-table-item >
                </x-generic.forms.form-table >

            </div>
            <div class="col-md-5 ml-4">
                <div class="form-group">
                <label for="">Note </label>
                <textarea class="form-control" value="Notes sur cet ajustement" name="note" placeholder="note sur cet inventaire" id="" rows="3"></textarea>
                </div>
            </div>
        </div>
        <button type="submit">
Send
        </button>
    </form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce
