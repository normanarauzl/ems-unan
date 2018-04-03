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

    <h1><?= Html::encode($this->title) ?></h1>
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
            'FechaInicio',
            'FechaFin',
            'Solicitante',
            'Ubicacion',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update}',
                'buttons' =>[

                    'view'=> function ($url,$model) {
                        $url = 'view/?id='.$model->Id;
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            $url);
                    },
                    'update'=> function ($url,$model) {
                        $url = 'update/?id='.$model->Id;
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url);
                    },
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->Id], [
                            'class' => '',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar este registro?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
