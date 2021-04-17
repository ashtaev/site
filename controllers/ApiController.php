<?php


namespace app\controllers;


use app\components\FindUrl;
use app\components\Ip;
use app\components\ServerResponse;

class ApiController extends AppController
{
    public function actionHttpHeaderCheck($url) {
        return $this->asJson((new ServerResponse())->getArray($url));
    }

    public function actionFindWebsiteIpAddress($url) {
        return $this->asJson((new Ip())->getArray($url));
    }

    public function actionFindUrl($url) {
        return $this->asJson((new FindUrl($url))->Run());
    }
}