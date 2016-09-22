<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $message;
    //public $verifyCode;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Укажите ваше Имя'],
            ['email', 'required', 'message' => 'Укажите ваш Email'],
            ['message', 'required', 'message' => 'Укажите текс вашего сообщения'],
            // email has to be a valid email address
            ['email', 'email'],
            ['subject', 'default', 'value' => 'Сообщение от посетителя'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            //'verifyCode' => 'Проверочный код',
            'name' => 'Имя *',
            'email' => 'Email *',
            'phone' => 'Телефон',
            'subject' => 'Тема',
            'message' => 'Сообщение *',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {   
        if ($this->validate()) {
            
            if(is_array($email)){
                foreach($email as $e){
                    Yii::$app->mailer->compose()
                        ->setTo($e)
                        ->setFrom([$this->email => $this->name])
                        ->setSubject($this->subject)
                        ->setHtmlBody($this->body)
                        ->send();
                    }
            }else{
                Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom([$this->email => $this->name])
                    ->setSubject($this->subject)
                    ->setHtmlBody($this->body)
                    ->send();
            }
            
            //echo 'true<br/>';
            //exit();
            return true;
        } else {
            //echo 'false<br/>';
            //exit();
            return false;
        }
    }
}
