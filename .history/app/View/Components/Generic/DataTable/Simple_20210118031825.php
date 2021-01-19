<?php

namespace App\View\Components\Generic\DataTable;

use Illuminate\View\Component;

class Simple extends Component
{
    public $name,//nom de la variable datatable dans le js
           $columns,
           $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$url="")
    {
        $this->name = $name;
        $this->columns = $this->initColumns();
        $this->url = $url;
    }
    public function initColumns(){
        return [
            (object) ['name'=>'Prenom','propertyName'=>'prenom'], 
            (object) ['name'=>'Nom','propertyName'=>'nom'],(object) ['name'=>'Age','propertyName'=>'age']
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.data-table.simple');
    }
}
