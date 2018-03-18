<?php

namespace app\models\query;

use app\models\Access;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[\app\models\Calendar]].
 *
 * @see \app\models\Calendar
 */
class CalendarQuery extends \yii\db\ActiveQuery
{
    /**
     * @return $this
     */
    public function accessUsers()
    {
        $user_id = Yii::$app->user->id;
        $users = Access::find()->where(['user_guest' => $user_id])->asArray()->all();
        $users = ArrayHelper::getColumn($users, 'user_owner');
        array_push($users, $user_id);
        $this->where(['creator' => $users]);
        return $this;
    }

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function getMine($db = null, $creator)
    {
        return parent::where(['creator' => $creator])->all();
    }

    /**
     * @inheritdoc
     * @return \app\models\Calendar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Calendar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
