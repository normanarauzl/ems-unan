<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Solicitud') ?>

    <?= $form->field($model, 'Id_Persona') ?>

    <?= $form->field($model, 'Id_Ubicacion') ?>

    <?= $form->field($model, 'Fecha_Inicio') ?>

    <?= $form->field($model, 'Fecha_Fin') ?>

    <?php // echo $form->field($model, 'Hora_Inicio') ?>

    <?php // echo $form->field($model, 'Hora_Fin') ?>

    <?php // echo $form->field($model, 'Estado_Solicitud') ?>

    <?php // echo $form->field($model, 'Fecha_Solicitud') ?>

    <?php // echo $form->field($model, 'Entregado_Por') ?>

    <?php // echo $form->field($model, 'Retirado_Por') ?>

    <?php // echo $form->field($model, 'Observaciones') ?>

    <?php // echo $form->field($model, 'Observaciones_2') ?>

    <?php // echo $form->field($model, 'Observaciones_3') ?>

    <?php // echo $form->field($model, 'Id_Periodo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
