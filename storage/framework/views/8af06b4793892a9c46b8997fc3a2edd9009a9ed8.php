<div class="" id="sidebar">
    <button class=" btn btn-default border-right nav-v-item-container-icon mt-2 " id="toggle-sidebar">
        <i class="material-icons nav-v-icon" >menu</i>
    </button>
     <?php if (isset($component)) { $__componentOriginala178278bad1dc278dbb4a01da18dd08bccc26fe9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Navs\Nav::class, ['navModel' => $navModel]); ?>
<?php $component->withName('generic.navs.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-green']); ?>
<?php if (isset($__componentOriginala178278bad1dc278dbb4a01da18dd08bccc26fe9)): ?>
<?php $component = $__componentOriginala178278bad1dc278dbb4a01da18dd08bccc26fe9; ?>
<?php unset($__componentOriginala178278bad1dc278dbb4a01da18dd08bccc26fe9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</div>

<?php if (! $__env->hasRenderedOnce('daebcc45-cce0-4942-87c4-62e5c6b14d5e')): $__env->markAsRenderedOnce('daebcc45-cce0-4942-87c4-62e5c6b14d5e'); ?>
    <?php $__env->startPush('script'); ?>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#toggle-sidebar').on('click',function(){
                    $("#sidebar").toggleClass('sidebar-toggle');
                });
            }); 
        </script>

    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/sidebar.blade.php ENDPATH**/ ?>