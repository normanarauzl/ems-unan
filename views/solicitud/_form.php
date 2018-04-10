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
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(ListaEquipos::find()->where(['Estado'=>'1'])->andWhere(['PermitirUsuario'=>'1'])->all(), 'Id', 'Descripcion');
?>

<span ng-init='detalleSolicitud = <?= Json::encode($model->detalleSolicituds)?>'></span>
<div class="solicitud-form" ng-controller="SolicitudController">

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label for="">Nombre del Solicitante</label>
            <?=
            Select2::widget([
                'name' => 'IdPersona',
                'model'=>$model,
                'attribute'=> 'IdPersona',
                'data' => ArrayHelper::map(Personas::find()->where(['TipoPersona'=>'Docente'])->andWhere(['Estado'=>'1'])->asArray()->all(), 'Id', 'NombreCompleto'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione a la Persona'
                    ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <label for="">Ubicación de la solicitud</label>
            <?=
            Select2::widget([
                'name' => 'IdUbicacion',
                'model'=>$model,
                'attribute'=> 'IdUbicacion',
                'data' => ArrayHelper::map(Ubicacion::find()->where(['Clasificacion'=>'3'])->asArray()->all(), 'Id', 'Descripcion'),
                'options' =>
                    [
                        'multiple' => false,
                        'placeholder' => 'Seleccione la Ubicacion'
                    ]
            ]);
            ?>
        </div>
        <div class="col-md-5">
            <label for="">Periodo</label>
            <?=
            Select2::widget([
                'name' => 'IdPeriodo',
                'model'=>$model,
                'attribute'=> 'IdPeriodo',
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
    <br>
    <div class="row">
        <div class="col-md-2">
            <label for="">Fecha de Inicio</label>
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'FechaInicio',
                'options' => [
                    'class'=>'form-control',
                    'required'=>true
                ],
                'language' => 'es',
                'dateFormat' => 'php:Y-m-d',
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <label for="">Fecha de Fin</label>
            <?=
            DatePicker::widget([
                'model' => $model,
                'attribute' => 'FechaFin',
                'options' => [
                    'class'=>'form-control',
                    'required'=>true
                ],
                'language' => 'es',
                'dateFormat' => 'php:Y-m-d',
            ]);
            ?>
        </div>
    </div>
    <br>


    <div class="panel panel-primary">
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


    <br><br>
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
    <div class="row">
        <div class="col-md-6">
            <label for="">Entregado por</label>
            <?=
            Select2::widget([
                'name' => 'EntregadoPor',
                'model'=>$model,
                'attribute'=> 'EntregadoPor',
                'data' => ArrayHelper::map(Personas::find()->where(['TipoPersona'=>'Ayudante'])->andWhere(['Estado'=>'1'])->asArray()->all(), 'Id', 'NombreCompleto'),
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
                'name' => 'RetiradoPor',
                'model'=>$model,
                'attribute'=> 'RetiradoPor',
                'data' => ArrayHelper::map(Personas::find()->where(['TipoPersona'=>'Ayudante'])->andWhere(['Estado'=>'1'])->asArray()->all(), 'Id', 'NombreCompleto'),
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
    <?= $form->field($model, 'Observacion1')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>