@extends('layouts.noppal')
@section('content')
    <x-generic.noppal-editor-table.table 
            idTable='testEditor'
            :dd="[
               (object)['categorie'=>'ct1','produit'=>'1','prix'=>'100'],
               (object)['categorie'=>'ct2','produit'=>'8','prix'=>'500'],
            ]"
            :columns="[
                        (object)['name'=>'categorie',
                                'label'=>'Categorie',
                                'classColumn'=>'ColumnSelect',
                                'options'=>(object)[
                                                  'selectOption'=>[
                                                                    (object)['value'=>'ct1','text'=>'informatique'],
                                                                    (object)['value'=>'ct2','text'=>'boutique'],
                                                                  ],
                                                  'defaultOption'=> (object)['value'=>'','text'=>'selectioner produit'],
                                                  ],
                               ],
                        (object)['name'=>'produit',
                                 'label'=>'Produit',
                                 'classColumn'=>'ColumnSelectFree',
                                 'nameDep'=>'categorie',
                                 'urlDep'=>url('/test/categorie'),
                                 'options'=>(object)[
                                                   'selectOption'=>[
                                                                    'ct1'=>[
                                                                     (object)['value'=>'1','text'=>'premier'],
                                                                     (object)['value'=>'2','text'=>'deuxieme'],
                                                                     (object)['value'=>'3','text'=>'troisime'],
                                                                     (object)['value'=>'4','text'=>'quatriéme']
                                                                     ],
                                                                     'ct2'=>[
                                                                     (object)['value'=>'5','text'=>'cinq'],
                                                                     (object)['value'=>'8','text'=>'huit'],
                                                                     (object)['value'=>'6','text'=>'six'],
                                                                     (object)['value'=>'4','text'=>'quatriéme']
                                                                     ],
                                                                   ],
                                                    'defaultOption'=> (object)['value'=>'','text'=>'selectioner categorie'],
                                                    'unique'=> true,
                                                  ],
                                 ],
                        (object)['name'=>'prix',
                                 'label'=>'prix',
                                 'classColumn'=>'ColumnText',
                                 'options'=>(object)[
                                                   'type'=> 'test',
                                                   'defaultValue'=>'0'
                                                 ],
                                 ],
            ]"

            

            />
@endsection