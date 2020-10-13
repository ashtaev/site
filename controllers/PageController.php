<?php


namespace app\controllers;


class PageController extends AppController
{
    public $layout = "page";

    public function actionHttpHeader() {

        //return "Hello";

        return $this->render('http-header');
    }
}