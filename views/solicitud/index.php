<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'IdPersona',
            'IdUbicacion',
            'FechaInicio',
            'FechaFin',
            // 'Estado',
            // 'FechaSolicitud',
            // 'EntregadoPor',
            // 'RetiradoPor',
            // 'Observacion1',
            // 'Observacion2',
            // 'Observacion3',
            // 'IdPeriodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
