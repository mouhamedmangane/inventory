@props(['dispo'=>"Positionner sur l'image pour la changer ou la supprimer",
        'no_dispo'=>"Positionner sur l'image pour la changer"])
<div class="d-flex align-items-center">
    <div style="width: {{ $x }}px; height:{{ $y }}px;background-size:{{ $x-10 }}px {{ $y-10 }}px;"
         class="border rounded input-img-content">

         <img src="{{ $url }}"
              id="{{ $id }}-image"
              alt="Image du produit "
              class="input-img rounded"
              style="@if (empty ($url)) display:none;@endif">

        <div class="input-img-action" >
                <input type="file"
                       accept="image/png, image/jpeg"
                       class="border rounded"
                       name={{ $name }}
                       id={{ $id }} 
                       style="display: none;">
                <button class="btn btn-sm btn-primary" type="button" style="padding:2px 5px;" id="{{ $id }}-edit" >
                    <i class="material-icons md-14" >edit</i>
                </button>
                <button class="btn btn-sm btn-danger ml-1" type="button" style="padding:2px 5px;" id="{{ $id }}-sup">
                    <i class="material-icons md-14">delete</i>
                </button>
        </div>


    </div>
    <div style=" @if($attributes['activeText']=='false') display:none; @endif "
             id="{{ $id }}-text"
             class="input-image-text"
            >
                    @if (empty($url))
                        {{ $no_dispo }}
                    @else
                        {{ $dispo }}
                    @endif
    </div>
</div>
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
    
    
