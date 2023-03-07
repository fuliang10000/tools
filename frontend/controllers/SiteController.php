<?php

namespace frontend\controllers;

use frontend\business\BaseChange;
use frontend\business\DomainQuery;
use frontend\business\GrayImage;
use frontend\business\IdcardQuery;
use frontend\business\IpQuery;
use frontend\business\KingHua;
use frontend\business\PhoneQuery;
use frontend\business\ShortLink;
use frontend\business\SportsLottery;
use frontend\business\WelfareLottery;
use frontend\models\BaseChangeForm;
use frontend\models\IdcardQueryForm;
use frontend\models\IpQueryForm;
use frontend\models\KingHuaForm;
use frontend\models\PhoneQueryForm;
use frontend\models\DomainQueryForm;
use frontend\models\RunPhpCodeForm;
use frontend\models\ShortLinkForm;
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

    public function actionPhpinfo()
    {
        echo phpinfo();
    }

    public function actionBaseChange(): string
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
        return $this->render('baseChange', [
            'model' => $model,
            'changeList' => $model::$_changeList,
        ]);
    }

    public function actionIpQuery(): string
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
        $ip = getclientip();
        return $this->render('ipQuery', [
            'model' => $model,
            'ip' => $ip,
        ]);
    }

    public function actionPhoneQuery(): string
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
        return $this->render('phoneQuery', [
            'model' => $model,
        ]);
    }

    public function actionIdcardQuery(): string
    {
        $model = new IdcardQueryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $idcardQuery = new IdcardQuery();
            $idcardQuery->idcardQueryMake($model);
            if ($idcardQuery->code !== 200) {
                Yii::$app->session->setFlash('error', $idcardQuery->message);
            } else {
                $model->address = $idcardQuery->result['address'];
                $model->sex = $idcardQuery->result['sex'];
            }
        }
        return $this->render('idcardQuery', [
            'model' => $model,
        ]);
    }

    public function actionGrayImage(): string
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
        return $this->render('grayImage', [
            'model' => $model,
        ]);
    }

    public function actionKingHua(): string
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
        return $this->render('kingHua', [
            'model' => $model,
        ]);
    }

    public function actionSportsLottery(): string
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
        return $this->render('sportsLottery', [
            'model' => $model,
        ]);
    }

    public function actionWelfareLottery(): string
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
        return $this->render('welfareLottery', [
            'model' => $model,
        ]);
    }

    public function actionUpload(): string
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

    public function actionDomainQuery(): string
    {
        $model = new DomainQueryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $domainQuery = new DomainQuery();
            $domainQuery->domainQueryMake($model);
            if ($domainQuery->code !== 200) {
                Yii::$app->session->setFlash('error', $domainQuery->message);
            } else {
                $model->unit = $domainQuery->result['unit'];
                $model->icpCode = $domainQuery->result['icpCode'];
                $model->passTime = $domainQuery->result['passTime'];
            }
        }
        return $this->render('domainQuery', [
            'model' => $model,
        ]);
    }

    public function actionShortLink(): string
    {
        $model = new ShortLinkForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $shortLink = new ShortLink();
            $shortLink->shortLinkMake($model);
            if ($shortLink->code !== 200) {
                Yii::$app->session->setFlash('error', $shortLink->message);
            }
            $model->result = $shortLink->result;
        }
        return $this->render('shortLink', [
            'model' => $model,
        ]);
    }

    public function actionRunPhpCode(): string
    {
        $model = new RunPhpCodeForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $filePath = Yii::getAlias('@webroot') . '/php_code/test.php';
            $phpCode = '<?php' . PHP_EOL . $model->code;
            file_put_contents($filePath, $phpCode);
            $result = shell_exec('php ' . $filePath);
            if ($result === NULL) {
                Yii::$app->session->setFlash('error', '源代码语法有误，请检查后重试。');
            }
            $model->result = $result ?? '';
        }
        return $this->render('runPhpCode', [
            'model' => $model,
        ]);
    }
}
