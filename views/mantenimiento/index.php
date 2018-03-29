<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MantenimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mantenimientos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mantenimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Mantenimiento'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Id_Mantenimiento',
//            'Id_Ubicacion',
            [
                'attribute' => 'Id_Ubicacion',
                'value'=>'idUbicacion.Descripcion',
            ],
            'Fecha',
            'Observacion',
//            'Id_Ayudante',
            [
                'attribute' => 'Id_Ayudante',
                'value'=>'idAyudante.Descripcion',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
