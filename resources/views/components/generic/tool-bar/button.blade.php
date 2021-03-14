<button class="btn btn-sm {{ $attributes['evidence'] }} d-flex align-items-center  mr-3 {{ $attributes['class'] }}" 
        id="{{ $id }}" 
        @if($attributes['disabled']) disabled="{{ $attributes['disabled'] }}" @endif>
    @if($attributes['icon'])
        <i class="material-icons-outlined " style="font-size:16px;">{{ $attributes['icon'] }}</i>
        <span class="ml-1"> {{ $text }}</span>    
    @else
        <span class=""> {{ $text }}</span>    
    @endif
</button>