<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ClasificacionUbicacion;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Activa', '2' => 'Inactiva']) ?>

    <?= $form->field($model, 'IdClasificacionUbicacion')->dropDownList(ArrayHelper::map(ClasificacionUbicacion::find()->select(['Descripcion','Id'])->all(), 'Id', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione la Categoria']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
