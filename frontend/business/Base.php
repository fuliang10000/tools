<?php
namespace frontend\business;

use yii\httpclient\Client;
use Yii;
class Base
{
    public $code = 200;
    public $message = '成功';
    public $result;

    /**
     * 发送http请求
     * @param string $url 请求地址
     * @param string $method 请求方式
     * @param array $data 请求参数
     * @param array $header 请求header设置
     * @return array
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     * @throws \yii\httpclient\Exception
     */
    public function sendRequest(string $url, string $method = 'GET', array $data = [], array $header = []): array
    {
        $httpClient = Yii::$container->get(Client::class);
        $response = $httpClient->createRequest()
            ->setMethod($method)
            ->setUrl($url)
            ->setData($data)
            ->setHeaders($header)
            ->setFormat(Client::FORMAT_JSON)
            ->send();

        return $response->isOk ? $response->data : [];
    }
}