<?php
/**
 * Created by PhpStorm.
 * User: phpNT
 * Date: 02.05.2015
 * Time: 18:16
 */
namespace app\models;

use yii\base\Model;
use Yii;

class ClientLoginForm extends Model
{
    public $username;
    public $password;
    public $email;

    private $_user = false;

    public function rules()
    {
        return [
            ['password', 'required', 'on' => 'default'],
            ['email', 'email',
                'message' => 'Неверный e-mail адрес'
            ],
            ['email', 'required', 'on' => 'default',
                'message' => 'E-mail не может быть пустым'
            ],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()):
            $user = $this->getUser();
            print $user->validatePassword($this->password);
            if (!$user || !$user->validatePassword($this->password)):
                $field = 'email';
                $this->addError($attribute, 'Неправильный '.$field.' или пароль.');
            endif;
        endif;
    }

    public function getUser()
    {
        if ($this->_user === false):
            $this->_user = Client::findByEmail($this->email);
        endif;
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль'
        ];
    }

    public function login()
    {
        if ($this->validate()):
            if ($this->getUser() == true):
                return Yii::$app->user->login($this->getUser(), 0);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
}