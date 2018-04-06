<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DuracionMinutos')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HoriaInicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HoraFin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdTurno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
