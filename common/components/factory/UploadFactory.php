<?php

namespace App\components\factory;

class UploadFactory
{
    public const QINIU = 'qiniu';
    public const ALIYUN = 'aliyun';
    public static function create(string $type): OssClientInterface
    {
        $class = "App\\components\\factory\\" . ucwords(strtolower($type)) . "OssClient";

        return new $class;
    }
}