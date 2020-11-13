<?php


namespace app\controllers;


use app\models\Pages;

class SiteController extends AppController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $index    = Pages::find()->where(['id' => [1,2,3]])->all();
        $tools    = Pages::find()->where(['parent_id' => 2])->all();
        $articles = Pages::find()->where(['parent_id' => 3])->all();

        return $this->render('index', [
            'articles' => $articles,
            'tools'    => $tools,
            'index'    => $index,
        ]);
    }
}