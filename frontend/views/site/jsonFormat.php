<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\JsonFormatForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'json数据格式化';
?>
<div class="site-jsonFormat">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>输入一段json数据，格式化为更易读的格式。</p>

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'jsonFormat-form']); ?>
        <div class="col-lg-6 col-md-12">

            <?= $form->field($model, 'json')->textarea(['rows' => 10]);?>

            <div class="form-group">
                <?= Html::submitButton('格式化', ['class' => 'btn btn-primary btn-lg', 'name' => 'jsonFormat-button']) ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'result')->textarea(['readonly' => true, 'rows' => 10]); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
