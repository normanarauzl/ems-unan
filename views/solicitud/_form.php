<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ubicacion;
use yii\jui\DatePicker;
use yii\helpers\Json;
use app\models\Periodo;
use app\models\Turno;
use yii\helpers\VarDumper;
use app\models\Equipo;
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */

$IsAdmin = Yii::$app->user->identity->username == 'admin'? true : false;

?>

<span ng-init='detalleSolicitud = <?= Json::encode($model->detalleSolicituds)?>'></span>
<span ng-init='equipos = <?= Json::encode(Equipo::find()->asArray()->all())?>'></span>

<div class="solicitud-form" ng-controller="SolicitudController">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Información del solicitante</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Nombre del Solicitante: </label>
                    <input type="text" value="<?= $persona['Nombres'].' '.$persona['Apellidos']?>" readonly class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Cédula: </label>
                    <input type="text" value="<?= $persona['Cedula']?>" readonly class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Teléfono: </label>
                    <input type="text" value="<?= $persona['Telefono']?>" readonly class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Datos de la solicitud</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Fecha de Inicio</label>
                    <?= DatePicker::widget(['model' => $model, 'attribute' => 'FechaInicio', 'options' => [
                        'class'=>'form-control', 'required'=>true
                    ],
                        'language' => 'es',
                        'dateFormat' => 'php:Y-m-d',
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <label for="">Fecha de Fin</label>
                    <?= DatePicker::widget(['model' => $model, 'attribute' => 'FechaFin', 'options' => [
                        'class'=>'form-control', 'required'=>true
                    ],
                        'language' => 'es',
                        'dateFormat' => 'php:Y-m-d',
                    ]);
                    ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'IdUbicacion')->dropDownList(
                        ArrayHelper::map(Ubicacion::find()->where(['Estado'=>'1'])->asArray()->all(),'Id', 'Descripcion'),
                        ['prompt'=>'Seleccione Ubicacion','required'=>true]
                    );?>
                </div>
                <div class="col-md-2">
                    <label for="">Turno </label>
                    <?= Html::dropDownList('Turno',null,
                        ArrayHelper::map(Turno::find()->all(), 'Id', 'Descripcion'),
                        [
                            'prompt'=>'Seleccione el Turno',
                            'class'=>'form-control','required'=>true,
                            'onchange'=>'
                                $.post("periodos?IdTurno='.'"+$(this).val(), function(data){
                                    $("select#solicitud-idperiodo").html(data);
                                });'
                        ]
                    ) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'IdPeriodo')->dropDownList(
                        ArrayHelper::map(Periodo::find()->asArray()->all(), 'Id', 'DescripcionCompleta'),
                        ['prompt'=>'Seleccione el Período','required'=>true]
                    );?>
                </div>
            </div>
        </div>
    </div>
    <?php
        //Si el usuario tiene permisos de admin podrá ver el detalle, si es profesor solamente hará la solicitud
        if ($IsAdmin)
            echo $this->render('_detalle', ['IdSolicitud' => $model->Id]);
    ?>
    <?= $form->field($model, 'Observacion1')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>