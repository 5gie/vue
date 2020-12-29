<?php

namespace app\models;
use app\system\Model;

class RegisterModel extends Model
{

    public string $name = '';
    public string $email = '';
    public string $pw1 = '';
    public string $pw2 = '';

    public function register()
    {



    }
    
    public function rules(): array
    {

        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'pw1' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'pw2' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'pw1']],
        ];

    }
}