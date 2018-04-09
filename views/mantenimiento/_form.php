<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ubicacion;
use app\models\Persona;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdUbicacion')->dropDownList(ArrayHelper::map(Ubicacion::find()->select(['Descripcion','Id'])->all(), 'Id', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione la ubicación']); ?>

    

            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'Fecha',
                'options' => [
                    'class'=>'form-control',
                    'required'=>true
                ],
                'language' => 'es',
                'pluginOptions' => [
                   'format'=> 'yyyy-mm-dd' 
                ],
            ]);
            ?>


    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdAyudante')->dropDownList(ArrayHelper::map(Persona::find()->select(['Nombres','Id'])->where(['Estado'=>'1'])->all(), 'Id', 'Nombres'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el ayudante']); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
