<?php
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
    <?php foreach ($articles as $article): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="/img/articles/<?= set_url($article['title']); ?>.png" alt="<?= $article['title'] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $article['title'] ?></h3>
                    <p class="card-text"><?= BaseStringHelper::truncateWords (preg_replace('#\n#', ' ', strip_tags($article['text'])), 30, '...'); ?></p>
                </div>
                <div class="card-footer bg-white border-0">
                    <?= Html::a('Читать далее', Url::toRoute(['articles/article', 'title' => set_url($article['title'])]), ['class' => 'btn btn-info', 'role' => 'button']) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>