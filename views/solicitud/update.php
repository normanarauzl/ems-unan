<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

<<<<<<< HEAD
$this->title = 'Update Solicitud: ' . $model->Id_Solicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Solicitud, 'url' => ['view', 'id' => $model->Id_Solicitud]];
$this->params['breadcrumbs'][] = 'Update';
=======
$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Solicitud',
]) . $model->Id_Solicitud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Solicitud, 'url' => ['view', 'id' => $model->Id_Solicitud]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
>>>>>>> b1d1dce19a906f081017abfbbb3b1a1099c565a9
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
