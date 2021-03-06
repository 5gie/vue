<?php

namespace app\models;

use app\models\User;
use app\system\Model;

class Login extends Model
{
    public ?int $id;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        
        return [
            'email' => 'E-mail',
            'password' => 'Password'
        ];
    }

    public function form(): array
    {
        
        return [
            'email' => [
                'label' => 'E-mail',
                'icon' => 'account',
                'type' => 'text'
            ],
            'password' => [
                'label' => 'Password',
                'icon' => 'lock',
                'type' => 'password'
            ],
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if(!$user){

            $this->addError('User doesnt exists');
            return false;

        }

        if(!password_verify($this->password, $user->password)){

            $this->addError('Password is incorrect');
            return false;
            
        }

        $this->name = $user->name;
        $this->id = $user->id;

        return true;

    }
}