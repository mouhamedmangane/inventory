<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <?php echo $__env->yieldContent('header'); ?>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/font/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/materialize.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/bootstrap441/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/components.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/style.css')); ?>">
        <style>
            body {
                font-family: "Segoe UI", "Segoe UI Web (West European)", "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
            }
        </style>
    </head>
    
    <body>
         <?php if (isset($component)) { $__componentOriginalefc679a104a95fcdba60a644da376f87929eb5a9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\Header::class, []); ?>
<?php $component->withName('util.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalefc679a104a95fcdba60a644da376f87929eb5a9)): ?>
<?php $component = $__componentOriginalefc679a104a95fcdba60a644da376f87929eb5a9; ?>
<?php unset($__componentOriginalefc679a104a95fcdba60a644da376f87929eb5a9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <div class="r-bar"></div>
        
        <div class="wrapper">
             <?php if (isset($component)) { $__componentOriginal0eb33314df2f0924aeaa7a5dd45d1a929853d11d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Util\Sidebar::class, []); ?>
<?php $component->withName('util.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0eb33314df2f0924aeaa7a5dd45d1a929853d11d)): ?>
<?php $component = $__componentOriginal0eb33314df2f0924aeaa7a5dd45d1a929853d11d; ?>
<?php unset($__componentOriginal0eb33314df2f0924aeaa7a5dd45d1a929853d11d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <div id="content" class="position-relative" style="flex-grow: 1;">
                <?php echo $__env->yieldContent('content'); ?>           
            </div>
        </div>  



        <script src="<?php echo e(URL::asset('dist/js/jquery.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('dist/js/popper.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('plugin/bootstrap441/js/bootstrap.bundle.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('dist/js/components.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('script'); ?>
            
    </body>
</html>
<?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/layouts/noppal.blade.php ENDPATH**/ ?>