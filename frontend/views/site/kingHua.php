<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\KingHuaForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '金花概率';
?>
<div class="site-kingHua">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>根据人数和把数，计算各类牌的出牌数</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'kingHua-form']); ?>

            <?= $form->field($model, 'people') ?>

            <?= $form->field($model, 'ba') ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['baozi'] ?? 0 ?></span>
                    豹子
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['shunjin'] ?? 0 ?></span>
                    顺金
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['jinhua'] ?? 0 ?></span>
                    金花
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['shunzi'] ?? 0 ?></span>
                    顺子
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['duizi'] ?? 0 ?></span>
                    对子
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= $model->result['shanpai'] ?? 0 ?></span>
                    散牌
                </li>
            </ul>
            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'kingHua-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
