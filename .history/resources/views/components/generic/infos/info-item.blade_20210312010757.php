@if(!$attributes['couleur'])
    @props(['couleur'=>'#007bff'])
@elseif($attributes['couleur']=='success')
    @props(['couleur'=>'var(--success)'])
@elseif($attributes['couleur']=='warning')
    @props(['couleur'=>'var(--warning)'])
@elseif($attributes['couleur']=='danger')
    @props(['couleur'=>'var(--danger)'])
@endif
<li class="list-group-item d-flex align-items-center " style="padding:8px 10px;">
    @if ($attributes['icon'])
        <div>
            <i class="material-icons md-32 mr-3" style="color:#6c757d;">{{ $attributes['icon'] }}</i>
        </div>    
    @endif
    
    <div class="">
        
        <div class="" style="font-size: 14px;">
            @empty ($link)
                <span style="color: #007bff;">{{ $value }}</span>
            @else
                <a href="$link" style="color: [[#007bff]];">{{ $value }}</a>
            @endif
        </div>
        @if (!empty($title))
            <div class="text-muted" style="font-size: 14px;">
                {{ $title }}
            </div>
        @endif
        
    </div> 
    
</li>