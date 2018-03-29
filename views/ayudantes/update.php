<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ayudantes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ayudantes',
]) . $model->Id_Ayudante;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ayudantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Ayudante, 'url' => ['view', 'id' => $model->Id_Ayudante]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ayudantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
