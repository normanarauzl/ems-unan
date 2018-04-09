<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Turno;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DuracionMinutos')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'HoriaInicio')->widget(TimePicker::className(),['pluginOptions' => ['showSeconds' => false]]) ?>

    <?= $form->field($model,'HoraFin')->widget(TimePicker::className(),['pluginOptions' => ['showSeconds' => false]]) ?>


    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Activo', '2' => 'Inactivo']) ?>

    <?= $form->field($model, 'IdTurno')->dropDownList(ArrayHelper::map(Turno::find()->select(['Descripcion','Id'])->all(), 'Id', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione la ubicación']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
