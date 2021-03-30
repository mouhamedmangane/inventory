<tr>
    <td>
        {{ $objet->nom }}
        <input type="hidden" name="object_id[]" id="{{ $objet->id }}">
    </td>

    <td class="bg-evidence-1" >
        <x-generic.input.checkbox name="c[]" label="c" checked="{{ $isCheck($roleObjet->c) }}" />
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="r[]" label="r" checked="{{ $isCheck($roleObjet->r) }}"/>
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="u[]" label="u" checked="false"/>
    </td>
    <td class="bg-evidence-1">
        <x-generic.input.checkbox name="d[]" label="d" checked="false"/>
    </td>

    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="co[]" label="co" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="ro[]" label="ro" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="uo[]" label="uo" checked="false"/>
    </td>
    <td class="bg-evidence-2">
        <x-generic.input.checkbox name="do[]" label="do" checked="false"/>
    </td>

</tr>


