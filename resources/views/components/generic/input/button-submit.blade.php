<button type="submit" id="{{ $id }}" class="{{ $attributes['class'] }}">
    @if (!empty($icon))
        <i class="material-icons">{{ $icon }}</i>
    @endif
    <span>
        {{ $text }}
    </span>
</button>

@once
@push('script')
<script type="text/javascript">

$(document).ready(function(){
    var idForm= '#'+'{{ $idForm }}';
    $(idForm).submit(function (e) { 
        e.preventDefault();
        $.$.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "dataType",
            success: function (response) {
                if(response.status){
                    $(idAlert).html(response.message)
                    $(idAlert).removeClass('alert-success');
                    $(idAlert).removeClass('alert-danger');

                    @if($attributes['hrefId'])
                        window.location.href = "{{ url($hrefId) }}"+'/'+response.id;
                    @elseif ($attributes['href'])
                        window.location.href = "{{ url($href) }}";
                    @else
                        $(this).reset();
                    @endif
                }
                else{
                    let idAlert = '#'+'{{ idAlert }}';
                    $(idAlert).html(response.message)
                    $(idAlert).removeClass('alert-success');
                    $(idAlert).removeClass('alert-danger');
                }
            },
            error: function(error){

            }

        });
        
    });
});

</script>
@endpush
@endonce