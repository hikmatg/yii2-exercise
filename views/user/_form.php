<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['max_length' => 50]) ?>

    <?= $form->field($model, 'last_name')->textInput(['max_length' => 50]) ?>

    <?= $form->field($model, 'email')->input('email', ['max_length' => 50]) ?>

    <?= $form->field($model, 'personal_code')->input('number', ['max_length' => 11, 'min_length' => 11]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'dead')->checkbox() ?>

    <?= $form->field($model, 'lang')->textInput(['max_length' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
