<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mantenimiento */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Mantenimiento',
]) . $model->Id_Mantenimiento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mantenimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Mantenimiento, 'url' => ['view', 'id' => $model->Id_Mantenimiento]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mantenimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
