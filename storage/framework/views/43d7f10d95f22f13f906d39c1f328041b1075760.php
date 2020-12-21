  <?php if (isset($component)) { $__componentOriginal3fd876792634e0a6b51fbeb3a51509954c8d3859 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Composant\DropDownTitre::class, ['navModel' => $navModel]); ?>
<?php $component->withName('composant.drop-down-titre'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal3fd876792634e0a6b51fbeb3a51509954c8d3859)): ?>
<?php $component = $__componentOriginal3fd876792634e0a6b51fbeb3a51509954c8d3859; ?>
<?php unset($__componentOriginal3fd876792634e0a6b51fbeb3a51509954c8d3859); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/conteneur/list-view.blade.php ENDPATH**/ ?>