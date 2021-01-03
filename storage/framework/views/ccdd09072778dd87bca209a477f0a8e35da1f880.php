

<?php $__env->startSection('content'); ?>
     <?php if (isset($component)) { $__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\ToolBar\Bar::class, []); ?>
<?php $component->withName('generic.tool-bar.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd)): ?>
<?php $component = $__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd; ?>
<?php unset($__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.noppal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/page/produit/create.blade.php ENDPATH**/ ?>