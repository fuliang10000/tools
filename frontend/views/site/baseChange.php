<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\BaseChangeForm */
/* @var $changeList \frontend\models\BaseChangeForm::$_changeList */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '进制转换';
?>
<div class="site-baseChange">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>您可以将原始数转换成你指定进制的数</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'baseChange-form']); ?>

            <?= $form->field($model, 'change')->dropDownList($changeList) ?>

            <?= $form->field($model, 'num') ?>

            <?= $form->field($model, 'result') ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'baseChange-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
