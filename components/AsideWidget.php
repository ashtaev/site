<?php


namespace app\components;


use yii\base\Widget;

class AsideWidget extends Widget
{
    public $articles;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('aside', ['articles' => $this->articles]);
    }
}