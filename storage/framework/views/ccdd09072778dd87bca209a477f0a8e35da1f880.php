

<?php $__env->startSection('content'); ?>
     <?php if (isset($component)) { $__componentOriginal157239f4a51e95f485226d593604361d8ae44898 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Produit\Nouveau::class, []); ?>
<?php $component->withName('produit.nouveau'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal157239f4a51e95f485226d593604361d8ae44898)): ?>
<?php $component = $__componentOriginal157239f4a51e95f485226d593604361d8ae44898; ?>
<?php unset($__componentOriginal157239f4a51e95f485226d593604361d8ae44898); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.noppal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/page/produit/create.blade.php ENDPATH**/ ?>