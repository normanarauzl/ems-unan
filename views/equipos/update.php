<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Equipos',
]) . $model->Id_Equipo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Equipo, 'url' => ['view', 'id' => $model->Id_Equipo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
