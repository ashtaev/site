<?php

use app\components\AsideWidget;
use yii\helpers\Url;

/** @var array $article */
$this->title = $article['title'];
$this->registerMetaTag(['name'=>'keywords', 'content'=>$article['keywords']]);
$this->registerMetaTag(['name'=>'description', 'content'=>$article['description']]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);

$this->params['h1'] = $article['title'];
$this->params['description'] = $article['description'];

$this->params['breadcrumbs'][] = array(
    'label'=> 'Статьи',
    'url' => Url::toRoute('/articles')
);

$this->params['breadcrumbs'][] = array(
    'label'=> $article['title'],
);

?>
<div class="container-fluid bg-light pt-4">
<div class="container" stjyle="max-width: 900px">
    <div class="row">
        <div class="1col-md-8 border p-5 mb-4 shadow-sm rounded bg-white">
            <?= $article['text']; ?>
        </div>
        <div class="col-md-4 pl-4">
            <!-- div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Поиск</button>
                </div>
            </div -->
            <!-- div class="card">

                <?php echo "" //AsideWidget::widget(['articles' => $articles]) ?>

            </div -->
        </div>
    </div>
</div>
</div>
