<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Calendars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Calendar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:ntext',
            [
                'label' => Yii::t('app', 'Creator'),
                'format' => 'text',
                'attribute' => 'creator',
                'value' => function ($model) {
                    $user = User::findOne($model->creator);
                    return $user->name . ' ' . $user->surname . ' (' . $user->username . ')';
                }
            ],
            'date_event',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
