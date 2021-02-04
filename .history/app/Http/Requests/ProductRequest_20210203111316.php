<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'libelle' => 'required|unique:produits',
            'code' => 'required|unique:produits',
            'qteStock' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'qteSeuil' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',//decimal
            'prix_vente_min' => 'nullable|integer|not_in:0',         
            'prix_vente_max' => 'nullable|integer|not_in:0',         
            'prix_achat_min' => 'nullable|integer|not_in:0',         
            'prix_achat_max' => 'nullable|integer|not_in:0',    
        ];
    }

    public function withValidatator($validator){
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });

    }
}
