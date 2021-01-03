<ul class="list-unstyled components  pt-4">
    <?php $__currentLoopData = $navElementModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navElementModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($isNavItemModel($navElementModel)): ?>
             <?php if (isset($component)) { $__componentOriginalfe139c6cca0468aaad0baab853810ffdfd54eff1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Navs\NavItem::class, ['name' => $navElementModel->name,'url' => $navElementModel->url,'icon' => $navElementModel->icon]); ?>
<?php $component->withName('generic.navs.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalfe139c6cca0468aaad0baab853810ffdfd54eff1)): ?>
<?php $component = $__componentOriginalfe139c6cca0468aaad0baab853810ffdfd54eff1; ?>
<?php unset($__componentOriginalfe139c6cca0468aaad0baab853810ffdfd54eff1); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>            
        <?php elseif($isNavGroupModel($navElementModel)): ?>
             <?php if (isset($component)) { $__componentOriginal93ee1cdb2d31114a55761c3d4f0bbe2254b8bdb9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Navs\NavGroup::class, ['name' => $navElementModel->name,'navElementModels' => $navElementModel->navElementModels,'icon' => $navElementModel->icon]); ?>
<?php $component->withName('generic.navs.nav-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal93ee1cdb2d31114a55761c3d4f0bbe2254b8bdb9)): ?>
<?php $component = $__componentOriginal93ee1cdb2d31114a55761c3d4f0bbe2254b8bdb9; ?>
<?php unset($__componentOriginal93ee1cdb2d31114a55761c3d4f0bbe2254b8bdb9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>        
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /var/www/html/PointDEVENTe/inventory/resources/views/components/generic/navs/nav-bloc.blade.php ENDPATH**/ ?>