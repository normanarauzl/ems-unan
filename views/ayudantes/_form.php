<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ayudantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ayudantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre_Ayudante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado_Ayudante')->dropDownList(['1' => 'Activo', '2' => 'Inactivo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
