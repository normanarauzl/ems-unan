<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Personas',
]) . $model->Id_Persona;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Persona, 'url' => ['view', 'id' => $model->Id_Persona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
