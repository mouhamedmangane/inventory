<div class="dropdown" id="<?php echo e($id); ?>">
    <button id="my-dropdown" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Text</button>
    <div class="dropdown-menu" aria-labelledby="my-dropdown">
        <?php $__currentLoopData = $navModel->navBlocModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navBlocModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $navBlocModel->navElementModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navElementModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="dropdown-item ">Text</span>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(! $loop->last): ?>
                <div class="dropdown-divider"> </div> 
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/composant/drop-down-titre.blade.php ENDPATH**/ ?>