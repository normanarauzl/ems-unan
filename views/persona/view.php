<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Registro Completado con Éxito';
?>
<div class="persona-view">

    <div class="alert alert-success">
        El administrador del sitio se pondrá en contacto con usted para confirmar sus credenciales
    </div>
    <div class="text-center">
        <?= Html::a('Regresar al Inicio', ['/site/index'], ['class'=>'btn btn-primary']) ?>
    </div>
</div>
