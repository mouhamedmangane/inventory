<div style=""  class="toolbar border-bottom d-flex justify-content-between align-items-center px-4">
    <div class=" d-flex ">
         <?php if (isset($component)) { $__componentOriginal600126a43f026ac71bada9cce2c58ad6d8576fb0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Input\ButtonSubmit::class, ['id' => 'test-button-submit','idForm' => 'addProduct','idContentAlert' => 'addProduitAlert','text' => 'Sauvegarder','icon' => 'save']); ?>
<?php $component->withName('generic.input.button-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'btn btn-primary btn-sm d-flex align-items-center','parentMessageClass' => 'n-form-table-col-input','elementMessageClass' => 'form-table-feedback']); ?>
<?php if (isset($__componentOriginal600126a43f026ac71bada9cce2c58ad6d8576fb0)): ?>
<?php $component = $__componentOriginal600126a43f026ac71bada9cce2c58ad6d8576fb0; ?>
<?php unset($__componentOriginal600126a43f026ac71bada9cce2c58ad6d8576fb0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <button class="btn btn-sm btn-outline-danger d-flex align-items-center  ml-2" >
            <i class="material-icons-outlined " style="font-size:16px;">delete</i>
            <span class="ml-1"> Annuler</span>       
        </button>
    </div>
    
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/generic/tool-bar/bar.blade.php ENDPATH**/ ?>