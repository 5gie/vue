<?php
namespace app\system;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    public function data($data)
    {

        foreach($data as $key => $value) {
            
            if(property_exists($this, $key)) {

                $this->{$key} = $value;

            }

        }

    }

    abstract public function rules(): array;

    public function labels(): array
    {
        return [];
    }

    public function getLabel($attr)
    {
        return $this->labels()[$attr] ?? $attr;
    }


    public function validate()
    {

        foreach($this->rules() as $attr => $rules){

            $value = $this->{$attr};

            foreach($rules as $rule) {

                $ruleName = $rule;

                if(!is_string($ruleName)) $ruleName = $rule[0];

                if($ruleName === self::RULE_REQUIRED && !$value) $this->addErrorForRule(self::RULE_REQUIRED, ['field' => $this->getLabel($attr)]);

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) $this->addErrorForRule(self::RULE_EMAIL);

                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) $this->addErrorForRule(self::RULE_MIN, [self::RULE_MIN => $rule['min']]);

                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) $this->addErrorForRule(self::RULE_MAX, [self::RULE_MIN => $rule['min']]);

                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) $this->addErrorForRule(self::RULE_MATCH, [self::RULE_MATCH => $this->getLabel($rule['match']), 'field' => $this->getLabel($attr)]);

                if($ruleName === self::RULE_UNIQUE){
                    $className = $rule['class'];
                    $unique = $rule['attribute'] ?? $attr;
                    $tableName = $className::tableName();

                    $stmt = App::$app->db->prepare("SELECT * FROM $tableName WHERE $unique = :attr ");
                    $stmt->bindValue(":attr", $value);
                    $stmt->execute();
                    $record = $stmt->fetchObject();
                    if($record) $this->addErrorForRule(self::RULE_UNIQUE, ['field' => $this->getLabel($attr)]);
                }
         
            }

        }

        return empty($this->errors);

    }

    private function addErrorForRule(string $rule, $replace = [])
    {

        $message = $this->errorMessages()[$rule] ?? '';
        foreach($replace as $key => $value){
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[] = $message;

    }

    public function addError(string $message)
    {
        $this->errors[] = $message;
    }

    public function errorMessages()
    {

        return  [

            self::RULE_REQUIRED => '{field} is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => '{field} must be the same as {match}',
            self::RULE_UNIQUE => '{field} already exists' 

        ];

    }

    public function hasError($attr)
    {
        return $this->errors[$attr] ?? false;
    }

    public function getFirstError()
    {
        return $this->errors[0] ?? false;
    }

}