<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SportsLotteryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '体彩随机号';
?>
<style>
    .badge {
        background-color: #337ab7;
    }
    .read {
        background-color: #a94442;
    }
</style>
<div class="site-sportsLottery">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>机打号从来没中过？到此生成随机号，祝君早日财务自由</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'sportsLottery-form']); ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listThree']) as $item):?>
                        <span class="badge"><?= $item ?></span>
                    <?php endforeach;?>
                    排列三
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['listFive']) as $item):?>
                        <span class="badge"><?= $item ?></span>
                    <?php endforeach;?>
                    排列五
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['sevenStar']) as $key => $item):?>
                        <span class="badge <?php if ($key == 0):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    七星彩
                </li>
                <li class="list-group-item">
                    <?php foreach (array_reverse($model->result['bigHappy']) as $key => $item):?>
                        <span class="badge <?php if (in_array($key, [0, 1])):?>read<?php endif;?>"><?= $item ?></span>
                    <?php endforeach;?>
                    超级大乐透
                </li>
            </ul>
            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-lg', 'name' => 'sportsLottery-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
