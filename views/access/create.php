<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClndrAccess */

$this->title = 'Create Clndr Access';
$this->params['breadcrumbs'][] = ['label' => 'Clndr Accesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clndr-access-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
