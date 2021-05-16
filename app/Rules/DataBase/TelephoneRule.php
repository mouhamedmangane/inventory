<?php

namespace App\Rules\DataBase;

use Illuminate\Contracts\Validation\Rule;
use Validator;

class TelephoneRule implements Rule
{

    public const ADD_METHOD=0;
    public const UPDATE_METHOD=1;


    private $code 
    ;


    private $table;
    private $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table="telephones",$id=0)
    {
        $this->table=$table;
        $this->id=$id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->numericValidation() && $this->testUnique();
    }
    public function numericValidation($attribute, $value){
        $validator = Validator::make([$attribute=>$value],[
            $attribute.'.indicatif'=>'numeric',
            $attribute.'.numero'=>'numeric',
        ]);
        return !$validator->fails();
    }

    public function testUnique($attribute,$value){
        if($this->)
        return !DB::table($this->telephone)->where('indicatif',$value->indicatif)
                                   ->where('numero',$value->numero)
                                   ->where('id','<>',$this->id)
                                   ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
