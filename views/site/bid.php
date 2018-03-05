<?php

use \yii\widgets\ActiveForm;
use app\models\BidForm;
use yii\helpers\Html;

/** @var $model \app\models\BidForm */

?>

<?php
$form = ActiveForm::begin(['method' => 'post', 'options' => ['class' => 'bid-form']]);
?>

<?= $form->field($model, 'name') ?>
<br />
<?= $form->field($model, 'email')->textInput() ?>
<?php
ActiveForm::end();
?>
