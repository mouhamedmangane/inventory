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
    <div class="tb-tl-ct-main " id="my-main">
        <div>
            @yield('main-bloc')
        </div>    
        
            <div>

            </div>
            @yield('bas_page');
    </div>
</div>