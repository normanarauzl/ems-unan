<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="alert alert-success">
        Información personal
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'Cedula')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Activo', '2' => 'Inactivo']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'IdTipo')->dropDownList(['1' => 'Docente', '2' => 'Ayudante']) ?>
        </div>
    </div>

    <div class="alert alert-success">
        Credenciales de Acceso
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($user, 'password')->passwordInput() ?>
        </div>
    </div>

    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
