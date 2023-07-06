<?php

namespace App\components\factory;

use OSS\OssClient;
use Yii;

class AliyunOssClient implements OssClientInterface
{
    private OssClient $ossClient;

    public function __construct()
    {
        $this->ossClient = new OssClient(Yii::$app->params['aliyun_config']['accessKeyId'], Yii::$app->params['aliyun_config']['accessKeySecret'], Yii::$app->params['aliyun_config']['endpoint']);
    }

    public function uploadFile(string $filePath, string $fileName): string
    {
        $this->ossClient->uploadFile(Yii::$app->params['aliyun_config']['bucket'], $fileName, $filePath);
        return Yii::$app->params['aliyun_config']['ossUrl'] . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $fileName);
    }
}
