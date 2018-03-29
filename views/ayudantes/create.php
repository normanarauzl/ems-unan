<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ayudantes */

$this->title = Yii::t('app', 'Create Ayudantes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ayudantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ayudantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
