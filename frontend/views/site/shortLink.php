<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ShortLinkForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'URL生成短链接';
?>
<div class="site-shortLink">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一个完整的URL，生成URL短链接。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'shortLink-form']); ?>

            <?= $form->field($model, 'url') ?>

            <?= $form->field($model, 'result')->textInput(['readonly' => true]); ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'shortLink-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
