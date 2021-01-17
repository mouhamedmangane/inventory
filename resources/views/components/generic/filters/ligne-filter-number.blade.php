<span class="form-check form-check-inline {{ $attributes['class'] }} dropdown-item">
    @props(['id',App\ViewModel\GenId::newId()])
    <input class="form-check-input" type="checkbox" id="{{ $id }}" value="option1">
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>

    <div>
        <input type="number" class="">
        <button class="">></button>
        <input type="number" class="">
        <button class="">></button>
        <input type="number" class="">
    </div>

</span>