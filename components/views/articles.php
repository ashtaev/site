<?php
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
    <?php /** @var array $articles */
    foreach ($articles as $article): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">

                <?php
                /*
                Html::img(
                    '@web/img/articles/' . urlencode(str_replace(' ', '_', $article['title']) . '.png'),
                    ['alt' => $article['title'], 'class' => 'card-img-top']
                );
                */
                ?>

                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <p class="card-text"><?= BaseStringHelper::truncateWords (preg_replace('#\n#', ' ', strip_tags($article['text'])), 20, '...'); ?></p>
                </div>
                <div class="card-footer bg-white border-0">
                    <?= Html::a('Читать далее', Url::toRoute(['articles/article', 'title' => str_replace(' ', '_', $article['title'])]), ['class' => 'btn btn-info', 'role' => 'button']) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>