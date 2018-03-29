<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Periodos */

$this->title = Yii::t('app', 'Create Periodos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periodos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
