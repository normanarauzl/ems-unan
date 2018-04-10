<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
$this->title = 'Detalle de registro ';
?>

<div class="persona-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nombres',
            'Apellidos',
            'Cedula',
            'Telefono',
        ],
    ]) ?>
    <div class="row">
        <div class="col-md-2">
            <div class="alert alert-success"><?= $model->idTipo->Descripcion?></div>
        </div>
    </div>
</div>
