<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="进制转换, 彩图转灰图, 金花概率, 彩票机选号码, ip归属地查询, 手机号归属地查询, 身份证归属地查询"/>
    <meta name="description"
          content="完全免费好用的工具盒, 各种进制转换, ip地址归属地查询, 手机号归属地查询, 身份证归属地查询, 彩色头像转灰色头像, 金花各类牌的出牌数出牌概率, 自动生成彩票机选号码, 提高彩票中奖率"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => '开发工具',
            'items' => [
                ['label' => '进制转换', 'url' => ['/site/base-change']],
                ['label' => 'URL生成短链接', 'url' => ['/site/short-link']],
            ],
        ],
        ['label' => '彩图转灰图', 'url' => ['/site/gray-image']],
        ['label' => '金花概率', 'url' => ['/site/king-hua']],
        [
            'label' => '信息查询',
            'items' => [
                ['label' => 'IP地址归属地查询', 'url' => ['/site/ip-query']],
                ['label' => '手机号归属地查询', 'url' => ['/site/phone-query']],
                ['label' => '身份证归属地查询', 'url' => ['/site/idcard-query']],
                ['label' => '域名备案信息', 'url' => ['/site/domain-query']],
            ],
        ],
        [
            'label' => '彩票相关',
            'items' => [
                ['label' => '体彩随机号', 'url' => ['/site/sports-lottery']],
                ['label' => '福彩随机号', 'url' => ['/site/welfare-lottery']],
            ],
        ],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <a class="pull-right" href="https://beian.miit.gov.cn"
           target="_blank">ICP备案号：<?= Yii::$app->params['ICP_CODE']; ?></a>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
