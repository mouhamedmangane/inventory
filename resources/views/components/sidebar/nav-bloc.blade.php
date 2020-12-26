<ul class="list-unstyled components ">
    @foreach ($navElementModels as $navElementModel)
        @if ($isNavItemModel($navElementModel))
            <x-sidebar.nav-item :name="$navElementModel->name" :url="$navElementModel->url" :icon="$navElementModel->icon"  />           
        @elseif ($isNavGroupModel($navElementModel))
            <x-sidebar.nav-group :name="$navElementModel->name" :navElementModels="$navElementModel->navElementModels" :icon="$navElementModel->icon" />       
        @endif
    @endforeach
</ul>
