<?php

namespace frontend\business;

use frontend\models\IpQueryForm;
use Yii;

class IpQuery extends Base
{

    public function ipQueryMake(IpQueryForm $form): void
    {
        $appCode = Yii::$app->params['baidu_cloud']['ip_address']['AppCode'] ?? '';
        $url = Yii::$app->params['baidu_cloud']['ip_address']['requestUrl'] . '?ip=' . $form->ip;
        $headers = [
            'X-Bce-Signature' => 'AppCode/' . $appCode,
            'Content-Type' => 'application/json;charset=UTF-8',
        ];
        $response = $this->sendRequest($url, 'POST', [], $headers);
        if (! empty($response['data'])) {
            $address = [
                $response['data']['country'] ?: '未知',
                $response['data']['area'] ?: '未知',
                $response['data']['region'] ?: '未知',
                $response['data']['city'] ?: '未知',
            ];
            $this->result = implode('-', $address);
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '查询失败，请稍后重试或联系站长。';
        }
    }
}