<div id="head-bar-action-notif" class="head-bar-action-content-item" >
    <div class="content-item-titre  ">
        <h5 class="py-3">Notification</h5>
    </div>
    <div class="mt-2 overflow-auto" style="height: calc(100vh - 66px);height: calc(100vh - 66px);">
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal5cd077a37eca82912392bbb194493e25b68d273c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\HeadBarAction\NotifItem::class, ['type' => $notification->type,'titre' => $notification->titre,'message' => $notification->message,'link' => $notification->link]); ?>
<?php $component->withName('util.head-bar-action.notif-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal5cd077a37eca82912392bbb194493e25b68d273c)): ?>
<?php $component = $__componentOriginal5cd077a37eca82912392bbb194493e25b68d273c; ?>
<?php unset($__componentOriginal5cd077a37eca82912392bbb194493e25b68d273c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/util/head-bar-action/notif-content.blade.php ENDPATH**/ ?>