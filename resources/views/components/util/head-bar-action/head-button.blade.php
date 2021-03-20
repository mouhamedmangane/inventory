<div class="c-head-button {{ $attributes['class'] }} ">
    <button class="{{ $attributes['classBtn'] }} @if(!empty($idContent)) action-btn @endif" 
            @if(!empty($idContent))data-idcontent="{{ $idContent }}"@endif>
        
        @if(!empty($icon))<i class="material-icons-outlined ">{{ $icon }}</i>@endif
        {{ $slot }}

    </button>
</div>