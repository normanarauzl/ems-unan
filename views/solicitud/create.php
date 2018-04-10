<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = 'Nueva Solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-create">

    <?= $this->render('_form', [
        'model' => $model, 'persona'=>$persona
    ]) ?>

</div>
