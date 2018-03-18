<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Access */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
        ],
    ]) ?>

</div>
