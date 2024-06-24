<div>
    @foreach ($boutiques as $b)
        <form class="row" action="">
            <div class="col-md-3">{{ $b->nom }}</div>
            <div class="col-md-3">
                @isset($bA->role_id)
                    <x-generic.input.select name="role[]" id="role{{ $loop->index }}" :$dt="$roles()" :value="$getIdRoleForSelect($bA)"/>
                @endisset
            </div>
            <div class="col-md-3">
                    <x-generic.input.checkbox name="active[]" value="active" type="switch" class="h1" id="sstest" :checked='$bA' />
            </div>
        </form>
    @endforeach
</div>