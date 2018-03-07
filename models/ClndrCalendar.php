<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clndr_calendar".
 *
 * @property int $id
 * @property string $text
 * @property int $creator
 * @property string $date_event
 *
 * @property ClndrUser $creator0
 */
class ClndrCalendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clndr_calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'creator'], 'required'],
            [['text'], 'string'],
            [['creator'], 'integer'],
            [['date_event'], 'safe'],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => ClndrUser::className(), 'targetAttribute' => ['creator' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'creator' => 'Creator',
            'date_event' => 'Date Event',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(ClndrUser::className(), ['id' => 'creator']);
    }
}
