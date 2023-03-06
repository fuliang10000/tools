<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\DomainQueryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '域名备案信息查询';
?>
<div class="site-recordPutQuery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一个有效的域名，查询域名的备案信息。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'recordPutQuery-form']); ?>

            <?= $form->field($model, 'domain') ?>

            <?= $form->field($model, 'icpCode')->textInput(['readonly' => true]); ?>

            <?= $form->field($model, 'unit')->textInput(['readonly' => true]); ?>

            <?= $form->field($model, 'passTime')->textInput(['readonly' => true]); ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'recordPutQuery-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
