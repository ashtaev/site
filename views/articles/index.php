<?php

namespace app\controllers;
use app\components\ArticlesWidget;

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
    <?= /** @var arr $articles */
    ArticlesWidget::widget(['articles' => $articles]) ?>
</div>