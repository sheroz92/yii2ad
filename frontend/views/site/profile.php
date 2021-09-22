<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model ContactForm */

use frontend\models\ContactForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'last_name') ?>

            <?= $form->field($model, 'middle_name') ?>

            <?= $form->field($model, 'about')->textarea() ?>

            <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::class, [
                'language' => 'en',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [
                    'class'=>'form-control'
                ]
            ]) ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_repeat')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
