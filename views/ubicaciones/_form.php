<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Activo', '2' => 'Inactivo']) ?>

    <?= $form->field($model, 'Clasificacion')->dropDownList(['1' => 'Oficina', '2' => 'Mantenimiento', '3' => 'Aula', '4' => 'Sala/Auditorio']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
