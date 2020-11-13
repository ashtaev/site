<?php

namespace app\components;

use yii\base\Widget;

class ArticlesWidget extends Widget
{
    public $articles;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('articles', ['articles' => $this->articles]);
    }
}