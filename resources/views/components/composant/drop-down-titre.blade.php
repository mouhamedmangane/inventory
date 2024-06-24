<div class="dropdown" id="{{ $id }}">
    <button id="{{ $idEnfant('select') }}" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Text</button>
    <div class="dropdown-menu" aria-labelledby="{{ $idEnfant('select') }}">
        @foreach ($navModel->navBlocModels as $navBlocModel)
            @foreach ($navBlocModel->navElementModels as $navElementModel )
                <span class="dropdown-item ">Text</span>    
            @endforeach
            @if (! $loop->last)
                <div class="dropdown-divider"> </div> 
            @endif
        @endforeach
        
    </div>
</div>