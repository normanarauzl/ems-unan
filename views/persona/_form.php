<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(['id'=>'registration-form',
         'enableAjaxValidation'=>true,
         'validationUrl'=>Url::toRoute('persona/validation'),
        ]); ?>

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
    </div>

    <div class="alert alert-success">
        Credenciales de Acceso
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($user, 'email')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($user, 'username')->textInput(['maxlength' => true, 'required'=>true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($user, 'password')->passwordInput(['required'=>true]) ?>
        </div>
    </div>

    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
