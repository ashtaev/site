<?php
use app\components\ArticlesWidget;
use app\components\ToolsWidget;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $index[0]['title'];
$this->registerMetaTag(['name'=>'description', 'content'=>$index[0]['description']]);
$this->registerMetaTag(['name'=>'keywords', 'content'=>$index[0]['keywords']]);

$this->params['h1'] = $index[0]['title'];
$this->params['description'] = $index[0]['description'];

//$result = preg_replace('/[^ a-zа-я\d.]/ui', '', $string );

?>

<div class="container-fluid bg-light p-3 pb-5">
    <div class="container mb-5 text-center">
        <h2 class="mt-5 mb-3"><?= $index[1]['title'] ?></h2>
        <p class="text-muted">
            <?= $index[1]['description'] ?>
        </p>
    </div>

    <div class="container">
        <?= ToolsWidget::widget(['tools' => $tools]) ?>
    </div>

    <div class="container text-center">
        <?= Html::a(' Все инструменты', Url::toRoute(['/tools']), ['class' => 'btn btn-outline-success btn-lg']) ?>
    </div>
</div>

<div class="container-fluid bg-white p-3 pb-5">
    <div class="container mb-5 text-center">
        <h2 class="mt-5 mb-3"><?= $index[2]['title'] ?></h2>
        <p class="text-muted">
            <?= $index[2]['title'] ?>
        </p>
    </div>

    <div class="container">
        <?= ArticlesWidget::widget(['articles' => $articles]) ?>
    </div>

    <div class="container text-center">

        <?= Html::a(' Больше статей', Url::toRoute(['/articles']), ['class' => 'btn btn-outline-success btn-lg']) ?>
    </div>
</div>