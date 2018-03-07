<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClndrAccess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clndr-access-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_owner')->textInput() ?>

    <?= $form->field($model, 'user_guest')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
