<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EquiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Equipos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id_Equipo',
            //'Id_Tipo',
            [
                'attribute' => 'Id_Tipo',
                'value'=>'idTipo.Descripcion',
            ],
            'Prestado',
            'Marca',
            'Modelo',
             'No_Serie',
             'Cod_Inventario',
             'Color',
//             'Estado',
                [
                'attribute' => 'Estado',
                'value' => function ($model) {
                     return $model->Estado == 1 ? 'Bueno' : 'Malo';
                },
                ],
             'Descripcion',
             'Ubicacion_Origen',
             'Ubicacion_Actual',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
