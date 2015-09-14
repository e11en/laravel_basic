<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;;

class CustomModel extends Model
{
    protected $rules = []; // Validation rules
    protected $alt_rules = []; // Alternative validation rules
    protected $errors; // Validation errors
    protected $attributeNames = []; // Validation attribute names (for the error messages)
    protected $messages = []; // Unique validation error messages

    /**
     * Validate the model and set the attribute
     * names and error messages.
     * @param $data
     * @param bool|false $alternative_rules
     * @return bool
     */
    public function validate($data, $alternative_rules = false)
    {
        if($alternative_rules)
            $v = Validator::make($data, $this->alt_rules, $this->messages);
        else
            $v = Validator::make($data, $this->rules, $this->messages);

        $v->setAttributeNames($this->attributeNames);

        if($v->fails()) {
            $this->errors = $v->messages();
            return false;
        }
        return true;
    }

    /**
     * Get error messages.
     * @return mixed
     */
    public function errors()
    {
        return $this->errors;
    }
}
