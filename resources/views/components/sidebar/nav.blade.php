<nav id="sidebar">

    @foreach ($navModel->navBlocModels as $navBlocModel)
            <x-sidebar.nav-bloc :name="$navBlocModel->name" :navElementModels="$navBlocModel->navElementModels"  />           
    @endforeach

</nav>