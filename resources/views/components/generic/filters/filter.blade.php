<div class="dropdown ddw-cacha" >
    <button class="btn btn-sm d-flex align-items-center  mr-3 dropdown-toggle" type="button"  data-toggle="dropdown">
        <i class="material-icons-outlined " style="font-size:16px;">filter_alt</i>
        <span class="ml-1"> Filtrer</span>    
    </button>
    <div class="dropdown-menu ct-cacha" style="width: 240px;" >
        @foreach ($filter->rows() as $ligne )
            <x-dynamic-component :component="$ligne->getComponentName()" :ligne="$ligne"  />
            @if (!$loop->last)
                <div class="dropdown-divider"></div>
            @endif
        @endforeach 
        {{ $slot }}
    </div>
</div>

@once
@push('script')
    <script>
    
    </script>    
@endpush
@endonce

@once
    @push('script')
     <script>
         $(function(){
            $('.ligne-filter-select').unbind();
            $('.ligne-filter-select').on('click',function(e){
                e.stopPropagation();
               let input = $(this).find(".ligne-filter-select-input").first();
               let newValeur =  input.prop('checked');
               input.prop('checked',newValeur);
               
            })
         });
     </script>   
    @endpush
@endonce