<nav id="sidebar">

    <?php $__currentLoopData = $navModel->navBlocModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navBlocModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if (isset($component)) { $__componentOriginal014760087e833b6e3cdfc41c967c48c4b96f50a7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Sidebar\NavBloc::class, ['name' => $navBlocModel->name,'navElementModels' => $navBlocModel->navElementModels]); ?>
<?php $component->withName('sidebar.nav-bloc'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal014760087e833b6e3cdfc41c967c48c4b96f50a7)): ?>
<?php $component = $__componentOriginal014760087e833b6e3cdfc41c967c48c4b96f50a7; ?>
<?php unset($__componentOriginal014760087e833b6e3cdfc41c967c48c4b96f50a7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</nav><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/sidebar/nav.blade.php ENDPATH**/ ?>