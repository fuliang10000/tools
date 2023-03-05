<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\UploadImageForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '彩图转灰图';
?>
<style>
    .gray_img {
        max-width: 80%;
        max-height: 80%;
        border: #D6D6D6 1px solid;
    }
</style>
<div class="site-grayImage">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>支持的图片格式：jpg, jpeg, png，图片最大5M</p>
    <p>图片越大生成越慢，请耐心等待...</p>
    <div class="row">
        <div class="col-lg-5">
            <div style="padding: 30px;text-align: center;">
                <img class="gray_img" src="<?= empty($model->result) ? '/images/default.jpg' : $model->result;?>"/>
                <p style="padding-top: 10px;font-size: 30px;">长按图片保存</p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'grayImage-form',
                'enableAjaxValidation' => false,
                'options' => ['enctype' => 'multipart/form-data']
            ]) ?>

            <?= $form->field($model, 'file')->fileInput()->label('') ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'grayImage-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
