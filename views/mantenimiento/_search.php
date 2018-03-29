<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Mantenimiento') ?>

    <?= $form->field($model, 'Id_Ubicacion') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'Observacion') ?>

    <?= $form->field($model, 'Id_Ayudante') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
