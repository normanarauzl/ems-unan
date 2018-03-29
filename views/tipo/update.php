<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tipo',
]) . $model->Id_Tipo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Tipo, 'url' => ['view', 'id' => $model->Id_Tipo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
