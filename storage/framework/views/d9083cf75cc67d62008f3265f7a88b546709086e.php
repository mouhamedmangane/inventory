<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/bootstrap441/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('plugin/font/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/materialize.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/style.css')); ?>">

        
    
        
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        
    </head>
    <body >
        
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="wrapper">

           
             <?php if (isset($component)) { $__componentOriginal8657c882124c642086aac91278435e4ed45f75e5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Sidebar\Nav::class, ['navModel' => App\ViewConstante\Navs\DefaultNav::page()]); ?>
<?php $component->withName('sidebar.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-green']); ?>
<?php if (isset($__componentOriginal8657c882124c642086aac91278435e4ed45f75e5)): ?>
<?php $component = $__componentOriginal8657c882124c642086aac91278435e4ed45f75e5; ?>
<?php unset($__componentOriginal8657c882124c642086aac91278435e4ed45f75e5); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
           
            <div id="content">
                 <?php if (isset($component)) { $__componentOriginal9d14d1bdeb06043bdb35fba2d8a850bb5af14d0e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Produit\ListView::class, []); ?>
<?php $component->withName('produit.list-view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal9d14d1bdeb06043bdb35fba2d8a850bb5af14d0e)): ?>
<?php $component = $__componentOriginal9d14d1bdeb06043bdb35fba2d8a850bb5af14d0e; ?>
<?php unset($__componentOriginal9d14d1bdeb06043bdb35fba2d8a850bb5af14d0e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

            </div>
        
        </div>  
        




        
        <script src="<?php echo e(URL::asset('dist/js/jquery.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('dist/js/popper.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('plugin/bootstrap441/js/bootstrap.bundle.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/welcome.blade.php ENDPATH**/ ?>