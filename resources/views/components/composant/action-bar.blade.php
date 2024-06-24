<div class="d-flex" id="{{ $id }}">
    
    @foreach ($items as $item)
        @if($item->priority==0)
            @if ($item->tag == 'a')
                <a href="{{ $item->link }}" id="{{ $item->id }}" class="{{ $item->class }} ml-1">
                    {{ $item->name }}
                </a>
            @endif
            @if ($item->tag == 'button')
                <button  id="{{ $item->id }}" class="{{ $item->class }} ml-1">
                    {{ $item->name }}
                </button>
            @endif
        @endif
    @endforeach

    <div class=" dropstart" id="{{ $idEnfant('reduce') }}">
        <button id="{{ $idEnfant('select') }}" class="btn btn-secondary  ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">list</i>
        </button>
        <div class="dropdown-menu " aria-labelledby="{{ $idEnfant('select') }}">
            @foreach ($items as $item)
                @if($item->priority==1)
                    @if ($item->tag == 'a')
                        <a href="{{ $item->link }}" id="{{ $item->id }}" class="dropdown-item">
                            {{ $item->name }}
                        </a>
                    @endif
                    @if ($item->tag == 'button')
                        <span  id="{{ $item->id }}" class="dropdown-item">
                            {{ $item->name }}
                        </span>
                    @endif
                @endif
            @endforeach
            
        </div>
    </div>
</div>