<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\OilPriceQueryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '今日油价查询';
?>
<style>
    .badge {
        background-color: #337ab7;
    }
</style>
<div class="site-oilPriceQuery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>选择省份，查询指定省份今日油价情况。</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'oilPriceQuery-form']); ?>

            <?= $form->field($model, 'province')->dropDownList($model::$_provinces) ?>

            <ul class="list-group">
                <?php foreach ($model->result as $number => $price):?>
                    <li class="list-group-item">
                        <span class="badge"><?= $price; ?></span><?= $number; ?>
                    </li>
                <?php endforeach;?>
            </ul>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'oilPriceQuery-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
