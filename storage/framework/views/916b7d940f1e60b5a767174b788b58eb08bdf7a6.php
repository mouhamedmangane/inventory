<li >
    <a href="<?php echo e($url); ?>"
        class="dropdown-toggle float-clear <?php echo e(((Request::is('') || Request::is($url))?'active':null)); ?>"
        style="position: relative;">

        <span class="trait-vertical " style="position: absolute;top:0px;left:0px;height:100%;width:2px;"></span>
        <i class="material-icons-outlined pr-1"><?php echo e($icon); ?></i>
        <span>
            <?php echo e($name); ?>

        </span>

    </a>
</li><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/sidebar/nav-item.blade.php ENDPATH**/ ?>