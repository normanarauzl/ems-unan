<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\TipoPersona;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(['id'=>'persona-form',
         'enableAjaxValidation'=>true,
         'validationUrl'=>Url::toRoute('persona/validation'),
        ]); ?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Datos Personales</h3>
        </div>
        <div class="panel-body">
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
                    <?= $form->field($model, 'IdTipo')->dropDownList(
                        ArrayHelper::map(TipoPersona::find()->asArray()->all(),'Id', 'Descripcion'),
                        ['prompt'=>'Seleccione Persona','required'=>true]
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Credenciales de Acceso</h3>
        </div>
        <div class="panel-body">

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
        </div>
    </div>

    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
