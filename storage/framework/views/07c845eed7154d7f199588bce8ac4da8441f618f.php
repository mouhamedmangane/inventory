<?php $attributes = $attributes->exceptProps(['id' => App\ViewModel\GenId::newId(),]); ?>
<?php foreach (array_filter((['id' => App\ViewModel\GenId::newId(),]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<li class="nav-v-item">
    <a href="#navdown<?php echo e($id); ?>" data-toggle="collapse" aria-expanded="false" 
        class="d-flex pr-3"
        style="position: relative;">
        <span class="nav-v-item-container-icon">
            <i class="material-icons-outlined nav-v-icon" style=""><?php echo e($icon); ?></i>
        </span>
        <span class="flex-grow"><?php echo e($name); ?></span>
        <span style="justify-self: flex-end;">
            <i class="material-icons-outlined  " style="">expand_more</i>
        </span>
        
    </a>
    <ul class="list-unstyled components-group collapse show " id="navdown<?php echo e($id); ?>">
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
</li><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/generic/navs/nav-group.blade.php ENDPATH**/ ?>