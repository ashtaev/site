<?php


namespace app\controllers;


use Yii;
use app\models\HttpHeaderCheck;
use app\models\Pages;
use app\models\FindWebsiteIpAddress;
use app\components\HttpHeader;
use app\components\Ip;

class ToolsController extends AppController
{
    public function actionIndex() {
        $tools   = Pages::find()->where(['parent_id' => 2])->all();
        $article = Pages::find()->where(['id' => 2])->one();

        return $this->render('index', [
            'tools' => $tools,
            'article' => $article,
        ]);
    }

    public function actionHttpHeaderCheck() {
        if (Yii::$app->request->isAjax) {
            return (new HttpHeader())->get($_POST['HttpHeaderCheck']['url']);
        }

        $model = new HttpHeaderCheck();
        $article = Pages::find()->where(['route' => 'http-header-check'])->one();

        return $this->render('http-header-check', [
            'model'   => $model,
            'article' => $article,
        ]);
    }

    public function actionFindWebsiteIpAddress() {

        if (Yii::$app->request->isAjax) {
            return (new Ip())->get($_POST['FindWebsiteIpAddress']['url']);
        }

        $model = new FindWebsiteIpAddress();
        $article = Pages::find()->where(['route' => 'find-website-ip-address'])->one();

        return $this->render('find-website-ip-address', [
            'model'   => $model,
            'article' => $article,
        ]);
    }

    public function actionUrlEncoderDecoder() {
        $article = Pages::find()->where(['route' => 'url-encoder-decoder'])->one();

        return $this->render('url-encoder-decoder', [
            'article' => $article,
        ]);
    }
}