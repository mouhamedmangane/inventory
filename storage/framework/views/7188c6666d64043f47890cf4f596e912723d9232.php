



<form action="" class="p-4">
    <h3 class="mb-2">Nouveau Produit</h3>

    
    <div class="row">
        <div class="col-md-8">
            <div class="form-p-group">
                <label for="" class="form-p-label">
                    Type
                    <span class="text-danger">*</span>
                </label>
                <div class="form-p-input">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="consommable" checked="true">
                        <label class="form-check-label" for="inlineRadio1">Consommable</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="service">
                        <label class="form-check-label" for="inlineRadio2">Service</label>
                      </div>
                </div>
            </div>
            <div class="form-p-group">
                <label for="" class="form-p-label">
                    Nom
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="nom" class="form-control form-control-sm form-p-input">
            </div>
            <div class="form-p-group">
                <label for="" class="form-p-label">Unité</label>
                <select class="custom-select custom-select-sm form-p-input" aria-label=".selectionner unité" >
                    <option selected>Ancune</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
            <div class="form-p-group">
                <label for="" class="form-p-label">SKU</label>
                <input type="text" name="sku" class="form-control form-control-sm form-p-input">
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>

    <div class="row mt-3">
        
        <div class="col-md-5 ">
            <h5 class="form-p-group">
                <input type="checkbox" name="vente-actice" id="vente-active" class="form-label-section" checked>
                <label class="form-check-label form-label-section ml-2 " for="vente-active">Information Vente</label>
            </h5>
            
            <div class="form-p-group">
                    <label for="" class="form-p-label">
                        Prix 
                        <span class="text-danger">*</span>
                    </label>
                    <div class="form-p-input">
                        <div class="input-group input-group-sm w-100 ">
                            <input class="form-control" type="text" name="vente-prix" required
                                   placeholder="Prix de Vente" aria-label="Recipient's " aria-describedby="my-addon">
                            <div class="input-group-append">
                                <span class="input-group-text" id="my-addon">FCFA</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="form-p-group">
                <label for="" class="form-p-label">Compte</label>
                <select class="custom-select custom-select-sm form-p-input"
                        name="vente-compte"
                        aria-label=".selectionner compte" >
                    <option selected>vente</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>

            <div class="form-p-group">
                <label for="" class="form-p-label align-self-start" >Description</label>
                <textarea name="vente-desc" id="" cols="30" rows="3" class="form-control form-p-input">
                    
                </textarea>
            </div>



        </div>
        
        <div class="col-md-1"></div>

        
        <div class="col-md-5 ">
            <h5 class="form-p-group">
                <input type="checkbox" name="achat-actice" id="achat-active" class="form-label-section" checked>
                <label class="form-check-label form-label-section ml-2 " for="achat-active">Information Achat</label>
            </h5>
            
            <div class="form-p-group">
                    <label for="" class="form-p-label">
                        Prix 
                        <span class="text-danger">*</span>
                    </label>
                    <div class="form-p-input">
                        <div class="input-group input-group-sm w-100 ">
                            <input class="form-control" type="text" name="achat-prix" required
                                   placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
                            <div class="input-group-append">
                                <span class="input-group-text" id="my-addon">FCFA</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="form-p-group">
                <label for="" class="form-p-label">Compte</label>
                <select class="custom-select custom-select-sm form-p-input"
                        name="achat-compte"
                        aria-label=".selectionner compte" >
                    <option selected>achat</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>

            <div class="form-p-group">
                <label for="" class="form-p-label align-self-start" >Description</label>
                <textarea name="achat-desc" id="" cols="30" rows="3" class="form-control form-p-input">
                    
                </textarea>
            </div>

            
        </div>

    </div>

    
    <div class="row">
        <div class="col-md-12">
            <h5 class="form-p-group">
                <input type="checkbox" name="achat-actice" id="achat-active" class="form-label-section" checked>
                <label class="form-check-label form-label-section ml-2 " for="achat-active">Poursuivre inventaire</label>
            </h5>
        </div>
        <div class="col-md-6">

        </div>
    </div>
    
        


    
</form>



<?php if (! $__env->hasRenderedOnce('dd6d76e2-825c-4554-8cd9-a783cafba57d')): $__env->markAsRenderedOnce('dd6d76e2-825c-4554-8cd9-a783cafba57d'); ?>
    <?php $__env->startPush('script'); ?>
        <script type="text/javascript">

        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/components/produit/nouveau.blade.php ENDPATH**/ ?>