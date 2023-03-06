<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SportsLotteryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '体彩开奖查询';
?>
<style>
    .badge {
        background-color: #337ab7;
    }
    .read {
        background-color: #a94442;
    }
    .font-weight-bold {
        font-weight:900;
    }
</style>
<div class="site-sportsLottery">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <h1><?= Html::encode($this->title) ?></h1>
            <ul class="list-group">
                <li class="list-group-item">
                    排列三<span class="font-weight-bold">（第23023期）</span>开奖时间：2023-03-02 21:15:00
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listThree']) as $item):?>
                        <span class="badge read"><?= $item ?></span>
                    <?php endforeach;?>
                    <span class="font-weight-bold">开奖结果</span>
                </li>
                <li class="list-group-item">
                    排列五<span class="font-weight-bold">（第23023期）</span>开奖时间：2023-03-02 21:15:00
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listFive']) as $item):?>
                        <span class="badge read"><?= $item ?></span>
                    <?php endforeach;?>
                    <span class="font-weight-bold">开奖结果</span>
                </li>
                <li class="list-group-item">
                    七星彩<span class="font-weight-bold">（第23023期）</span>开奖时间：2023-03-02 21:15:00
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['sevenStar']) as $key => $item):?>
                        <span class="badge <?php if ($key != 0):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    <span class="font-weight-bold">开奖结果</span>
                </li>
                <li class="list-group-item">
                    超级大乐透<span class="font-weight-bold">（第23023期）</span>开奖时间：2023-03-02 21:15:00
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['bigHappy']) as $key => $item):?>
                        <span class="badge <?php if (!in_array($key, [0, 1])):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    <span class="font-weight-bold">开奖结果</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-12">
            <h1>生成随机号</h1>
            <?php $form = ActiveForm::begin(['id' => 'sportsLottery-form']); ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listThree']) as $item):?>
                        <span class="badge read"><?= $item ?></span>
                    <?php endforeach;?>
                    排列三
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listFive']) as $item):?>
                        <span class="badge read"><?= $item ?></span>
                    <?php endforeach;?>
                    排列五
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['sevenStar']) as $key => $item):?>
                        <span class="badge <?php if ($key != 0):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    七星彩
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['bigHappy']) as $key => $item):?>
                        <span class="badge <?php if (!in_array($key, [0, 1])):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    超级大乐透
                </li>
            </ul>
            <div class="form-group">
                <?= Html::submitButton('点击生成', ['class' => 'btn btn-primary btn-lg', 'name' => 'sportsLottery-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
