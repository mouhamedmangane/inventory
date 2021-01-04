<li class="nav-item " role="presentation" >
    <a class="nav-link @if ($active) active @endif" id="{{ $id }}" data-toggle="tab" href="#{{ $idPane }}" 
        role="tab" 
        aria-controls="home" 
        aria-selected="true">

        {{ $text }}
        @if(!empty($badge))
            <span class="badge @if(!empty($badgeType)) {{ $badgeType }} @endif">{{ $badge }}</span>    
        @endif
        {{ $slot }}
    </a>
</li>