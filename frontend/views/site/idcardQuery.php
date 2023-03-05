<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\IdcardQueryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '身份证归属地查询';
?>
<div class="site-idcardQuery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一个有效的身份证，查询身份证的归属地。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'idcardQuery-form']); ?>

            <?= $form->field($model, 'idcard') ?>

            <?= $form->field($model, 'address')->textInput(['readonly' => true]); ?>

            <?= $form->field($model, 'sex')->textInput(['readonly' => true]); ?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'idcardQuery-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
