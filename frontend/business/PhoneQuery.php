<?php

namespace frontend\business;

use frontend\models\PhoneQueryForm;
use Yii;

class PhoneQuery extends Base
{

    public function phoneQueryMake(PhoneQueryForm $form): void
    {
        $appCode = Yii::$app->params['baidu_cloud']['phone_address']['AppCode'] ?? '';
        $url = Yii::$app->params['baidu_cloud']['phone_address']['requestUrl'] . '?mobile=' . $form->phone;
        $headers = [
            'X-Bce-Signature' => 'AppCode/' . $appCode,
            'Content-Type' => 'application/json;charset=UTF-8',
        ];
        $response = $this->sendRequest($url, 'POST', [], $headers);
        if (! empty($response['data'])) {
            $address = [
                $response['data']['types'] ?: '未知',
                $response['data']['prov'] ?: '未知',
                $response['data']['city'] ?: '未知',
            ];
            $this->result = implode('-', $address);
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '查询失败，请稍后重试或联系站长。';
        }
    }
}