<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ubicacion;
use app\models\Persona;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\ListaEquipos;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(ListaEquipos::find()->where(['Estado'=>'1'])->all(), 'Id', 'Descripcion');
?>



<span ng-init='movimientoMantenimiento = <?= Json::encode($model->movimientoMantenimientos)?>'></span>
<div class="mantenimiento-form" ng-controller="MantenimientoController">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Datos del Mantenimiento</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Fecha de Envio</label>
                    <?= DatePicker::widget(['model' => $model, 'attribute' => 'Fecha', 'options' => [
                        'class'=>'form-control', 'required'=>true
                    ],
                        'language' => 'es',
                        'dateFormat' => 'php:Y-m-d',
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'IdUbicacion')->dropDownList(
                        ArrayHelper::map(Ubicacion::find()->where(['Estado'=>'1'])->andWhere(['IdClasificacionUbicacion'=>'2'])->asArray()->all(),'Id', 'Descripcion'),
                        ['prompt'=>'Seleccione Ubicacion Destino','required'=>true]
                    );?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'IdAyudante')->dropDownList(ArrayHelper::map(Persona::find()->select(['Nombres','Id'])->where(['Estado'=>'1'])->all(), 'Id', 'Nombres'),
                        ['prompt'=>'Seleccione el ayudante','required'=>true]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Detalle del Envio [Seleccione el/los equipo y agregue a la lista]</h3>
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
                <input type="hidden" name="movimientoMantenimiento" ng-model="movimientoMantenimiento" value="{{movimientoMantenimiento}}">
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
            <tr ng-repeat="equipo in movimientoMantenimiento track by $index">
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

    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
