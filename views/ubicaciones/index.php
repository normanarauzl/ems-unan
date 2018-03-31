<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UbicacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ubicaciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ubicaciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Id_Ubicacion',
            'Descripcion',
//            'Estado',
            [
            'attribute' => 'Estado',
            'value' => function ($model) {
                 return $model->Estado == 1 ? 'Activo' : 'Inactivo';
            },
            ],
//            'Clasificacion',
            [
            'attribute' => 'Clasificacion',
            'value' => function ($model) {
                 return $model->Clasificacion == 1 ? 'Oficina' : 
                        $model->Clasificacion == 2 ? 'Mantenimiento' :
                        $model->Clasificacion == 3 ? 'Aulas': 'Salas/Auditorios';
            },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
