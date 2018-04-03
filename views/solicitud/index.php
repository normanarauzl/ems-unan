<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Solicituds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Solicitud'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_Solicitud',
            'Id_Persona',
            'Id_Ubicacion',
            'Fecha_Inicio',
            'Fecha_Fin',
            // 'Hora_Inicio',
            // 'Hora_Fin',
            // 'Estado_Solicitud',
            // 'Fecha_Solicitud',
            // 'Entregado_Por',
            // 'Retirado_Por',
            // 'Observaciones',
            // 'Observaciones_2',
            // 'Observaciones_3',
            // 'Id_Periodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
