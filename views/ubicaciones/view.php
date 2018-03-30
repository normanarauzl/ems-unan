<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicaciones */

$this->title = $model->Id_Ubicacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ubicaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->Id_Ubicacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->Id_Ubicacion], [
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
//            'Id_Ubicacion',
            'Descripcion',
//            'Estado',
            [
             'attribute' => 'Estado',
             'value' => 1 ? 'Activo' : 'Inactivo',
            ],
            'Clasificacion',
        ],
    ]) ?>

</div>
