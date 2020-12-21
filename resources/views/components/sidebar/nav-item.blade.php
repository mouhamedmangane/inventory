<li >
    <a href="{{ $url }}"
        class="dropdown-toggle float-clear {{ ((Request::is('') || Request::is($url))?'active':null) }}"
        style="position: relative;">

        <span class="trait-vertical " style="position: absolute;top:0px;left:0px;height:100%;width:2px;"></span>
        <i class="material-icons-outlined pr-1">{{ $icon }}</i>
        <span>
            {{ $name }}
        </span>

    </a>
</li>