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

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'IdUbicacion') ?>

    <?= $form->field($model, 'FechaInicio') ?>

    <?= $form->field($model, 'FechaFin') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'FechaSolicitud') ?>

    <?php // echo $form->field($model, 'EntregadoPor') ?>

    <?php // echo $form->field($model, 'RetiradoPor') ?>

    <?php // echo $form->field($model, 'Observacion1') ?>

    <?php // echo $form->field($model, 'Observacion2') ?>

    <?php // echo $form->field($model, 'Observacion3') ?>

    <?php // echo $form->field($model, 'IdPeriodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
