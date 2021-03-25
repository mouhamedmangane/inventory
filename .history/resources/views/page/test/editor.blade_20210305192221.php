@extends('layouts.noppal')
@section('content')
    <x-generic.noppal-editor-table.table 
            idTable='tableComposant'
            :dd="[
               (object)['categorie'=>'ct1','produit'=>'1','prix'=>'100'],
               (object)['categorie'=>'ct2','produit'=>'8','prix'=>'500'],
            ]"
            :columns="[
                        (object)['name'=>'categorie',
                                'refName'=>'categorie',
                                'valueProp'=>'value',
                                'textProp'=>'text',
                                'label'=>'Categorie',
                                'classGCell'=>'GCellSelect',
                                'data'=>[
                                  @foreach($categories as $categorie => $value)
                                    
                                  @endforeach
                                  (object)['value'=>'$value','text'=>],
                                  (object)['value'=>'ct2','text'=>'boutique'],
                                  (object)['value'=>'ct3','text'=>'boutique'],
                                ],
                                'options'=>(object)[
                                                  'defaultOption'=> (object)['value'=>'','text'=>'selectioner produit'],
                                                  ],
                               ],
                        (object)['name'=>'produit',
                                 'refName'=>'produit',
                                 'valueProp'=>'value',
                                 'textProp'=>'text',
                                 'label'=>'Produit',
                                 'classGCell'=>'GCellSelectFree',
                                 'dep' => [
                                    (object)['name'=>'categorie','url'=>url('/test/categorie')], 
                                 ],
                                 'nameDep'=>'categorie',
                                 'urlDep'=>url('/test/categorie'),
                                 'data'=>[
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
                                 'options'=>(object)[
                                                    'defaultOption'=> (object)['value'=>'','text'=>'selectioner categorie'],
                                                    'unique'=> true,
                                                  ],
                                 ],
                        (object)['name'=>'prix',
                                 'label'=>'prix',
                                 'classGCell'=>'GCellText',
                                 'options'=>(object)[
                                                   'type'=> 'test',
                                                   'defaultValue'=>'0'
                                                 ],
                                 ],
            ]"

            

            />
@endsection

  @push('script')
      <script>
        $(function(){
            let editor =  $('#tableComposant').nplEditorTable();
            console.log(editor);
            editor.getColumn('produit').addEventInput('change',function(e){
                //alert('bonjour');
                let dataValueProduit = editor.getColumn('produit').getDataCell(e.rowIndex);
                let prix= dataValueProduit['prix'];
                editor.getColumn('prix').updateInput(e.rowIndex,prix);

            });
        });
      </script>
  @endpush