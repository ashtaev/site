<?php


namespace app\controllers;


use app\components\ToolsWidget;

/** @var array $article */
$this->title = $article['title'];
$this->registerMetaTag(['name'=>'keywords', 'content'=>$article['keywords']]);
$this->registerMetaTag(['name'=>'description', 'content'=>$article['description']]);

$this->params['h1'] = $article['title'];
$this->params['description'] = $article['description'];

$this->params['breadcrumbs'][] = array(
    'label'=> $article['title'],
);

?>

<div class="container mt-5">
    <?=
        /** @var array $tools */
        ToolsWidget::widget([
                'tools' => $tools
        ])
    ?>
</div>