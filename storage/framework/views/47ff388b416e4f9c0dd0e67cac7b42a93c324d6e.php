<nav id="nav-v">

    <?php $__currentLoopData = $navModel->navBlocModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navBlocModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if (isset($component)) { $__componentOriginal8eda714aadb49ffcbeaff6ef436fc71d4dd08630 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Navs\NavBloc::class, ['name' => $navBlocModel->name,'navElementModels' => $navBlocModel->navElementModels]); ?>
<?php $component->withName('generic.navs.nav-bloc'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal8eda714aadb49ffcbeaff6ef436fc71d4dd08630)): ?>
<?php $component = $__componentOriginal8eda714aadb49ffcbeaff6ef436fc71d4dd08630; ?>
<?php unset($__componentOriginal8eda714aadb49ffcbeaff6ef436fc71d4dd08630); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</nav><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/generic/navs/nav.blade.php ENDPATH**/ ?>