<?php

namespace App\View\Components\Page\Produit\Ajustement;

use Illuminate\View\Component;

class Liste extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $actionItems;
    public $filter;

  //  public $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
   // public function __construct($data="non_archived")
    public function __construct()
    {
        //$this->data=$data;
        $this->selectTitreItems = $this->initSelectTitreItems();
        $this->actionItems = $this->initActionItems();

    }


    public function getFilter(){
        return  FilterFactory::filterMd('mySearch')
                ->add(FilterFactory::ligneSelectMd('type_produit','Type Produit')
                      ->addLIgne("consommable",'Consommable')
                      ->addLigne('service','Service')
                )
                ->add(FilterFactory::ligneIntervalMd('prix','Prix','number',0,0,0))
                ->add(FilterFactory::ligneOneMd('categore','Categorie','text','egal'))
                ->add(FilterFactory::ligneIntervalMd('date_creation','Date Creation','date',0,0,0))

                ;
    }
    public function initSelectTitreItems(){
        return
        [
            ["name"=>"Tous","icon"=>"add","filter"=>'tous'],
            ["name"=>"Actif","icon"=>"add","filter"=>'tous'],
            ["name"=>"Desactive","icon"=>"add","filter"=>'tous']
        ];
    }

    public function initActionItems(){
        return (object)
        [
            (object)  ["tag"=>"a", "id"=>"i", "link"=>url('\dashbord'), "name"=>"Add", "icon"=>"add", "priority"=>0, "class" =>"btn btn-success"],
            (object)  ["tag"=>"button", "id"=>"remove_action_bar", "name"=>"Remove", "icon"=>"add", "priority"=>1,"class" =>"btn"],
            (object)  ["tag"=>"button", "id"=>"i", "name"=>"Archiver", "icon"=>"add", "priority"=>1,"class" =>"btn"]
        ];

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page.produit.ajustement.liste');
    }
}
