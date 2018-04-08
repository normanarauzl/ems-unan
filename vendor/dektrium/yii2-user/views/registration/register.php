<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
    'id' => 'registration-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
]); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Datos Personales</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($persona, 'Nombres')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($persona, 'Apellidos')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($persona, 'Cedula')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($persona, 'Telefono')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Credenciales de Acceso</h3>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'required'=>true]) ?>
            </div>
            <div class="col-md-3">
                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput(['required'=>true]) ?>
                <?php endif ?>
            </div>
        </div>

        <div class="text-center">
            <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<p class="text-center">
    <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
</p>
