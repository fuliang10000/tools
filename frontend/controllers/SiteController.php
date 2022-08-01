<?php

namespace frontend\controllers;

use frontend\business\BaseChange;
use frontend\business\GrayImage;
use frontend\business\IpQuery;
use frontend\business\KingHua;
use frontend\business\PhoneQuery;
use frontend\business\SportsLottery;
use frontend\business\WelfareLottery;
use frontend\models\BaseChangeForm;
use frontend\models\IpQueryForm;
use frontend\models\KingHuaForm;
use frontend\models\PhoneQueryForm;
use frontend\models\SportsLotteryForm;
use frontend\models\UploadImageForm;
use frontend\models\WelfareLotteryForm;
use Yii;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBaseChange()
    {
        $model = new BaseChangeForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $baseChange = new BaseChange();
            $baseChange->baseChangeMake($model);
            if ($baseChange->code !== 200) {
                Yii::$app->session->setFlash('error', $baseChange->message);
            }
            $model->result = $baseChange->result;
        }
        ob_clean();
        return $this->render('baseChange', [
            'model' => $model,
            'changeList' => $model::$_changeList,
        ]);
    }

    public function actionIpQuery()
    {
        $model = new IpQueryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $ipQuery = new IpQuery();
            $ipQuery->ipQueryMake($model);
            if ($ipQuery->code !== 200) {
                Yii::$app->session->setFlash('error', $ipQuery->message);
            }
            $model->result = $ipQuery->result;
        }
        ob_clean();
        return $this->render('ipQuery', [
            'model' => $model,
        ]);
    }

    public function actionPhoneQuery()
    {
        $model = new PhoneQueryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $phoneQuery = new PhoneQuery();
            $phoneQuery->phoneQueryMake($model);
            if ($phoneQuery->code !== 200) {
                Yii::$app->session->setFlash('error', $phoneQuery->message);
            }
            $model->result = $phoneQuery->result;
        }
        ob_clean();
        return $this->render('phoneQuery', [
            'model' => $model,
        ]);
    }

    public function actionGrayImage()
    {
        $model = new UploadImageForm();
        if (Yii::$app->request->isPost) {
            set_time_limit(0);
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $grayImage = new GrayImage();
                $grayImage->grayImageMake($model);
                if ($grayImage->code !== 200) {
                    Yii::$app->session->setFlash('error', $grayImage->message);
                }
                $model->result = $grayImage->result;
            } else {
                Yii::$app->session->setFlash('error', '图片有误，请重新选择并上传');
            }
        }
        ob_clean();
        return $this->render('grayImage', [
            'model' => $model,
        ]);
    }

    public function actionKingHua()
    {
        $model = new KingHuaForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $kingHua = new KingHua();
            $kingHua->kingHuaMake($model);
            if ($kingHua->code !== 200) {
                Yii::$app->session->setFlash('error', $kingHua->message);
            }
            $model->result = $kingHua->result;
        }
        ob_clean();
        return $this->render('kingHua', [
            'model' => $model,
        ]);
    }

    public function actionSportsLottery()
    {
        $model = new SportsLotteryForm();
        if (Yii::$app->request->isPost) {
            $sportsLottery = new SportsLottery();
            $sportsLottery->sportsLotteryMake();
            if ($sportsLottery->code !== 200) {
                Yii::$app->session->setFlash('error', $sportsLottery->message);
            }
            $model->result = $sportsLottery->result;
        }
        ob_clean();
        return $this->render('sportsLottery', [
            'model' => $model,
        ]);
    }

    public function actionWelfareLottery()
    {
        $model = new WelfareLotteryForm();
        if (Yii::$app->request->isPost) {
            $welfareLottery = new WelfareLottery();
            $welfareLottery->welfareLotteryMake();
            if ($welfareLottery->code !== 200) {
                Yii::$app->session->setFlash('error', $welfareLottery->message);
            }
            $model->result = $welfareLottery->result;
        }
        ob_clean();
        return $this->render('welfareLottery', [
            'model' => $model,
        ]);
    }

    public function actionUpload()
    {
        if (Yii::$app->request->isPost) {
            $fileName = Yii::$app->request->post('filename');
            $lastOne = Yii::$app->request->post('lastone', 0);
            $blobName = Yii::$app->request->post('blobname', 0);
            $dir = Yii::getAlias('@webroot') . '/uploads/tmp/' . md5($fileName);
            file_exists($dir) or mkdir($dir, 0777, true);

            $path = $dir . '/' . $blobName;
            $file = UploadedFile::getInstance(Yii::$container->get(UploadImageForm::class), 'file');
            move_uploaded_file($file->tempName, $path);

            if ($lastOne) {
                $count = $lastOne;
                $filePath = Yii::getAlias('@webroot') . '/uploads/' . date('Ymd');
                file_exists($filePath) or mkdir($filePath, 0777, true);
                $fp = fopen($filePath . '/' . $fileName, "abw");
                for ($i = 0; $i <= $count; $i++) {
                    $handle = fopen($dir . "/" . $i, "rb");
                    fwrite($fp, fread($handle, filesize($dir . "/" . $i)));
                    fclose($handle);
                }
                fclose($fp);
            }

            return json_encode(['code' => 0, 'msg' => 'success']);
        }
        return $this->renderPartial('upload');
    }
}
