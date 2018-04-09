<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nuevo Equipo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Id',
//            'IdTipo',
            'Descripcion',
            [
                'attribute' => 'IdTipo',
                'value'=>'idTipo.Descripcion',
            ],
            'Prestado',
            'Marca',
            'Modelo',
            'NoSerie',
             'CodInventario',
             'Color',
//             'Estado',
            [
            'attribute' => 'Estado',
            'value' => function ($model) {
                 return $model->Estado == 1 ? 'Bueno' : 'Malo';
            },
            ],
//             'UbicacionOrigen',
            [
                'attribute' => 'UbicacionOrigen',
                'value'=>'ubicacionOrigen.Descripcion',
            ],
//             'UbicacionActual',
            [
                'attribute' => 'UbicacionOrigen',
                'value'=>'ubicacionOrigen.Descripcion',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
