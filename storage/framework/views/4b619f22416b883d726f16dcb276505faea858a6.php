<li class="nav-v-item <?php if($active): ?> active <?php endif; ?> ">
    <a href="<?php echo e($url); ?>" 
        class=" <?php echo e(((Request::is($url))?'active':null)); ?>  d-flex border-0"
        style="position: relative;">
        
            <span class="trait-vertical rounded " style="position: absolute;top:0px;left:0px;height:100%;width:5px;"></span>
     
        <span class="nav-v-item-container-icon">
            <i class="material-icons-outlined nav-v-icon " style=";"><?php echo e($icon); ?></i>
        </span>
        <span class="" style="margin: 0px 2px;">
            <?php echo e($name); ?>

        </span>

    </a>
</li><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/generic/navs/nav-item.blade.php ENDPATH**/ ?>