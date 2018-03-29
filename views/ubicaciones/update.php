<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicaciones */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ubicaciones',
]) . $model->Id_Ubicacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ubicaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Ubicacion, 'url' => ['view', 'id' => $model->Id_Ubicacion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ubicaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
