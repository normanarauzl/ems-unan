<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ubicaciones;
use app\models\Ayudantes;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Ubicacion')->dropDownList(ArrayHelper::map(Ubicaciones::find()->select(['Descripcion','Id_Ubicacion'])->all(), 'Id_Ubicacion', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione la ubicacion']); ?>

    <?= $form->field($model,'Fecha')->widget(DatePicker::className(),['language' => 'es','class'=>'form-control','dateFormat' => 'php:Y-m-d']) ?>

    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Id_Ayudante')->dropDownList(ArrayHelper::map(Ayudantes::find()->select(['Nombre_Ayudante','Id_Ayudante'])->all(), 'Id_Ayudante', 'Nombre_Ayudante'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el alumno ayudante']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Mantenimiento') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
