<?php

namespace App\View\Components\Generic\DataTable;

use Illuminate\View\Component;

class Simple extends Component
{
    public $name,//nom de la variable datatable dans le js
           $columns,
           $url,
           $data,
           $searchId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$columns,$url=null,$data=null,$searchId="")
    {
        $this->name = $name;
        $this->columns = $columns;
        $this->url = $url;
        $this->datae=$data->original->data;
        dd($this->data);
        $this->searchId =$searchId;
    }

    public function nameColumns(){
        $names=[];
        foreach($this->columns as $col){
            $names[]=$col->propertyName;
        }
        return $names; 
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render(){
        return view('components.generic.data-table.simple');
    }
}
