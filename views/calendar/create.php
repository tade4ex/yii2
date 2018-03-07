<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClndrCalendar */

$this->title = 'Create Clndr Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Clndr Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clndr-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
