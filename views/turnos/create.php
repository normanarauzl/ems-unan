<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Turnos */

$this->title = Yii::t('app', 'Create Turnos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turnos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
