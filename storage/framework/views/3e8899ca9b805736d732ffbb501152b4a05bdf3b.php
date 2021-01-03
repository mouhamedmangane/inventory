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
                
                
                 
                <div style="height: 40px; background-color:beige; "> 
                    <div class="btn">
                        <a href="">
                        <span class="material-icons-outlined">
                            alarm_add
                            </span> Nouveau Produit
                        </a> 

                    
                    </div>
                </div>
                        
                            
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="" id=""></th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité Stock</th>
                        <th scope="col">Quantité Seuil</th>
                        <th scope="col">Unite Primaire</th>
                        <th scope="col">Prix Achat</th>
                        <th scope="col">Prix Vente</th>
                        <th scope="col">Catégorie</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    </tbody>
                </table>
                
  

            </div>
        </div>  
      

        





    </body>
</html>
<?php /**PATH /var/www/html/PointDEVENTe/inventory/resources/views/components/produit/list-view.blade.php ENDPATH**/ ?>