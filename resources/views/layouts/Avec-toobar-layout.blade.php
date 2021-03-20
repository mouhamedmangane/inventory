<div class="tb-tl-ct-toolbar">
    @yield('toolbar-bloc')
</div>
<div class="tb-tl-ct-content">
    <div class="">
        @yield('alert-bloc')
   </div>
    <div class="tb-tl-ct-title">
         @yield('title-bloc')
    </div>
    <div class="tb-tl-ct-main" id="my-main">
        <div class="tb-tl-ct-main-nav sticky-top pb-4 bg-white">
            @yield('nav-bloc')
        </div>
        <div class="tb-tl-ct-main-content" >
            @yield('main-bloc')
        </div>
    </div>
</div>