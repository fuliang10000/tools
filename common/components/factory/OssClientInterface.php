<?php

namespace App\components\factory;

interface OssClientInterface
{
    public function uploadFile(string $filePath, string $fileName): string;
}