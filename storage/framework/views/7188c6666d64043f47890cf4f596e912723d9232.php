


 <?php if (isset($component)) { $__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\ToolBar\Bar::class, []); ?>
<?php $component->withName('generic.tool-bar.bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd)): ?>
<?php $component = $__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd; ?>
<?php unset($__componentOriginal810fcb8dc7e0fc42842b98207979a343f756cdfd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<div class=" ">
<div class="d-flex align-items-center px-4">
    <div  class="rounded-circle bg-info text-align center d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
        <i class="material-icons text-white">add_shopping_cart</i>
    </div>
    <h4 class="my-4 ml-2">
        <span>Nouveau Article</span>
        <i class="material-icons">keyboard_arrow_down</i>
    </h4>
</div>

<form action="" class="">
     <?php if (isset($component)) { $__componentOriginal93f6fdc7d388430b82d3ecf07ca2c3dab2babb02 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Nav::class, ['id' => 'myTab']); ?>
<?php $component->withName('generic.navs-tabs.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mt-2 mb-5 px-4']); ?>
         <?php if (isset($component)) { $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Item::class, ['text' => 'Information Générale','idPane' => 'general','id' => 'general-tab','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810)): ?>
<?php $component = $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810; ?>
<?php unset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Item::class, ['text' => 'Vente','idPane' => 'vente','id' => 'vente-tab']); ?>
<?php $component->withName('generic.navs-tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810)): ?>
<?php $component = $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810; ?>
<?php unset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Item::class, ['text' => 'Achat','idPane' => 'achat','id' => 'achat-tab']); ?>
<?php $component->withName('generic.navs-tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810)): ?>
<?php $component = $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810; ?>
<?php unset($__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($__componentOriginal93f6fdc7d388430b82d3ecf07ca2c3dab2babb02)): ?>
<?php $component = $__componentOriginal93f6fdc7d388430b82d3ecf07ca2c3dab2babb02; ?>
<?php unset($__componentOriginal93f6fdc7d388430b82d3ecf07ca2c3dab2babb02); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginal8d8996fe40e6d65f3ac2b761371961e3456c9568 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Content::class, ['id' => 'myTabContent']); ?>
<?php $component->withName('generic.navs-tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'px-4']); ?>
         <?php if (isset($component)) { $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Pane::class, ['id' => 'general','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.pane'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <div class="row">
                <div class="col-md-2" style="">
                    <div >
                        <div style="width: 150px; height:150px;position: relative; background-image:url('<?php echo e(asset("images/profig.jpg")); ?>') ;"
                             class="border">
                            <img src=""  width="150px" height="150px" alt="">
                            <div style="position: absolute;right: 0px;bottom:0px;;" >
                                <i class="material-icons">camera_alt</i>
                            </div>
                        </div>
                        
                        <div class="d-flex mt-1">
                            <button class="btn btn-sm text-white mr-1" style="background: rgba(0,0,139,.8);">
                                <i class="material-icons">edit</i>
                            </button>
                            <button class="btn btn-sm btn-danger mr-1" style="background: rgba(0,0,0,139,.8);">
                                <i class="material-icons">delete</i>
                            </button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5">
                     <?php if (isset($component)) { $__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTable::class, []); ?>
<?php $component->withName('generic.forms.form-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                         <?php if (isset($component)) { $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableText::class, ['name' => 'nom','labelText' => 'Nom Produit']); ?>
<?php $component->withName('generic.forms.form-table-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => 'true','placeholder' => 'Nom Produit']); ?>
<?php if (isset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137)): ?>
<?php $component = $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137; ?>
<?php unset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                     <?php if (isset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46)): ?>
<?php $component = $__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46; ?>
<?php unset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    <table class="table border">
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Nom Produit :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control    w-100" 
                                        placeholder="nom Produit">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Type Acticle:</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="Type de produit">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">Reference Interne:</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="Reference">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pr-3 py-3">SKU</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control  w-100" 
                                        placeholder="SKU">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="table border">
                        
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Categorie d'article :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control w-100 " 
                                        placeholder="categorie d'article"
                                        value="All">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Prix Vente :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control w-100 " 
                                        placeholder="Prix de vente">
                            </td>
                        </tr>
                        <tr class="">
                            <td style="white-space: nowrap;min-width:" class="pl-3 py-3">Taxes  :</td>
                            <td style="width: 100%;" class="mr-2">
                                <input type="text" name="nom" id="nom" 
                                        class="form-control   w-100" 
                                        placeholder="TVA">
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
         <?php if (isset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89)): ?>
<?php $component = $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89; ?>
<?php unset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Pane::class, ['id' => 'vente','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.pane'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            
         <?php if (isset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89)): ?>
<?php $component = $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89; ?>
<?php unset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($component)) { $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Pane::class, ['id' => 'achat','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.pane'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            
         <?php if (isset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89)): ?>
<?php $component = $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89; ?>
<?php unset($__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($__componentOriginal8d8996fe40e6d65f3ac2b761371961e3456c9568)): ?>
<?php $component = $__componentOriginal8d8996fe40e6d65f3ac2b761371961e3456c9568; ?>
<?php unset($__componentOriginal8d8996fe40e6d65f3ac2b761371961e3456c9568); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>     
   
</form>

</div>

<?php if (! $__env->hasRenderedOnce('f98b0177-968a-45d2-8359-2398e5cc35b5')): $__env->markAsRenderedOnce('f98b0177-968a-45d2-8359-2398e5cc35b5'); ?>
    <?php $__env->startPush('script'); ?>
        <script type="text/javascript">

        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/produit/nouveau.blade.php ENDPATH**/ ?>