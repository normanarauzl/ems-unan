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
use app\models\Equipos;
use yii\helpers\Json;
use yii\db\Query;
use app\models\ListaEquipos;
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(ListaEquipos::find()->where(['Estado'=>'1'])->andWhere(['PermitirUsuario'=>'1'])->all(), 'Id_Equipo', 'Descripcion');
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
        <div class="col-md-3">
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
        <div class="col-md-5">
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
    <br>
    <div class="row">
        <div class="col-md-2">
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

        <div class="col-md-2">
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

        <div class="col-md-2">
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
        <div class="col-md-2">
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
                        'name' => 'Id_Equipo',
                        'id'=>'Id_Equipo',
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

                <input type="hidden" name="IdSolicitud" value="<?= $model->Id_Solicitud?>">
                <input type="hidden" ng-model="IdEquipo">
                <td><input type="text" class="form-control" ng-model="Marca" readonly required></td>
                <td><input type="text" class="form-control" ng-model="Modelo" readonly required></td>
                <td><input type="text" class="form-control" ng-model="Color" readonly required></td>
                <td><input type="text" class="form-control" ng-model="Serie" readonly required></td>
                <td><button type="button" ng-click="add()" class='btn btn-success'><i class="glyphicon glyphicon-plus"></i></button></td>
                <input type="hidden" name="detalleSolicitud" ng-model="detalleSolicitud" value="{{detalleSolicitud}}">
            </tr>
            </tbody>
        </table>
    </div>


    <br>
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
            <td hidden ng-model="invitacion.Id">{{equipo.Id}}</td>
            <td ng-model="equipo.Id_Equipo">{{equipo.Id_Equipo}}</td>
            <td ng-model="equipo.Marca">{{equipo.Marca}}</td>
            <td ng-model="equipo.Color">{{equipo.Color}}</td>
            <td ng-model="equipo.Modelo">{{equipo.Modelo}}</td>
            <td ng-model="equipo.No_Serie">{{equipo.No_Serie}}</td>
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
                'name' => 'Entregado_Por',
                'model'=>$model,
                'attribute'=> 'Entregado_Por',
                'data' => ArrayHelper::map(Ayudantes::find()->where(['Estado_Ayudante'=>'1'])->asArray()->all(), 'Id_Ayudante', 'Nombre_Ayudante'),
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
                'data' => ArrayHelper::map(Ayudantes::find()->where(['Estado_Ayudante'=>'1'])->asArray()->all(), 'Id_Ayudante', 'Nombre_Ayudante'),
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
