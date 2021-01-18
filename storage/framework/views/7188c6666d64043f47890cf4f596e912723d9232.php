<?php $__env->startSection('ly-toolbar'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ly-alert'); ?>
<div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('ly-title'); ?>
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div  class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px; background: rgba(0,0,0,.1);<?php if($attributes['img']): ?>border-color:black!important;<?php endif; ?>">
            <?php if(!$attributes['img']): ?>
                <img src="<?php echo e(asset("images/profig.jpg")); ?>"  
              width="43px"
              height="43px"
              class="rounded-circle" 
              style="">
            <?php else: ?> 
             <i class="material-icons">add_shopping_cart</i>
            <?php endif; ?>
            
        </div>
          <?php if (isset($component)) { $__componentOriginaldfcd173d245c4e97d8acff1e613f4c853976038f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Links\SelectLink::class, ['contentCible' => 'my-main','value' => 'test1','dt' => ['/test1'=>'linkA','/test2'=>'linkB']]); ?>
<?php $component->withName('generic.links.select-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaldfcd173d245c4e97d8acff1e613f4c853976038f)): ?>
<?php $component = $__componentOriginaldfcd173d245c4e97d8acff1e613f4c853976038f; ?>
<?php unset($__componentOriginaldfcd173d245c4e97d8acff1e613f4c853976038f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        
    </div>
    <div class="">
         <?php if (isset($component)) { $__componentOriginal889d0f813e0a0e13f7806bf1d2ea069acb525c28 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Infos\InfoList::class, []); ?>
<?php $component->withName('generic.infos.info-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php if (isset($component)) { $__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Infos\InfoItem::class, ['title' => 'Ratio Vente','value' => '3 100 / Mois']); ?>
<?php $component->withName('generic.infos.info-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['icon' => 'equalizer']); ?>
<?php if (isset($__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0)): ?>
<?php $component = $__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0; ?>
<?php unset($__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Infos\InfoItem::class, ['title' => 'Ratio Vente','value' => '2 100/ Mois']); ?>
<?php $component->withName('generic.infos.info-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['icon' => 'trending_down']); ?>
<?php if (isset($__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0)): ?>
<?php $component = $__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0; ?>
<?php unset($__componentOriginal4a14f8fbe4f7f75848b776b31d8aa2dd679bbfc0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php if (isset($__componentOriginal889d0f813e0a0e13f7806bf1d2ea069acb525c28)): ?>
<?php $component = $__componentOriginal889d0f813e0a0e13f7806bf1d2ea069acb525c28; ?>
<?php unset($__componentOriginal889d0f813e0a0e13f7806bf1d2ea069acb525c28); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('ly-main-top'); ?>
 <?php if (isset($component)) { $__componentOriginal93f6fdc7d388430b82d3ecf07ca2c3dab2babb02 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Nav::class, ['id' => 'myTab']); ?>
<?php $component->withName('generic.navs-tabs.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => '  px-2  ']); ?>
     <?php if (isset($component)) { $__componentOriginal7f0aa301b6bbe7ba31632fed74f1d167b5619810 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Item::class, ['text' => 'Information Générale','idPane' => 'general','id' => 'general-tab','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['classLink' => 'ml-3']); ?>
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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('ly-main-content'); ?>
<form action="/produit/test" id="addProduct" class=" mt-0" method="post">
    <?php echo csrf_field(); ?>
    
    
     <?php if (isset($component)) { $__componentOriginal8d8996fe40e6d65f3ac2b761371961e3456c9568 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Content::class, ['id' => 'myTabContent']); ?>
<?php $component->withName('generic.navs-tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'px-4 py-3']); ?>
        
         <?php if (isset($component)) { $__componentOriginal8d3b78db3bd0cb00622b24a1756649d89ee8ea89 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\NavsTabs\Pane::class, ['id' => 'general','active' => 'true']); ?>
<?php $component->withName('generic.navs-tabs.pane'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <div class="row">
                

                <div class="col-md-6 col-sm-12 " >
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
<?php $component->withAttributes(['required' => 'true','placeholder' => 'Nom Produit','id' => 'nom']); ?>
<?php if (isset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137)): ?>
<?php $component = $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137; ?>
<?php unset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                         <?php if (isset($component)) { $__componentOriginalc5dcf18029325b815f804d377c290b4c755daec9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableRadios::class, ['name' => 'type','labelText' => 'Type Produit','dt' => ['consomable'=>'Consommable','service'=>'Service'],'value' => 'consomable']); ?>
<?php $component->withName('generic.forms.form-table-radios'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => 'true','id' => 'type']); ?>
<?php if (isset($__componentOriginalc5dcf18029325b815f804d377c290b4c755daec9)): ?>
<?php $component = $__componentOriginalc5dcf18029325b815f804d377c290b4c755daec9; ?>
<?php unset($__componentOriginalc5dcf18029325b815f804d377c290b4c755daec9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                         <?php if (isset($component)) { $__componentOriginalae2621711ecec9b48e523322e33635c73535c38f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableSelect::class, ['name' => 'categorie','labelText' => 'Categorie Produit','dt' => ['tous'=>'Tous','informatique'=>'Informatiqughghe'],'value' => 'informatique']); ?>
<?php $component->withName('generic.forms.form-table-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => 'true','id' => 'categorie']); ?>
<?php if (isset($__componentOriginalae2621711ecec9b48e523322e33635c73535c38f)): ?>
<?php $component = $__componentOriginalae2621711ecec9b48e523322e33635c73535c38f; ?>
<?php unset($__componentOriginalae2621711ecec9b48e523322e33635c73535c38f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        
                         <?php if (isset($component)) { $__componentOriginal20b5016e43432d97a7e72c9fb4f4da48773c193c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableMultiCheck::class, ['name' => 'va','labelText' => 'Le Produit','dt' => ['vendre'=>'Peut être vendu','acheter'=>'Peut être acheté'],'value' => ['vendre','acheter']]); ?>
<?php $component->withName('generic.forms.form-table-multi-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['required' => 'true','type' => 'switch']); ?>
<?php if (isset($__componentOriginal20b5016e43432d97a7e72c9fb4f4da48773c193c)): ?>
<?php $component = $__componentOriginal20b5016e43432d97a7e72c9fb4f4da48773c193c; ?>
<?php unset($__componentOriginal20b5016e43432d97a7e72c9fb4f4da48773c193c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                         <?php if (isset($component)) { $__componentOriginal2b1fd042062e78adc541ff5dcc2b3363b94f991e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableLine::class, []); ?>
<?php $component->withName('generic.forms.form-table-line'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ''.e($attributes['class']).'']); ?>

                                 <?php $__env->slot('label'); ?> 
                                     <?php if (isset($component)) { $__componentOriginaleda0a21c33e632858c782536041b3163c9e230a9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableLabel::class, ['labelText' => 'Image','required' => false]); ?>
<?php $component->withName('generic.forms.form-table-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaleda0a21c33e632858c782536041b3163c9e230a9)): ?>
<?php $component = $__componentOriginaleda0a21c33e632858c782536041b3163c9e230a9; ?>
<?php unset($__componentOriginaleda0a21c33e632858c782536041b3163c9e230a9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                 <?php $__env->endSlot(); ?>
                                 <?php if (isset($component)) { $__componentOriginalfed0467d96b1c22f09709400d61d8c4d90d0c6a7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Input\Photo::class, ['id' => 'photo','name' => 'photo','url' => '','x' => '150','y' => '150']); ?>
<?php $component->withName('generic.input.photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalfed0467d96b1c22f09709400d61d8c4d90d0c6a7)): ?>
<?php $component = $__componentOriginalfed0467d96b1c22f09709400d61d8c4d90d0c6a7; ?>
<?php unset($__componentOriginalfed0467d96b1c22f09709400d61d8c4d90d0c6a7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            
                         <?php if (isset($__componentOriginal2b1fd042062e78adc541ff5dcc2b3363b94f991e)): ?>
<?php $component = $__componentOriginal2b1fd042062e78adc541ff5dcc2b3363b94f991e; ?>
<?php unset($__componentOriginal2b1fd042062e78adc541ff5dcc2b3363b94f991e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        
                     <?php if (isset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46)): ?>
<?php $component = $__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46; ?>
<?php unset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </div>
                <div class="col-md-6 col-sm-12">
                     <?php if (isset($component)) { $__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTable::class, []); ?>
<?php $component->withName('generic.forms.form-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                         
                         <?php if (isset($component)) { $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableText::class, ['name' => 'reference','labelText' => 'Réference Interne']); ?>
<?php $component->withName('generic.forms.form-table-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Réference interne','id' => 'reference']); ?>
<?php if (isset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137)): ?>
<?php $component = $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137; ?>
<?php unset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableText::class, ['name' => 'sku','labelText' => 'SKU']); ?>
<?php $component->withName('generic.forms.form-table-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'code barre ou QR','id' => 'sku']); ?>
<?php if (isset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137)): ?>
<?php $component = $__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137; ?>
<?php unset($__componentOriginalbf1545a0b67ab14ce1029feedfa6823638111137); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableInterval::class, ['name' => 'prix_vente','labelText' => 'Prix de Vente','type' => 'interval']); ?>
<?php $component->withName('generic.forms.form-table-interval'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'prix_vente']); ?>
<?php if (isset($__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527)): ?>
<?php $component = $__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527; ?>
<?php unset($__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Generic\Forms\FormTableInterval::class, ['name' => 'prix_achat','labelText' => 'Prix d\'achat','type' => 'fixe','minValue' => '1','maxValue' => '3']); ?>
<?php $component->withName('generic.forms.form-table-interval'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'prix_achet']); ?>
<?php if (isset($__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527)): ?>
<?php $component = $__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527; ?>
<?php unset($__componentOriginal3c840b54404e4cbb5b85e1afdf3c0cbbd9a4e527); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        
                       

                     <?php if (isset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46)): ?>
<?php $component = $__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46; ?>
<?php unset($__componentOriginalfc1c8e7232779478c338f051b4f2beef20ffff46); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
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
<?php $__env->stopSection(); ?>



<?php if (! $__env->hasRenderedOnce('413de05f-db5e-4edd-b4dd-d76563f144ac')): $__env->markAsRenderedOnce('413de05f-db5e-4edd-b4dd-d76563f144ac'); ?>
    <?php $__env->startPush('script'); ?>
        <script type="text/javascript">

        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.ly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/produit/nouveau.blade.php ENDPATH**/ ?>