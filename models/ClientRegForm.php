<?php

namespace app\models;

use yii\base\Model;
use Yii;

class ClientRegForm extends Model
{
    public $type;
    public $company_name;
    public $contact_name;
    public $your_task;
    public $country;
    public $city;
    public $address;
    public $email;
    public $website;
    public $text;

    public function rules()
    {
        return [
            [['email'],'filter', 'filter' => 'trim'],
            ['type', 'required',
                'message' => 'Не может быть пустым'
            ],
            [['email'],'required',
                'message' => 'E-mail не может быть пустым.'
            ],
            [['contact_name'],'required',
                'message' => 'Контактное лицо не может быть пустым.'
            ],
            [['country'],'required',
                'message' => 'Введите название страны.'
            ],
            [['city'],'required',
                'message' => 'Введите название города.'
            ],
            [['address'],'required',
                'message' => 'Введите ваш адрес.'
            ],
            [['text'],'required',
                'message' => 'Введите текст.'
            ],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => Client::className(),
                'message' => 'Этот e-mail уже занят.']
        ];
    }

    public function attributeLabels()
    {
        return [
            'type' => 'Компания/Частное лицо *',
            'contact_name' => 'Контактное лицо *',
            'company_name' => 'Название компании',
            'your_task' => 'Ваша задача',
            'country' => 'Страна *',
            'city' => 'Город *',
            'address' => 'Адрес *',
            'website' => 'Веб-сайт',
            'text' => 'Текст *',
            'email' => 'E-mail'
        ];
    }

    public function reg()
    {
        $client = new Client();
        $client->type = $this->type;
        $client->username = $this->email;
        $client->company_name = $this->company_name;
        $client->contact_name = $this->contact_name;
        $client->your_task = $this->your_task;
        $client->country = $this->country;
        $client->city = $this->city;
        $client->address = $this->address;
        $client->email = $this->email;
        $client->website = $this->website;
        $client->text = $this->text;
        $client->setPassword(substr(hash('sha512',rand()),0,12));
        return $client->save(false) ? $client : null;
    }
}