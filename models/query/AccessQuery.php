<?php

namespace app\models\query;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Access]].
 *
 * @see \app\models\Access
 */
class AccessQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function thisUser()
    {
        $this->andWhere(['user_owner' => Yii::$app->user->id]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return \app\models\Access[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Access|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
