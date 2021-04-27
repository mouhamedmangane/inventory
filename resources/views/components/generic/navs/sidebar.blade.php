<div class="border-right" id="{{ $id }}" style="overflow:visible;">
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
                console.log(document.cookie)
                if(document.cookie && document.cookie.length>0 ){
                    const cookieValue = document.cookie
                                   .split(';')
                                   .find(row => row.startsWith('sidebar_collapse='));
                                   
                    if(cookieValue){
                        const sidebar_active=cookieValue.split('=')[1];
                        if(sidebar_active=='ok') $("#{{ $id }}").toggleClass('{{ $id }}-toggle');
                    }
                }
                
                $('#toggle-{{ $id }}').on('click',function(){
                    $("#{{ $id }}").toggleClass('{{ $id }}-toggle');
                    if($("#{{ $id }}").hasClass('{{ $id }}-toggle')){
                        document.cookie = "sidebar_collapse=ok;";
                    }
                    else{
                        document.cookie = "sidebar_collapse=;";
                    }
                });
             
            }); 

        </script>

    @endpush
@endonce