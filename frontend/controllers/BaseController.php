<?php
namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    const WITHIN_TIME = 60;//时间，单位：秒
    const MAX_REQUEST_LIMIT = 10; //最大请求次数
    const CACHE_PREFIX = 'tools:request_count:';

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        // 限流
        $cacheKey = self::CACHE_PREFIX . md5(getclientip());
        $redisClient = Yii::$app->redis;
        if ($redisClient->exists($cacheKey)) {
            $count = $redisClient->get($cacheKey);
            if ($count >= self::MAX_REQUEST_LIMIT) {
                exit('<h2>您的请求太过频繁，请稍后再试！</h2>');
            }
            $redisClient->incr($cacheKey);
        } else {
            $redisClient->set($cacheKey, 1);
            $redisClient->expire($cacheKey, self::WITHIN_TIME);
        }
        return true;
    }
}