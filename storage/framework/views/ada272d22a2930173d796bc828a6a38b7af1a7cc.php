<li>
    <a href="#sidebar<?php echo e($name); ?>" data-toggle="collapse" aria-expanded="false" 
        class="dropdown-toggle float-clear "
        style="position: relative;">
        <i class="material-icons-outlined pr-1"><?php echo e($icon); ?></i>
        <span><?php echo e($name); ?></span>
        <i class="material-icons-outlined float-right" style="margin-top:5px;">expand_more</i>
    </a>
    <ul id="sidebar<?php echo e($name); ?>" class="" >
            <?php $__currentLoopData = $navElementModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navElementModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($isNavItemModel($navElementModel)): ?>
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
                <?php elseif($isNavGroupModel($navElementModel)): ?>
                     <?php if (isset($component)) { $__componentOriginald6c5b7c88ab2108f171b01e63339c8c1ed93eba5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Sidebar\NavGroup::class, ['name' => $navElementModel->name,'icon' => $navElementModel->icon]); ?>
<?php $component->withName('sidebar.nav-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['navElements' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($navElementModel->navElementModels)]); ?>
<?php if (isset($__componentOriginald6c5b7c88ab2108f171b01e63339c8c1ed93eba5)): ?>
<?php $component = $__componentOriginald6c5b7c88ab2108f171b01e63339c8c1ed93eba5; ?>
<?php unset($__componentOriginald6c5b7c88ab2108f171b01e63339c8c1ed93eba5); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>        
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
        
</li><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/sidebar/nav-group.blade.php ENDPATH**/ ?>