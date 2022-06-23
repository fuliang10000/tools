<?php
namespace frontend\controllers;

use frontend\business\BaseChange;
use frontend\business\GrayImage;
use frontend\business\KingHua;
use frontend\business\SportsLottery;
use frontend\business\WelfareLottery;
use frontend\models\BaseChangeForm;
use frontend\models\KingHuaForm;
use frontend\models\SportsLotteryForm;
use frontend\models\UploadImageForm;
use frontend\models\WelfareLotteryForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
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

    public function actionGrayImage()
    {
        $model = new UploadImageForm();
        if (Yii::$app->request->isPost) {
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
}
