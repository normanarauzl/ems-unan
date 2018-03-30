<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ayudantes */

$this->title = $model->Id_Ayudante;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ayudantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ayudantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->Id_Ayudante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->Id_Ayudante], [
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
//            'Id_Ayudante',
            'Nombre_Ayudante',
            'Estado_Ayudante',
        ],
    ]) ?>

</div>
