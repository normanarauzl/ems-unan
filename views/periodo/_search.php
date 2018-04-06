<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'DuracionMinutos') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'HoriaInicio') ?>

    <?= $form->field($model, 'HoraFin') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'IdTurno') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
