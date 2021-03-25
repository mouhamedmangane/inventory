<button type="submit" id="{{ $id }}" class="{{ $attributes['class'] }}" style="{{ $attributes['style'] }}">
    @if (!empty($icon))
        <i class="material-icons mr-1 md-16 " >{{ $icon }}</i>
    @endif
    <span style="font-size: 14px;">
        {{ $text }}
    </span>
</button>


@push('script')
<script type="text/javascript">

$(document).ready(function(){
    
    var idForm= '#'+'{{ $idForm }}';
    var id = '#'+'{{ $id }}';
    $(id).on('click',function(){
        $(idForm).submit();
    });
    
    $(idForm).submit(function (e) { 
        console.log($(this).serialize());
        e.preventDefault();
        let form=$(idForm).get(0);
        console.log(form);
        let data=new FormData(form);
        console.log(data);
        $.ajax({
            type: $(this).attr('method'),
            enctype: 'multipart/form-data',

            url: $(this).attr('action'),
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
           
            beforeSend:function(){
                $(idForm).find('.is-valid').removeClass('is-valid');
                $(idForm).find('.is-invalid').removeClass('is-invalid');
            },
            success: function (response) {
                console.log(response.data);
                if(response.status){
                    alerter(response.message,'alert alert-success','alert alert-danger',1);
                    @if($attributes['hrefId'])
                        window.location.href = "{{ url($hrefId) }}"+'/'+response.id;
                    @elseif ($attributes['href'])
                        window.location.href = "{{ url($href) }}";
                    @else
                        $(this).reset();
                    @endif
                }
                else{
                    alerter(response.message,'alert alert-danger','alert alert-success');
                   //
                   for (let i = 0; i < response.data.length; i++) {
                    //    const element = array[i];
                        for (let index = 0; index < response.data[i].length; index++) {
                            const element = array[index];
                            
                        }
                       
                   }
                    for (const error of response.data) {
                            var input = $(idForm).find('input[name="'+error.name+'"]');
                            input.addClass('is-invalid');
                            @if($attributes['parentMessageClass'] && $attributes['elementMessageClass'])
                                console.log("activation error message");
                                let element = input.parents('.{{ $attributes['parentMessageClass'] }}').children('.{{ $attributes['elementMessageClass'] }}');
                                element.addClass('invalid-feedback');
                                element.html(error.message);
                                console.log('active')
                            @endif
                        }
                        
                        
                    }
                    resetAlert();
                    // let idContentAlert = '#'+'{{ $idContentAlert }}';
                    // $(idContentAlert).html(response.message)
                    // $(idContentAlert).removeClass('alert-success');
                    // $(idContentAlert).removeClass('alert-danger');
                // }
            },
            error: function(error){
                console.log(error);
            }

        });

        function alerter(message,typeClass,removeClass,fade=0){
            var idContentAlert= '#'+'{{ $idContentAlert }}';
            $(idContentAlert).removeClass(removeClass);
            $(idContentAlert).html(message);
            $(idContentAlert).addClass(typeClass);
            $(idContentAlert).fadeIn();
            if(fade==1){
                $(idContentAlert).delay(2000).fadeOut(500);
            }

        }
        
        function resetAlert(){
            $(idForm).find('.is-valid, .is-invalid').on('keyup change',function(e){
                console.log('resetAlert');
                @if($attributes['elementMessageClass'])
                    let element = $(this).parents('.{{ $attributes['parentMessageClass'] }}').children('.{{ $attributes['elementMessageClass'] }}');
                    element.html('');
                @endif
                $(this).removeClass('is-valid is-invalid');
            });
        }
        
    });
});

</script>
@endpush
