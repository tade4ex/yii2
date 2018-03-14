<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LoginHistory */

$this->title = Yii::t('app', 'Create Login History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Login Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
