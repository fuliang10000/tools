<?php

namespace frontend\business;

use frontend\models\IdcardQueryForm;
use Yii;

class IdcardQuery extends Base
{

    public function idcardQueryMake(IdcardQueryForm $form): void
    {
        $appId = Yii::$app->params['roll_tool_api']['app_id'] ?? '';
        $appSecret = Yii::$app->params['roll_tool_api']['app_secret'] ?? '';
        $apiUrl = Yii::$app->params['roll_tool_api']['idcard_address'] ?? '';
        $url = $apiUrl . '?idcard=' . $form->idcard . '&app_id=' . $appId . '&app_secret=' . $appSecret;
        $response = $this->sendRequest($url);
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