<li>
    <a href="#sidebar{{ $name }}" data-toggle="collapse" aria-expanded="false" 
        class="dropdown-toggle float-clear "
        style="position: relative;">
        <i class="material-icons-outlined pr-1">{{ $icon }}</i>
        <span>{{ $name }}</span>
        <i class="material-icons-outlined float-right" style="margin-top:5px;">expand_more</i>
    </a>
    <ul id="sidebar{{ $name }}" class="" >
            @foreach ($navElementModels as $navElementModel)
                @if ($isNavItemModel($navElementModel))
                    <x-sidebar.nav-item :name="$navElementModel->name" :url="$navElementModel->url"  />           
                @elseif ($isNavGroupModel($navElementModel))
                    <x-sidebar.nav-group :name="$navElementModel->name" :navElements="$navElementModel->navElementModels"  :icon="$navElementModel->icon" />       
                @endif
            @endforeach
    </ul>
        
</li>