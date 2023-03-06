<?php

namespace frontend\business;

use frontend\models\DomainQueryForm;
use Yii;

class DomainQuery extends Base
{

    public function domainQueryMake(DomainQueryForm $form): void
    {
        $appId = Yii::$app->params['roll_tool_api']['app_id'] ?? '';
        $appSecret = Yii::$app->params['roll_tool_api']['app_secret'] ?? '';
        $apiUrl = Yii::$app->params['roll_tool_api']['beian_url'] ?? '';
        $url = $apiUrl . '?domain=' . base64_encode($form->domain) . '&app_id=' . $appId . '&app_secret=' . $appSecret;
        $response = $this->sendRequest($url);
        if (! empty($response['data'])) {
            $this->result = [
                'unit' => $response['data']['unit'],
                'icpCode' => $response['data']['icpCode'],
                'passTime' => $response['data']['passTime'],
            ];
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '查询失败，请检查域名是否正确。';
        }
    }
}