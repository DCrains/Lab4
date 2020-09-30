<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuPanel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-panel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_parentid')->textInput() ?>

    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_redirect')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
