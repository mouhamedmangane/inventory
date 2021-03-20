<li class="nav-v-item @if($active) active @endif {{ ((Request::is($url))? 'active':null) }} ">
    <a href="{{ $url }}" 
        class="  d-flex border-0"
        style="position: relative;">
        
            <span class="trait-vertical rounded " style="position: absolute;top:0px;left:0px;height:100%;width:5px;"></span>
     
        <span class="nav-v-item-container-icon">
            <i class="material-icons-outlined nav-v-icon " style=";">{{ $icon }}</i>
        </span>
        <span class="" style="margin: 0px 2px;">
            {{ $name }} {{ Request::is($url) }}
        </span>

    </a>
</li>


@push('script')
<script>
    $(document).ready(function(){
     
    });
</script>
@endpush