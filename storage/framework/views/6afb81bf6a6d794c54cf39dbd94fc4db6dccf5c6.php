<div class="header d-flex align-items-center">
    <div class="header-title bg-tertiere" style="" >
        <span class="title-app">
            <i class="fas fa-boxes text-success  "></i>
            Noppal INVENTAIRE
        </span>        
    </div>
    <div class="header-content d-flex justify-content-between align-items-center">
        <div class="header-content-1" style="padding:0px 12px;">
            <div>
                <button class="btn  btn-light" >
                    <i class="material-icons md-24 text-primary"  aria-hidden="true">add_circle</i>
                </button>
                <div class="input-in">
                    <input type="text" name="search" 
                            placeholder="Search"
                            class="form-control rounded-pill d-inline-block ml-1  input-in-input" 
                            style="height: 28px;width:250px;">
                    <div class="input-in-in">
                        <i class="fas fa-search " style="font-size: 12px;"></i>
                        <i class="fas fa-caret-down pl-1"></i>
                    </div>
                </div>
                
                
            </div>
        </div>
        <div class="header-content-1 d-flex align-items-center">
            <div class="header-content-item pr-2 name-user">
                <span class="text-normal font-weight-bold" >Test Nom</span>
                <i class="material-icons-outlined md-24">expand_more</i>
            </div>
            <div class="header-content-item header-alert">
                <button class="btn btn-light">
                    <i class="material-icons-outlined md-24">notifications</i>
                </button>
            </div>
            <div class="header-content-item header-param">
                <button class="btn btn-light">
                    <i class="material-icons-outlined md-24 " aria-hidden="true">brightness_7</i>
                </button>
            </div>
            <div class="header-content-item header-info">
                <button class="btn btn-light">
                    <i class="material-icons-outlined md-24" aria-hidden="true">contact_support</i>
                </button>
            </div>
            <div class="header-content-item " style="padding:0px 12px;">
                <img src="<?php echo e(URL::asset('images/profig.jpg')); ?>" alt="" width="30px" height="30px"  class="rounded-circle">
            </div>

        </div>
    </div>
</div><?php /**PATH C:\noppal_workspace\laravel_project\inventory\resources\views/header.blade.php ENDPATH**/ ?>