<nav id="nav-v">

    @foreach ($navModel->navBlocModels as $navBlocModel)
            <x-generic.navs.nav-bloc :name="$navBlocModel->name" :navElementModels="$navBlocModel->navElementModels"  />           
    @endforeach

</nav>