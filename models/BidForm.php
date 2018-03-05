<?php

namespace app\models;

use yii\base\Model;

class BidForm extends Model
{
    public $name;
    public $address;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            ['email', 'email'],
            [['name', 'address', 'email', 'phone'], 'required']
        ];
    }
}