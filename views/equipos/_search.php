<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Equipo') ?>

    <?= $form->field($model, 'Id_Tipo') ?>

    <?= $form->field($model, 'Prestado') ?>

    <?= $form->field($model, 'Marca') ?>

    <?= $form->field($model, 'Modelo') ?>

    <?php  echo $form->field($model, 'No_Serie') ?>

    <?php  echo $form->field($model, 'Cod_Inventario') ?>

    <?php  echo $form->field($model, 'Color') ?>

    <?php  echo $form->field($model, 'Estado') ?>

    <?php  echo $form->field($model, 'Descripcion') ?>

    <?php  echo $form->field($model, 'Ubicacion_Origen') ?>

    <?php  echo $form->field($model, 'Ubicacion_Actual') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
