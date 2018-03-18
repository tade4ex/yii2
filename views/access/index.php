<?php

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accesses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Access'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'text',
                'attribute' => 'user_owner',
                'value' => function ($model) {
                    $user = User::findOne($model->user_owner);
                    return $user->name . ' ' . $user->surname . ' (' . $user->username . ')';
                }
            ],
            [
                'format' => 'text',
                'attribute' => 'user_guest',
                'value' => function ($model) {
                    $user = User::findOne($model->user_guest);
                    return $user->name . ' ' . $user->surname . ' (' . $user->username . ')';
                }
            ],
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
