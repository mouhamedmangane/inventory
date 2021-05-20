<?php

namespace App\View\Components\Contact\Util;

use Illuminate\View\Component;

class Create extends Component
{
    public $contact;
    public $telephones=[
                ['indicatif'=>'','numero'=>'','id'=>0],
                ['indicatif'=>'','numero'=>'','id'=>0]
            ],
            $client_fournisseur=[false,false];


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact=$contact;
        $tels=$contact->telephones;
        if($tels){
            $i=0;
            foreach ($tels as $key => $value) {
                $this->telephones[$i]['indicatif']=$value->indicatif;
                $this->telephones[$i]['numero']=$value->numero;
                $this->telephones[$i]['id']=$value->id;
                $i++;
            }
        }
        if($contact->id){
            $this->client_fournisseur[0]=(boolean) $contact->is_client;
            $this->client_fournisseur[1]=(boolean) $contact->is_fournisseur;
        }
        // dd($this->telephones);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.contact.util.create');
    }
}
