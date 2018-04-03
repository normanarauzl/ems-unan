<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = $model->Id_Solicitud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Id_Solicitud], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Id_Solicitud], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_Solicitud',
            'Id_Persona',
            'Id_Ubicacion',
            'Fecha_Inicio',
            'Fecha_Fin',
            'Hora_Inicio',
            'Hora_Fin',
            'Estado_Solicitud',
            'Fecha_Solicitud',
            'Entregado_Por',
            'Retirado_Por',
            'Observaciones',
            'Observaciones_2',
            'Observaciones_3',
            'Id_Periodo',
        ],
    ]) ?>

</div>
