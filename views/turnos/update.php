<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turnos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Turnos',
]) . $model->Id_Turno;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Turno, 'url' => ['view', 'id' => $model->Id_Turno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="turnos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
