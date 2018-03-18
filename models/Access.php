<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\query\AccessQuery;

    /**
 * This is the model class for table "access".
 *
 * @property int $id
 * @property int $user_owner
 * @property int $user_guest
 * @property string $date
 *
 * @property User $userGuest
 * @property User $userOwner
 */
class Access extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_guest'], 'required'],
            [['user_guest'], 'integer'],
            [['user_guest'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_guest' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_owner' => Yii::t('app', 'User Owner'),
            'user_guest' => Yii::t('app', 'User Guest'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Before save new note creator is current user
     * @param bool $insert
     * @return bool
     */
    public function beforeSave ($insert)
    {
        if ($this->getIsNewRecord())
        {
            $this->user_owner = Yii::$app->user->id;
            $this->date = date('Y-m-d');
        }
        parent::beforeSave($insert);
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGuest()
    {
        return $this->hasOne(User::className(), ['id' => 'user_guest']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'user_owner']);
    }

    /**
     * @inheritdoc
     * @return AccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccessQuery(get_called_class());
    }
}
