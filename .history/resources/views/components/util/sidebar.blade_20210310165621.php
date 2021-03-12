<div class="border-right" id="sidebar">
    <button class=" btn btn-default  nav-v-item-container-icon mt-2 " id="toggle-sidebar">
        <i class="material-icons nav-v-icon" >menu</i>
    </button>
    <x-generic.navs.nav :navModel="$navModel" class="bg-green" />
</div>

@once
    @push('script')
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#toggle-sidebar').on('click',function(){
                    $("#sidebar").toggleClass('sidebar-toggle');
                });
                $('#sidebar').on('click',function(){

                });
            }); 

        </script>

    @endpush
@endonce