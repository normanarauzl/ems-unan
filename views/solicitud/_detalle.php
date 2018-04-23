<?php

use kartik\select2\Select2;
use app\models\ListaEquipos;
use yii\helpers\ArrayHelper;

$data = ArrayHelper::map(ListaEquipos::find()->where(['Estado'=>'1'])->andWhere(['PermitirUsuario'=>'1'])->all(), 'Id', 'Descripcion');
?>

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
                    'name' => 'Descripcion',
                    'Id'=>'Descripcion',
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

            <input type="hidden" name="IdSolicitud" value="<?= $IdSolicitud?>">
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

