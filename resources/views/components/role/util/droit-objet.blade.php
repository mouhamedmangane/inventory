<tr>
    <td>
        {{ $objet->nom }}
        <input type="hidden" name="objet[{{ $objet->id }}].id" value="{{ $objet->id }}" >
    </td>

    <td class="bg-evidence-1" >
        <x-generic.input.checkbox name="objet[{{ $objet->id }}].r" value="{{ $objet->id }}" label="r"   checked="{{ $isCheck($roleObjet->r) }}" />
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="c[]" value="{{ $objet->id }}" label="c" checked="{{ $isCheck($roleObjet->c) }}"/>
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="u[]" value="{{ $objet->id }}" label="u" checked="false"/>
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="d[]" value="{{ $objet->id }}" label="d" checked="false"/>
    </td>

    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="co[]" value="{{ $objet->id }}" label="co" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="ro[]" value="{{ $objet->id }}" label="ro" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="uo[]" value="{{ $objet->id }}" label="uo" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="do[]" value="{{ $objet->id }}" label="do" checked="false"/>
    </td>

</tr>


