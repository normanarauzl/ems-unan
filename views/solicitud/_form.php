<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Personas;
use app\models\Ubicaciones;
use app\models\Periodos;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Persona')->textInput() ?>
    <?= $form->field($model, 'Id_Persona')->dropDownList(ArrayHelper::map(Personas::find()->select(['Nombre','Id_Persona'])->all(), 'Id_Persona', 'Nombre'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione la persona']); ?>

    <?= $form->field($model, 'Id_Ubicacion')->textInput() ?>
    <?= $form->field($model, 'Id_Ubicacion')->dropDownList(ArrayHelper::map(Ubicaciones::find()->select(['Descripcion','Id_Ubicacion'])->all(), 'Id_Ubicacion', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Donde se instalara el equipo']); ?>


    <?= $form->field($model, 'Fecha_Inicio')->textInput() ?>

    <?= $form->field($model, 'Fecha_Fin')->textInput() ?>

    <?= $form->field($model, 'Hora_Inicio')->textInput() ?>

    <?= $form->field($model, 'Hora_Fin')->textInput() ?>

    <?= $form->field($model, 'Estado_Solicitud')->textInput() ?>

    <?= $form->field($model, 'Fecha_Solicitud')->textInput() ?>

    <?= $form->field($model, 'Entregado_Por')->textInput() ?>

    <?= $form->field($model, 'Retirado_Por')->textInput() ?>

    <?= $form->field($model, 'Observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Id_Periodo')->textInput() ?>
    <?= $form->field($model, 'Id_Periodo')->dropDownList(ArrayHelper::map(Periodos::find()->select(['Descripcion','Id_Periodo'])->all(), 'Id_Periodo', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el tipo de equipos']); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
