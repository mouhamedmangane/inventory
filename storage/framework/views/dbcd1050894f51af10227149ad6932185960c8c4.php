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


    <div class="header-content d-flex justify-content-between align-items-center">

        <div class="header-content-1" style="padding:0px 12px;">
            <div>
                <a class="btn  btn-default" >
                    <i class="material-icons md-24 text-primary"  aria-hidden="true">add_circle</i>
                </a>
                <div class="input-in">
                    <input type="text" name="search" 
                            placeholder="Search"
                            class="form-control rounded-pill d-inline-block ml-1  input-in-input" 
                            style="height: 28px;width:250px;">
                    <div class="input-in-in">
                        <i class="fas fa-search " style="font-size: 12px;"></i>
                        <i class="fas fa-caret-down pl-1"></i>
                    </div>
                </div>
                
                
            </div>
        </div>
            
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
</div><?php /**PATH /var/www/html/PointDEVENTe/inventory/resources/views/header.blade.php ENDPATH**/ ?>