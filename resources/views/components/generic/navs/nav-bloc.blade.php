<ul class="list-unstyled components  pt-4">
    @foreach ($navElementModels as $navElementModel)
        @if ($isNavItemModel($navElementModel))
            <x-generic.navs.nav-item :name="$navElementModel->name" :url="$navElementModel->url" :icon="$navElementModel->icon"  />           
        @elseif ($isNavGroupModel($navElementModel))
            <x-generic.navs.nav-group :name="$navElementModel->name" :navElementModels="$navElementModel->navElementModels" :icon="$navElementModel->icon" />       
        @endif
    @endforeach
</ul>
