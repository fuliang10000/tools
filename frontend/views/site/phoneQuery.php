<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PhoneQueryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '手机号归属地查询';
?>
<div class="site-phoneQuery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一个有效的手机号，查询手机号的归属地。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'phoneQuery-form']); ?>

            <?= $form->field($model, 'phone') ?>

            <?= $form->field($model, 'result')->textInput(['readonly' => true]); ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'phoneQuery-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
