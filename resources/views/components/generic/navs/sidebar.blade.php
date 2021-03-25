<div class="border-right" id="{{ $id }}">
    <button class=" btn btn-default  nav-v-item-container-icon mt-2 " id="toggle-{{ $id }}">
        <i class="material-icons nav-v-icon" >menu</i>
    </button>
    <x-generic.navs.nav :navModel="$model" class="bg-green" />
</div>

@once
    @push('script')
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#toggle-{{ $id }}').on('click',function(){
                    $("#{{ $id }}").toggleClass('{{ $id }}-toggle');
                });
             
            }); 

        </script>

    @endpush
@endonce