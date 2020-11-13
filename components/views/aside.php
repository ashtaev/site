<?php
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="card-header bg-white">
    <b>Последние статьи</b>
</div>
<ul class="list-group list-group-flush">
    <?php foreach ($articles as $article): ?>
    <li class="list-group-item">
        <?= Html::a($article['title'], Url::toRoute(["articles/article", 'title' => set_url($article['title'])])) ?>
        <p class="text-muted">
            <?= BaseStringHelper::truncateWords (preg_replace('#\n#', ' ', strip_tags($article['text'])), 10, '...'); ?>
        </p>
    </li>
    <?php endforeach; ?>
</ul>