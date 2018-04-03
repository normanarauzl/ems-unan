<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Solicitud',
]) . $model->Id_Solicitud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Solicitud, 'url' => ['view', 'id' => $model->Id_Solicitud]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
