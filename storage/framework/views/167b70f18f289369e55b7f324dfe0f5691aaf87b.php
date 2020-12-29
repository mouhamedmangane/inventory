<div class="c-head-button <?php echo e($attributes['class']); ?> ">
    <button class="<?php echo e($attributes['classBtn']); ?> <?php if(!empty($idContent)): ?> action-btn <?php endif; ?>" 
            <?php if(!empty($idContent)): ?>data-idcontent="<?php echo e($idContent); ?>"<?php endif; ?>>
        
        <?php if(!empty($icon)): ?><i class="material-icons-outlined "><?php echo e($icon); ?></i><?php endif; ?>
        <?php echo e($slot); ?>


    </button>
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/head-bar-action/head-button.blade.php ENDPATH**/ ?>