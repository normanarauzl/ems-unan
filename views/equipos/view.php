<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = $model->Id_Equipo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->Id_Equipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->Id_Equipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Está seguro de eliminar este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Id_Equipo',
//            'Id_Tipo',
            'idTipo.Descripcion:text:Tipo',
            'Prestado',
            'Marca',
            'Modelo',
            'No_Serie',
            'Cod_Inventario',
            'Color',
            'Estado',
            'Descripcion',
            'Ubicacion_Origen',
            'Ubicacion_Actual',
        ],
    ]) ?>

</div>
