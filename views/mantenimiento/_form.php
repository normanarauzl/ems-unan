<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdUbicacion')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdAyudante')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
