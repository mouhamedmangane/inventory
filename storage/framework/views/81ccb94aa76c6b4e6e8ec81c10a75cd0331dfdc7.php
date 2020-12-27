<div class="head-bar-action header-content-1 d-flex align-items-center overflow-auto" id="head-bar-action">

    <div class="header-content-item header-alert">
        <a class="nav-link action-btn" href="#notificationBar">
            <i class="material-icons-outlined ">notifications</i>
        </a>
    </div>
    <div class="header-content-item header-param">
        <a class="nav-link action-btn">
            <i class="material-icons-outlined  " aria-hidden="true">brightness_7</i>
        </a>
    </div>
    <div class="header-content-item header-info">
        <a class="nav-link action-btn">
            <i class="material-icons-outlined " aria-hidden="true">contact_support</i>
        </a>
    </div>
    <div class="header-content-item-profil " >
        <a href="#head-bar-action-user" class=" action-btn">
            <img src="<?php echo e(URL::asset('images/profig.jpg')); ?>" alt="" width="32px" height="32px"  class="rounded-circle">
        </a>
    </div>
    
    <div class="content">
        <div class="close">
            <i class="material-icons">close</i>
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
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('e204c844-da96-4893-9213-0b68d57d70ff')): $__env->markAsRenderedOnce('e204c844-da96-4893-9213-0b68d57d70ff'); ?>
    <?php $__env->startPush('script'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#head-bar-action > .content > .close').on('click',function(){
                    $('#head-bar-action .action-btn.active').removeClass('active');
                    $('#head-bar-action > .content').toggleClass('active')
                });
                $('#head-bar-action').on('click','.action-btn',function(){
                    if($('#head-bar-action .action-btn.active').is($(this))){
                        $('#head-bar-action .action-btn.active').removeClass('active');
                        $('#head-bar-action > .content').toggleClass('active')
                    }
                    else{
                        if(! $('#head-bar-action > .content').hasClass('active')){
                            $('#head-bar-action > .content').addClass('active');                        
                        }

                        // mettre a jour le button actif
                        $('#head-bar-action .action-btn.active').removeClass('active');
                        $(this).addClass('active');

                        //mettre a jour le content actif
                        var old_content = $('#head-bar-action .content-item.active');
                        old_content.hide();
                        old_content.removeClass('active');
                        old_content.show();
                        console.log($(this).attr('href'));
                        let id=$(this).attr('href');
                        $(id).addClass('active');
                    }
                    
                });
            });
        </script>    
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/head-bar-action/bar.blade.php ENDPATH**/ ?>