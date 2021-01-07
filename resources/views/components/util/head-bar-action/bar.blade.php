<div class="c-head-bar-action" id="head-bar-action" >
    <x-util.head-bar-action.head-button idContent="#head-bar-action-notif" icon="campaign" />
    <x-util.head-bar-action.head-button idContent="#head-bar-param-bar" icon="brightness_7" />
    <x-util.head-bar-action.head-button idContent="#head-bar-aide-bar" icon="contact_support" />
    <x-util.head-bar-action.head-button idContent="#head-bar-action-user"  classBtn="c-head-button-profil">
        <img src="{{ URL::asset('images/profig.jpg') }}" alt="" width="32px" height="32px"  class="rounded-circle">
    </x-util.head-bar-action.head-button>
 
  
    
    <div class="head-bar-action-content">
        <div class="close">
            <button href="#">
                <i class="material-icons">close</i>
            </button>
        </div>
        <x-util.head-bar-action.user-content />
        <x-util.head-bar-action.notif-content />
    </div>
</div>

@once
    @push('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#head-bar-action > .head-bar-action-content > .close').on('click',function(){
                    $('#head-bar-action .action-btn.active').removeClass('active');
                    $('#head-bar-action > .head-bar-action-content').toggleClass('active')
                });
                $('#head-bar-action').on('click','.action-btn',function(){
                    if($('#head-bar-action .action-btn.active').is($(this))){
                        $('#head-bar-action .action-btn.active').removeClass('active');
                        $('#head-bar-action > .head-bar-action-content').toggleClass('active')
                    }
                    else{
                        if(! $('#head-bar-action > .head-bar-action-content').hasClass('active')){
                            $('#head-bar-action > .head-bar-action-content').addClass('active');                        
                        }

                        // mettre a jour le button actif
                        $('#head-bar-action .action-btn.active').removeClass('active');
                        $(this).addClass('active');

                        //mettre a jour le content actif
                        var old_content = $('#head-bar-action .head-bar-action-content-item.active');
                        old_content.hide();
                        old_content.removeClass('active');

                        console.log($(this).data('idcontent'));
                        let id=$(this).data('idcontent');
                        $(id).show();
                        $(id).addClass('active');
                        
                        
                        
                    }
                    
                });
            });
        </script>    
    @endpush
@endonce