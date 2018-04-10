<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Personas;
use app\models\Ubicacion;
use kartik\time\TimePicker;
use yii\jui\DatePicker;
use app\models\ListaPeriodos;
use yii\helpers\Json;
use yii\db\Query;
use app\models\ListaEquipos;
use app\models\Turno;
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(ListaEquipos::find()->where(['Estado'=>'1'])->andWhere(['PermitirUsuario'=>'1'])->all(), 'Id', 'Descripcion');
?>

<span ng-init='detalleSolicitud = <?= Json::encode($model->detalleSolicituds)?>'></span>
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
                    <?= Html::dropDownList('Turno', null,
                        ArrayHelper::map(Turno::find()->all(), 'Id', 'Descripcion'),
                        ['prompt'=>'Seleccione el Turno','class'=>'form-control','required'=>true]
                        ) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'IdPeriodo')->dropDownList(
                        ArrayHelper::map(ListaPeriodos::find()->asArray()->all(), 'Id', 'DescripcionCompleta'),
                        ['prompt'=>'Seleccione el Período','required'=>true]
                    );?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Detalle de la solicitud [Seleccione el/los equipo y agregue a la lista]</h3>
        </div>
        <table class="table table-fixed" width="100%">
            <thead>
            <th width="15%">Equipo</th>
            <th width="20%">Marca</th>
            <th width="20%">Modelo</th>
            <th width="10%">Color</th>
            <th width="10%">Serie</th>
            <th width="5%">Agregar</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?= Select2::widget([
                        'name' => 'IdEquipo',
                        'id'=>'IdEquipo',
                        'data' => $data,
                        'options' => [
                            'multiple' => false,
                            'placeholder' => 'Seleccione Equipo',
                            'ng-model'=>'IdEquipo',
                            'ng-change'=>'SetEquipo()'
                        ]
                    ]);
                    ?>
                </td>

                <input type="hidden" name="IdSolicitud" value="<?= $model->Id?>">
                <input type="hidden" ng-model="IdEquipo">
                <td><input type="text" class="form-control" ng-model="Marca" readonly required></td>
                <td><input type="text" class="form-control" ng-model="Modelo" readonly required></td>
                <td><input type="text" class="form-control" ng-model="Color" readonly required></td>
                <td><input type="text" class="form-control" ng-model="NoSerie" readonly required></td>
                <td><button type="button" ng-click="add()" class='btn btn-success'><i class="glyphicon glyphicon-plus"></i></button></td>
                <input type="hidden" name="detalleSolicitud" ng-model="detalleSolicitud" value="{{detalleSolicitud}}">
            </tr>
            </tbody>
        </table>
    </div>

    <div class="panel panel-primary">
        <table class="table table-bordered table-condensed table-striped">
            <tbody>
            <thead>
            <tr>
                <th width="15%">Equipo</th>
                <th width="20%">Marca</th>
                <th width="20%">Modelo</th>
                <th width="10%">Color</th>
                <th width="10%">Serie</th>
                <th width="5%"></th>
            </tr>
            </thead>
            <tr ng-repeat="equipo in detalleSolicitud track by $index">
                <td hidden ng-model="equipo.IdEquipo">{{equipo.IdEquipo}}</td>
                <td ng-model="equipo.Descripcion">{{equipo.Descripcion}}</td>
                <td ng-model="equipo.Marca">{{equipo.Marca}}</td>
                <td ng-model="equipo.Color">{{equipo.Color}}</td>
                <td ng-model="equipo.Modelo">{{equipo.Modelo}}</td>
                <td ng-model="equipo.NoSerie">{{equipo.NoSerie}}</td>
                <td>
                    <button type="button" ng-click="del($index)" title='Borrar' class='btn btn-danger'><i class="glyphicon glyphicon-minus"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <?= $form->field($model, 'Observacion1')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>