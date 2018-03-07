<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClndrAccess */

$this->title = 'Update Clndr Access: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Clndr Accesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clndr-access-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
