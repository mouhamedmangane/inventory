<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NOp implements Rule
{
    public $possible_ops;
    public $key_control;
    public $type_control;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($possible_ops,$key_control,$type_control)
    {
        $this->possible->ops = $possible_ops;
        $this->key_control=$key_control;
        $this->type_control = $type_control;

    }
 


    public function possibleOp($attribute,$value){
        
    }

    public function verificationType($attribute,$value){
        $validator = Validator::make([$attribute=>array_splice($value,1,count($value)-1)], [
                ($attribute.'.*') => $this->type
        ]);
        if($validator->fails()){
            $this->code_error=4;
            return false;
        }
        return true;
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
        $validated=true;
        $keys = array_keys($value);
        for ($i=0; $i < count($keys) ; $i++) { 
            if($keys_control[$i] != $keys[$i]){
                $this->code_error=$i;
                $validated = false;
                break;
            }
        }
        if($validated && !in_array($value['op_name'],LigneFilterIntervalMd::POSSIBLE_OPS)){
            $this->code_error=3;
            $this->validated=false;
        }
        else 
        if($validated && $value['min'] > $value['max']){
            $validated=false;
            $this->code_error=5;
        }
        return $validated;
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
