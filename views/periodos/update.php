<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Periodos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Periodos',
]) . $model->Id_Periodo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periodos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Periodo, 'url' => ['view', 'id' => $model->Id_Periodo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="periodos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
