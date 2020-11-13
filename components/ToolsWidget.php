<?php

namespace app\components;

use yii\base\Widget;

class ToolsWidget extends Widget
{
    public $tools;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('tools', ['tools' => $this->tools]);
    }
}