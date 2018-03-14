<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Calendar]].
 *
 * @see \app\models\Calendar
 */
class CalendarQuery extends \yii\db\ActiveQuery
{
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
