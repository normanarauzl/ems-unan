<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'IdTipo') ?>

    <?= $form->field($model, 'Prestado') ?>

    <?= $form->field($model, 'Marca') ?>

    <?= $form->field($model, 'Modelo') ?>

    <?php // echo $form->field($model, 'NoSerie') ?>

    <?php // echo $form->field($model, 'CodInventario') ?>

    <?php // echo $form->field($model, 'Color') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'UbicacionOrigen') ?>

    <?php // echo $form->field($model, 'UbicacionActual') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
