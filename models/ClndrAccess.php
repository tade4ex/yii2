<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clndr_access".
 *
 * @property int $id
 * @property int $user_owner
 * @property int $user_guest
 * @property string $date
 *
 * @property ClndrUser $userOwner
 * @property ClndrUser $userGuest
 */
class ClndrAccess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clndr_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_owner', 'user_guest', 'date'], 'required'],
            [['user_owner', 'user_guest'], 'integer'],
            [['date'], 'safe'],
            [['user_owner'], 'exist', 'skipOnError' => true, 'targetClass' => ClndrUser::className(), 'targetAttribute' => ['user_owner' => 'id']],
            [['user_guest'], 'exist', 'skipOnError' => true, 'targetClass' => ClndrUser::className(), 'targetAttribute' => ['user_guest' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_owner' => 'User Owner',
            'user_guest' => 'User Guest',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOwner()
    {
        return $this->hasOne(ClndrUser::className(), ['id' => 'user_owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGuest()
    {
        return $this->hasOne(ClndrUser::className(), ['id' => 'user_guest']);
    }
}
