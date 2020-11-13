<?php

use app\components\AsideWidget;

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
<div class="container-fluid bg-light pt-4">
<div class="container">
    <div class="row">
        <div class="col-md-8 border p-5 shadow-sm rounded bg-white">
            <img class="img-fluid mb-4" src="/img/articles/<?= set_url($article['title']); ?>.png" alt="<?= $article['title'] ?>">
            <?= $article['text']; ?>
        </div>
        <div class="col-md-4 pl-4">
            <!-- div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Поиск</button>
                </div>
            </div -->
            <div class="card">

                <?= AsideWidget::widget(['articles' => $articles]) ?>

            </div>
        </div>
    </div>
</div>
</div>
