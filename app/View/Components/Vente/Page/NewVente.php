<?php

namespace App\View\Components\Vente\Page;


use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;
use Illuminate\View\Component;

class NewVente extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.vente.page.new-vente');
    }
}
