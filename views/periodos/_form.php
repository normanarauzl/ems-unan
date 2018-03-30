<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Turnos;
use yii\helpers\ArrayHelper;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Periodos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Duracion_Minutos')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model,'Hora_Inicio')->widget(TimePicker::className(),['pluginOptions' => ['showSeconds' => false]]) ?>

    <?= $form->field($model,'Hora_Fin')->widget(TimePicker::className(),['pluginOptions' => ['showSeconds' => false]]) ?>

    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Activo', '2' => 'Inactivo']) ?>

    <?= $form->field($model, 'Id_Turno')->dropDownList(ArrayHelper::map(Turnos::find()->select(['Descripcion','Id_Turno'])->all(), 'Id_Turno', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el turno']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
