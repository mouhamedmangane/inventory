<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <?php echo $__env->yieldContent('input'); ?>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/bootstrap441/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/font/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/materialize.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/style.css')); ?>">

        
    
        
        <style>
            body {
                font-family: "Segoe UI", "Segoe UI Web (West European)", "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
            }
        </style>
        
    </head>
    
    <body >
        
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="r-bar">

        </div>

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
            <div id="content" style="flex-grow: 1;">
                
                
                 <?php if (isset($component)) { $__componentOriginal157239f4a51e95f485226d593604361d8ae44898 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Produit\Nouveau::class, []); ?>
<?php $component->withName('produit.nouveau'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal157239f4a51e95f485226d593604361d8ae44898)): ?>
<?php $component = $__componentOriginal157239f4a51e95f485226d593604361d8ae44898; ?>
<?php unset($__componentOriginal157239f4a51e95f485226d593604361d8ae44898); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    
            </div>
        </div>  
        

        <script src="<?php echo e(URL::asset('dist/js/jquery.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('dist/js/popper.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('plugin/bootstrap441/js/bootstrap.bundle.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('script'); ?>
            
    </body>
</html>
<?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/welcome.blade.php ENDPATH**/ ?>