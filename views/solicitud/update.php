<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = 'Update Solicitud: ' . $model->Id_Solicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Solicitud, 'url' => ['view', 'id' => $model->Id_Solicitud]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
