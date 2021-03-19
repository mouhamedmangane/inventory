<?php

namespace App\View\Components\Vente;

use Illuminate\View\Component;

class Liste extends Component
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
    public function getTitle(){

       return [

        (object)[]
       ]
    }


    public function render()
    {
        return view('components.vente.liste');
    }
}
