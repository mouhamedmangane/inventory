<div id="head-bar-action-user" class="head-bar-action-content-item">
    <div class="my-3">
    <div class="d-flex justify-content-center ">
        <div class="" style="position: relative;">
            <img src="{{ URL::asset('images/profig.jpg') }}" alt="" width="80px" height="80px"  class="rounded-circle">
            <div style="position: absolute;width:32px;height:32px;line-height:29px;right:-10px;bottom:-10px;" 
                 class="rounded-circle bg-white text-center nav-link-primary text-secondary">
                <i class="material-icons" style="font-size: 16px;">camera_alt</i>
            </div>
        </div> 
    </div>
    <div class="my-1 mt-2">
        <div class="text-center  font-weight-bold ">{{ $user->name }}</div>
        <div class="text-center ">{{ $user->login }}</div>

    </div>
</div>
    <div class="list-group ">
        <a href="" class="list-group-item nav-link-primary border-left-0 border-right-0 link-primary">
            <i class="material-icons-outlined mr-2">edit</i>
            Modifier Profil
        </a>
        <a href="" class="list-group-item nav-link-primary border-left-0 border-right-0">
            <i class="material-icons-outlined mr-2">power_settings_new</i>
            Deconnexion
        </a>
        
        
    </div>
</div>