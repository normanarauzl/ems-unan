<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoEquipo */

$this->title = Yii::t('app', 'Create Tipo Equipo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-equipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
