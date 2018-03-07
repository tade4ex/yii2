<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clndr_user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $salt
 * @property string $access_token
 * @property string $create_date
 *
 * @property ClndrAccess[] $clndrAccesses
 * @property ClndrAccess[] $clndrAccesses0
 * @property ClndrCalendar[] $clndrCalendars
 */
class ClndrUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clndr_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'name', 'surname', 'password', 'salt'], 'required'],
            [['create_date'], 'safe'],
            [['username'], 'string', 'max' => 128],
            [['name', 'surname'], 'string', 'max' => 45],
            [['password', 'salt', 'access_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['access_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'surname' => 'Surname',
            'password' => 'Password',
            'salt' => 'Salt',
            'access_token' => 'Access Token',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClndrAccesses()
    {
        return $this->hasMany(ClndrAccess::className(), ['user_owner' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClndrAccesses0()
    {
        return $this->hasMany(ClndrAccess::className(), ['user_guest' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClndrCalendars()
    {
        return $this->hasMany(ClndrCalendar::className(), ['creator' => 'id']);
    }
}
