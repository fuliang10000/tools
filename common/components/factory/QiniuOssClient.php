<?php

namespace App\components\factory;

use crazyfd\qiniu\Qiniu;
use Yii;

class QiniuOssClient implements OssClientInterface
{
    private Qiniu $ossClient;

    public function __construct()
    {
        $this->ossClient = new Qiniu(Yii::$app->params['qiniu_config']['ak'], Yii::$app->params['qiniu_config']['sk'], Yii::$app->params['qiniu_config']['domain'], Yii::$app->params['qiniu_config']['bucket']);
    }

    public function uploadFile(string $filePath, string $fileName): string
    {
        $this->ossClient->uploadFile($filePath, $fileName);
        return 'http://' . $this->ossClient->getLink($fileName);
    }
}
