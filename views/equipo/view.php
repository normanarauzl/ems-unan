<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Esta seguro de eliminar este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Id',
//            'IdTipo',
            'idTipo.Descripcion:text:Tipo',
            'Prestado',
            'Marca',
            'Modelo',
            'NoSerie',
            'CodInventario',
            'Color',
//            'Estado',
            [
            'attribute' => 'Estado',
            'value' => function ($model) {
                 return $model->Estado == 1 ? 'Bueno' : 'Malo';
            },
            ],
            'Descripcion',
//            'UbicacionOrigen',
//            'UbicacionActual',
            'ubicacionOrigen.Descripcion:text:Ubicacion Origen',
            'ubicacionActual.Descripcion:text:Ubicacion Actual',
        ],
    ]) ?>

</div>
