<?php

namespace frontend\business;

use frontend\models\IdcardQueryForm;
use Yii;

class IdcardQuery extends Base
{

    public function idcardQueryMake(IdcardQueryForm $form): void
    {
        $appCode = Yii::$app->params['baidu_cloud']['idcard_address']['AppCode'] ?? '';
        $url = Yii::$app->params['baidu_cloud']['idcard_address']['requestUrl'] . '?idcard=' . $form->idcard;
        $headers = [
            'X-Bce-Signature' => 'AppCode/' . $appCode,
            'Content-Type' => 'application/json;charset=UTF-8',
        ];
        $response = $this->sendRequest($url, 'GET', [], $headers);
        if (! empty($response['data'])) {
            $this->result = [
                'address' => $response['data']['address'],
                'sex' => $response['data']['sex'],
            ];
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '查询失败，请稍后重试或联系站长。';
        }
    }
}