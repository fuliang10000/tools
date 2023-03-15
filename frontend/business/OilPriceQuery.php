<?php

namespace frontend\business;

use frontend\models\OilPriceQueryForm;
use Yii;

class OilPriceQuery extends Base
{

    public function oilPriceQueryMake(OilPriceQueryForm $form): void
    {
        $appId = Yii::$app->params['roll_tool_api']['app_id'] ?? '';
        $appSecret = Yii::$app->params['roll_tool_api']['app_secret'] ?? '';
        $apiUrl = Yii::$app->params['roll_tool_api']['oil_price'] ?? '';
        $url = $apiUrl . '?province=' . urlencode($form->province) . '&app_id=' . $appId . '&app_secret=' . $appSecret;
        $response = $this->sendRequest($url);
        if (! empty($response['data'])) {
            $result = [];
            foreach ($response['data'] as $number => $price) {
                if ($number != 'province') {
                    $key = str_replace('t', '', $number) . '#';
                    $result[$key] = $price . '元';
                }
            }
            $this->result = $result;
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '查询失败，请稍后重试或联系站长。';
        }
    }
}