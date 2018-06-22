<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= yii2fullcalendar\yii2fullcalendar::widget(array(
//        'ajaxEvents' => Url::to(['/timetrack/default/jsoncalendar']),
        'options' => [
            'lang' => 'es',
        ],
        'events'=>$events,
    ));
    ?>

</div>