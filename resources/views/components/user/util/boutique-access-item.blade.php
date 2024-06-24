@props(['id_select'=>App\ViewModel\GenId::newId(),'id_checkbox'=>App\ViewModel\GenId::newId()])
<li class="list-group-item boutique_access @if ($isActive) list-group-item-secondary @endif">
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="col-md-3">
        <input type="hidden" name="ba[{{ $id_select }}][boutique]" value="{{ $boutique->id }}">
        {{ $boutique->nom }}
    </div>
    <div class="col-md-3">
            <x-generic.input.select name="ba[{{ $id_select}}][role]" :id="$id_select" :dt="$roles" :value="$getIdRoleForSelect()" />
    </div>
    <div class="col-md-2 ">
        <div class="d-flex justify-content-end">
            <x-generic.input.checkbox name="ba[{{ $id_select}}][activer]" value="active" type="switch" 
            class="mt-1 boutique_access_item" :id="$id_checkbox" :checked='$isActive()' />
        </div>
    </div>
</div>
</li>
@push('script')
<script>
    $(function(){
        $(".boutique_access_item").on('change load',function(){
            let isCkeck=$(this).prop('checked');
            if(isCkeck){
                $(this).closest('.boutique_access').removeClass('list-group-item-secondary');
            }else{
                $(this).closest('.boutique_access').addClass('list-group-item-secondary');
                
            }
        });
    });
</script>
    
@endpush