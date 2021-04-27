
<a href="{{ $url }}" class="{{ $class }}"> 
    @if(isset($src) && !empty($src))
        <x-generic.images.small :src="$src" />
    @endif
    <span class="d-inline-block ml-1">{{ $text }}</span> 

</a>