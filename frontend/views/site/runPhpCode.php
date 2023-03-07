<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\runPhpCodeForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '运行php代码';
?>
<div class="site-runPhpCode">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一段php代码，点击运行查看运行结果。</p>

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'runPhpCode-form']); ?>
        <div class="col-lg-6 col-md-12">

            <?= $form->field($model, 'code')->textarea(['rows' => 10]);?>

            <div class="form-group">
                <?= Html::submitButton('运行', ['class' => 'btn btn-primary btn-lg', 'name' => 'runPhpCode-button']) ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'result')->textarea(['readonly' => true, 'rows' => 10]); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
