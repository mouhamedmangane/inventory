@props(['id' => App\ViewModel\GenId::newId(),])
<li class="nav-v-item">
    <a href="#navdown{{ $id }}" data-toggle="collapse" aria-expanded="false" 
        class="d-flex pr-3"
        style="position: relative;">
        <span class="nav-v-item-container-icon">
            <i class="material-icons-outlined nav-v-icon" style="">{{ $icon }}</i>
        </span>
        <span class="flex-grow">{{ $name }}</span>
        <span style="justify-self: flex-end;">
            <i class="material-icons-outlined  " style="">expand_more</i>
        </span>
        
    </a>
    <ul class="list-unstyled components-group collapse show " id="navdown{{$id }}">
        @foreach ($navElementModels as $navElementModel)
            @if ($isNavItemModel($navElementModel))
                <x-generic.navs.nav-item :name="$navElementModel->name" :url="$navElementModel->url" :icon="$navElementModel->icon"  />           
            @elseif ($isNavGroupModel($navElementModel))
                <x-generic.navs.nav-group :name="$navElementModel->name" :navElementModels="$navElementModel->navElementModels" :icon="$navElementModel->icon" />       
            @endif
        @endforeach
    </ul>
</li>