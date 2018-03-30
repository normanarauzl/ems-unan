<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tipo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Tipo')->dropDownList(ArrayHelper::map(Tipo::find()->select(['Descripcion','Id_Tipo'])->all(), 'Id_Tipo', 'Descripcion'),['class' => 'form-control inline-block'],['prompt'=>'Seleccione el tipo de equipos']); ?>

    <?= $form->field($model, 'Prestado')->textInput() ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_Serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cod_Inventario')->textInput() ?>

    <?= $form->field($model, 'Color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->dropDownList(['1' => 'Bueno', '2' => 'Malo']) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ubicacion_Origen')->textInput() ?>

    <?= $form->field($model, 'Ubicacion_Actual')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
