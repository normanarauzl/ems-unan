<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoEquipo;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdTipo')->textInput() ?>
     <?= $form->field($model, 'IdTipo')->dropDownList(ArrayHelper::map(TipoEquipo::find()->select(['Descripcion','IdTipo'])->all(), 'IdTipo', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el tipo de equipos']); ?>

    <?= $form->field($model, 'Prestado')->textInput() ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoSerie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodInventario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UbicacionOrigen')->textInput() ?>

    <?= $form->field($model, 'UbicacionActual')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
