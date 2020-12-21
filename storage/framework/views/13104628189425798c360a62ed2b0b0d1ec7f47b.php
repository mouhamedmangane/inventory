 <?php if (isset($component)) { $__componentOriginal249d14d1b01eda7c19c23860b17fcb290b9ec419 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Conteneur\ListView::class, ['navModel' => $navModel,'actions' => $actions]); ?>
<?php $component->withName('conteneur.list-view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal249d14d1b01eda7c19c23860b17fcb290b9ec419)): ?>
<?php $component = $__componentOriginal249d14d1b01eda7c19c23860b17fcb290b9ec419; ?>
<?php unset($__componentOriginal249d14d1b01eda7c19c23860b17fcb290b9ec419); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/produit/list-view.blade.php ENDPATH**/ ?>