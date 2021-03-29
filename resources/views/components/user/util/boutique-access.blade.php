<div>
    @foreach ($boutique as $b)
        @props(['bA'=> getAccessBoutique($boutique)])
        <div class="row">
            <div class="col-md-3">{{ $b->nom }}</div>
            <div class="col-md-3">
                    <x-generic.input.select name="role[]" id="role{{ $loop->index }}" :$dt="$roles" :value="$getIdRoleForSelect($bA)"/>
            </div>
            <div class="col-md-3">
                    <x-generic.input.checkbox name="active[]" value="active" type="switch" 
                    class="" id="working_shop{{ $loop->index }}" :checked='$bA' />
            </div>
        </div>
        </div>
    @endforeach
</div>