<ul>
    <?php $__currentLoopData = $model->navElementModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navElementModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($model->isNavItemModel($navElementModel)): ?>
             <?php if (isset($component)) { $__componentOriginaldb7423b05257673c87a08e268ffab18545ff1b40 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Sidebar\NavItem::class, ['name' => $navElementModel->name,'url' => $navElementModel->url]); ?>
<?php $component->withName('sidebar.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaldb7423b05257673c87a08e268ffab18545ff1b40)): ?>
<?php $component = $__componentOriginaldb7423b05257673c87a08e268ffab18545ff1b40; ?>
<?php unset($__componentOriginaldb7423b05257673c87a08e268ffab18545ff1b40); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /var/www/html/PointDEVENTe/inventory/resources/views/components/sidebar/nav.blade.php ENDPATH**/ ?>