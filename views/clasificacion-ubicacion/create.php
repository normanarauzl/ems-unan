<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClasificacionUbicacion */

$this->title = Yii::t('app', 'Create Clasificacion Ubicacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacion Ubicacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion-ubicacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
