<div class="header d-flex align-items-center">
    <div class="header-title " style="" >
        <span class="title-app d-flex">
            <span class="nav-v-item-container-icon">
                <i class="material-icons " style="font-size:24px;">apps</i>
            </span>
            
            <span style="margin: 0px 2px;">
                NOPPAL INVENTORY
            </span>
            
        </span>        
    </div>


    <div class="header-content d-flex justify-content-end align-items-center">

        
            
         <?php if (isset($component)) { $__componentOriginal3ab6b580ba13a5dc31f2db73657c817ec60dc9ad = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\Bar::class, []); ?>
<?php $component->withName('util.headBarAction.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal3ab6b580ba13a5dc31f2db73657c817ec60dc9ad)): ?>
<?php $component = $__componentOriginal3ab6b580ba13a5dc31f2db73657c817ec60dc9ad; ?>
<?php unset($__componentOriginal3ab6b580ba13a5dc31f2db73657c817ec60dc9ad); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/header.blade.php ENDPATH**/ ?>