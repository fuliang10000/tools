<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\IpQueryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ip地址归属地查询';
?>
<div class="site-ipQuery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>本地IP：<b style="color: red;"><?= $ip; ?></b></p>
    <p>输入一个有效的ip地址，查询ip地址的归属地。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'ipQuery-form']); ?>

            <?= $form->field($model, 'ip') ?>

            <?= $form->field($model, 'result')->textInput(['readonly' => true]); ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'ipQuery-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
