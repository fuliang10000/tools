<?php

namespace frontend\business;

use crazyfd\qiniu\Qiniu;
use frontend\models\UploadImageForm;
use Yii;

class GrayImage extends Base
{
    public function grayImageMake(UploadImageForm $form): void
    {
        try {

            /*验证是否上传成功*/
            if ($form->file->error > 0) {
                throw new \Exception('上传失败');
            }

            if (!is_uploaded_file($form->file->tempName)) {
                throw new \Exception('上传图片出错');
            }

            if ($form->file->size > (1024 * 1024 * 5)) {
                throw new \Exception("上传大小不能大于5M");
            }

            if (!in_array($form->file->type, ["image/jpeg", "image/png"])) {
                throw new \Exception('只允许上传jpg、jpeg、png格式的图片');
            }

            $imgType = substr($form->file->type, strripos($form->file->type, "/") + 1);
            $grayPath = $this->grayImg($form->file->tempName, $imgType);
            if (!$grayPath) throw new \Exception('生成图片失败');

            $this->result = $grayPath;

        } catch (\Exception $ex) {
            $this->code = 500;
            $this->message = $ex->getMessage();
        }
    }

    private function grayImg($resImg, $imgType = 'jpeg')
    {
        switch ($imgType) {
            case 'png':
                $image = imagecreatefrompng($resImg);
                $func = 'imagejpeg';
                break;
            default:
                $image = imagecreatefromjpeg($resImg);
                $func = 'imagepng';
                break;

        }
        $img_width = ImageSX($image);
        $img_height = ImageSY($image);
        for ($y = 0; $y < $img_height; $y++) {
            for ($x = 0; $x < $img_width; $x++) {
                $gray = (ImageColorAt($image, $x, $y) >> 8) & 0xFF;
                imagesetpixel($image, $x, $y, ImageColorAllocate($image, $gray, $gray, $gray));
            }
        }
        $fileName = 'gray_' . time() . rand(100000, 999999) . '.' . $imgType;
        $filePath = '/uploads/' . date('Ymd') . '/';
        $grayPath = \Yii::getAlias('@webroot') . $filePath;
        if (!is_dir($grayPath)) {
            mkdir($grayPath, 0777, true);
        }
        $grayPath .= $fileName;
        $func($image, $grayPath);
        imagedestroy($image);

        return $this->uploadToQiniu($grayPath, true);
    }

    /**
     * 上传到七牛云
     * @param string $filePath
     * @param bool $deleteSource
     * @param string $dir
     * @return string
     * @throws \Exception
     */
    public function uploadToQiniu(string $filePath, bool $deleteSource = false, string $dir = 'gray-images'): string
    {
        $temp = explode('/', $filePath);
        $fileName = end($temp);
        $qiniu = new Qiniu(\Yii::$app->params['qiniu_config']['ak'], Yii::$app->params['qiniu_config']['sk'], Yii::$app->params['qiniu_config']['domain'], Yii::$app->params['qiniu_config']['bucket']);
        $qiniu->uploadFile($filePath, $dir . '/' . date('Ymd') . '/' . $fileName);
        if ($deleteSource) @unlink($filePath);

        return 'http://' . $qiniu->getLink($dir . '/' . date('Ymd') . '/' . $fileName);
    }
}