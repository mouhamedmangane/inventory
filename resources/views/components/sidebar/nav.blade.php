<ul>
    @foreach ($model->navElementModels as $navElementModel)
        @if ($model->isNavItemModel($navElementModel))
            <x-sidebar.nav-item :name="$navElementModel->name" :url="$navElementModel->url"  />
        @endif
    @endforeach
</ul>