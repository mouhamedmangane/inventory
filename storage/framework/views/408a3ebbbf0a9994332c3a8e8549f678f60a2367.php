<div class="c-notif-item d-flex  py-2 pt-3 border "  >
    <div class="text-center  text-align-center" style="min-width: 40px;">
        <i class="material-icons-outlined md-24" style="width: 24px;"><?php echo e($icon); ?></i>
    </div>
    <div class="flex-grow-1">
        <h6 class="mr-1 mb-1" ><?php echo e($titre); ?></h6>
        <?php if($image): ?>
            <p class="mr-1">
                <img src="<?php echo e($image); ?>" alt="">
            </p>
        <?php endif; ?>
        <p class="mr-1 mb-1 " >
            <?php echo e($message); ?>

        </p>
        <p class="">
            <a href="<?php echo e($link_url); ?>" class="lien-sp" >
                <?php echo e($link_name); ?> > 
            </a>
        </p>
    
    </div>
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/head-bar-action/notif-item.blade.php ENDPATH**/ ?>