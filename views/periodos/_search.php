<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Periodo') ?>

    <?= $form->field($model, 'Duracion_Minutos') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Hora_Fin') ?>

    <?= $form->field($model, 'Hora_Inicio') ?>

    <?php  echo $form->field($model, 'Estado') ?>

    <?php  echo $form->field($model, 'Id_Turno') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
