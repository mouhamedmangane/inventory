<li class="nav-v-item @if($active) active @endif ">
    <a href="{{ $url }}" 
        class=" {{ ((Request::is($url))?'active':null) }}  d-flex border-0"
        style="position: relative;">
        
            <span class="trait-vertical rounded " style="position: absolute;top:0px;left:0px;height:100%;width:5px;"></span>
     
        <span class="nav-v-item-container-icon">
            <i class="material-icons-outlined nav-v-icon " style=";">{{ $icon }}</i>
        </span>
        <span class="" style="margin: 0px 2px;">
            {{ $name }}
        </span>

    </a>
</li>


@push('script')
<script>
    $(document).ready(function(){
        $("#{{ $id }}-edit").click(function(){
            $("#{{ $id }}").trigger('click')
        });
        $("#{{ $id }}").on('change',function(e){
            console.log('change');
            var file = $(this)[0].files[0];
            if($(this).val()!=""){
            
                $("#{{ $id }}-image").attr('src',URL.createObjectURL(file));
                $("#{{ $id }}-image").show();
                $("#{{ $id }}-text").html('{{ $dispo }}');
            }
            
        });

        $("#{{ $id }}-sup").on('click',function(e){
            console.log('change2');
            $("#{{ $id }}").val('');
            $("#{{ $id }}-image").hide();
                $("#{{ $id }}-text").html('{{ $no_dispo }}');
                $("#{{ $id }}-image").attr('src','');
        });
    });
</script>
@endpush