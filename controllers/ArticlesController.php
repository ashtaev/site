<?php


namespace app\controllers;


use app\models\Pages;
use yii\web\NotFoundHttpException;

class ArticlesController extends AppController
{
    public function actionIndex() {
        $articles = Pages::find()->where(['parent_id' => 3])->all();
        $article  = Pages::find()->where(['id' => 3])->one();

        return $this->render('index', [
            'articles' => $articles,
            'article'  => $article,
        ]);
    }

    public function actionArticle($title) {
        $title = set_title($title);
        $article  = Pages::find()->where(['title' => $title])->one();

        if (!$article) throw new NotFoundHttpException ();

        return $this->render('article', [
            'article' => $article,
        ]);
    }
}