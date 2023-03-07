<?php

namespace frontend\business;

use frontend\models\ShortLinkForm;
use Yii;

class ShortLink extends Base
{

    public function shortLinkMake(ShortLinkForm $form): void
    {
        $appId = Yii::$app->params['roll_tool_api']['app_id'] ?? '';
        $appSecret = Yii::$app->params['roll_tool_api']['app_secret'] ?? '';
        $apiUrl = Yii::$app->params['roll_tool_api']['short_link'] ?? '';
        $url = $apiUrl . '?url=' . base64_encode($form->url) . '&app_id=' . $appId . '&app_secret=' . $appSecret;
        $response = $this->sendRequest($url);
        if (! empty($response['data']['shortUrl'])) {
            $this->result = $response['data']['shortUrl'];
        } else {
            $this->code = 500;
            $this->message = $response['msg'] ?: '生成失败，请输入一个有效的url地址。';
        }
    }
}