<div class="c-head-bar-action" id="head-bar-action" >
     <?php if (isset($component)) { $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\HeadButton::class, ['idContent' => '#head-bar-action-notif','icon' => 'campaign']); ?>
<?php $component->withName('util.head-bar-action.head-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['badge' => '15']); ?>
<?php if (isset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7)): ?>
<?php $component = $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7; ?>
<?php unset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\HeadButton::class, ['idContent' => '#head-bar-param-bar','icon' => 'brightness_7']); ?>
<?php $component->withName('util.head-bar-action.head-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7)): ?>
<?php $component = $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7; ?>
<?php unset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\HeadButton::class, ['idContent' => '#head-bar-aide-bar','icon' => 'contact_support']); ?>
<?php $component->withName('util.head-bar-action.head-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7)): ?>
<?php $component = $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7; ?>
<?php unset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\HeadButton::class, ['idContent' => '#head-bar-action-user']); ?>
<?php $component->withName('util.head-bar-action.head-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['classBtn' => 'c-head-button-profil']); ?>
        <img src="<?php echo e(url(\App\Util\ImageFactory::profil_current_user())); ?>" alt="" width="32px" height="32px"  class="rounded-circle n__profil_user_class">
     <?php if (isset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7)): ?>
<?php $component = $__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7; ?>
<?php unset($__componentOriginald9ba04d15e7af484ec7315b63d610c0f905923d7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
 
  
    
    <div class="head-bar-action-content">
        <div class="close">
            <button href="#" class="border-0">
                <i class="material-icons">close</i>
            </button>
        </div>
         <?php if (isset($component)) { $__componentOriginala8c68ed9ac6ec9112d9ef337eac6bf20d644a3e9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\UserContent::class, []); ?>
<?php $component->withName('util.head-bar-action.user-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala8c68ed9ac6ec9112d9ef337eac6bf20d644a3e9)): ?>
<?php $component = $__componentOriginala8c68ed9ac6ec9112d9ef337eac6bf20d644a3e9; ?>
<?php unset($__componentOriginala8c68ed9ac6ec9112d9ef337eac6bf20d644a3e9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal8f9ec91ebded4ce46dd0c5e8ae4bc65811946d33 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\NotifContent::class, []); ?>
<?php $component->withName('util.head-bar-action.notif-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal8f9ec91ebded4ce46dd0c5e8ae4bc65811946d33)): ?>
<?php $component = $__componentOriginal8f9ec91ebded4ce46dd0c5e8ae4bc65811946d33; ?>
<?php unset($__componentOriginal8f9ec91ebded4ce46dd0c5e8ae4bc65811946d33); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('94e894af-3417-41ba-9fe7-abdbceaf536a')): $__env->markAsRenderedOnce('94e894af-3417-41ba-9fe7-abdbceaf536a'); ?>
    <?php $__env->startPush('script'); ?>
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
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/head-bar-action/bar.blade.php ENDPATH**/ ?>