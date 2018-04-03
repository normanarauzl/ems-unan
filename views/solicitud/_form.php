<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\ListaPersonas;
use app\models\Ubicaciones;
use kartik\time\TimePicker;
use yii\jui\DatePicker;
use app\models\Ayudantes;
use app\models\ListaPeriodos;
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="">Nombre del Solicitante</label>
            <?=
            Select2::widget([
                'name' => 'Id_Persona',
                'model'=>$model,
                'attribute'=> 'Id_Persona',
                'data' => ArrayHelper::map(ListaPersonas::find()->asArray()->all(), 'Id', 'NombreCompleto'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione a la Persona'
                    ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <label for="">Ubicación de la solicitud</label>
            <?=
            Select2::widget([
                'name' => 'Id_Ubicacion',
                'model'=>$model,
                'attribute'=> 'Id_Ubicacion',
                'data' => ArrayHelper::map(Ubicaciones::find()->asArray()->all(), 'Id_Ubicacion', 'Descripcion'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione la Ubicacion'
                    ]
            ]);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label for="">Fecha de Inicio</label>
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'Fecha_Inicio',
                'options' => [
                    'class'=>'form-control',
                    'required'=>true
                ],
                'language' => 'es',
                'dateFormat' => 'php:Y-m-d',
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <label for="">Fecha de Fin</label>
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'Fecha_Fin',
                'options' => [
                    'class'=>'form-control',
                    'required'=>true
                ],
                'language' => 'es',
                'dateFormat' => 'php:Y-m-d',
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <label for="">Hora de Inicio</label>
            <?=
            TimePicker::widget([
                'model' => $model,
                'attribute' => 'Hora_Inicio',
                'pluginOptions' => [
                    'showSeconds' => false,
                    'required'=>true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <label for="">Hora de Fin</label>
            <?=
            TimePicker::widget([
                'model' => $model,
                'attribute' => 'Hora_Fin',
                'pluginOptions' => [
                    'showSeconds' => false,
                    'required'=>true
                ]
            ]);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'Estado_Solicitud')->dropDownList(
                ['1'=>'Abierto','2'=>'Cerrado'],
                ['prompt'=>'Estado de la Solicitud','required'=>true]
            )?>
        </div>
        <div class="col-md-6">
            <label for="">Periodo</label>
            <?=
            Select2::widget([
                'name' => 'Id_Periodo',
                'model'=>$model,
                'attribute'=> 'Id_Periodo',
                'data' => ArrayHelper::map(ListaPeriodos::find()->asArray()->all(), 'Id', 'DescripcionCompleta'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione Periodo'
                    ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="">Entregado por</label>
            <?=
            Select2::widget([
                'name' => 'Entregado_Por',
                'model'=>$model,
                'attribute'=> 'Entregado_Por',
                'data' => ArrayHelper::map(Ayudantes::find()->asArray()->all(), 'Id_Ayudante', 'Nombre_Ayudante'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione Ayudante'
                    ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <label for="">Retirado por</label>
            <?=
            Select2::widget([
                'name' => 'Retirado_Por',
                'model'=>$model,
                'attribute'=> 'Retirado_Por',
                'data' => ArrayHelper::map(Ayudantes::find()->asArray()->all(), 'Id_Ayudante', 'Nombre_Ayudante'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione Ayudante'
                    ]
            ]);
            ?>
        </div>
    </div>
    <br>
    <?= $form->field($model, 'Observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones_3')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
