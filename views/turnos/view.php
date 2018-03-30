<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Turnos */

$this->title = $model->Id_Turno;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turnos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->Id_Turno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->Id_Turno], [
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
//            'Id_Turno',
            'Descripcion',
//            'Estado',
            [
             'attribute' => 'Estado',
             'value' => 1 ? 'Activo' : 'Inactivo',
            ],
        ],
    ]) ?>

</div>
