<?php

/* @var $content string */

use app\assets\PageAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;

PageAsset::register($this);

rmrevin\yii\fontawesome\CdnFreeAssetBundle::register($this);

$css = <<<CSS
pre {
    padding: 2em !important;
    background: #f8f9fa !important;
    border: none !important;
    margin:2em 0 !important;
}

.prettyprint ol.linenums > li {
    list-style-type: decimal;
}

.container {
    font-family: "Open Sans";
}
CSS;

$this->registerCss($css);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <?= Html::a('BrandName', Url::toRoute(['/']), ['class' => 'navbar-brand']) ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4">
                        <?= Html::a(FAS::icon('tools') . ' Инструменты', Url::toRoute(['/tools']), ['class' => 'nav-link']) ?>
                    </li>
                </ul>
                <?= Html::a('Блог', Url::toRoute(['/articles']), ['class' => 'btn btn-outline-success my-2 my-sm-0']) ?>
            </div>
        </nav>
    </div>
</div>


<!-- Jimbotron -->
<div class="jumbotron jumbotron-fluid bg-info text-white mb-0">
    <div class="container">
        <h1 class="display-4"><?= $this->params['h1']; ?></h1>
        <p class="lead"><?= $this->params['description']; ?></p>
    </div>
</div>
<!-- Jimbotron -->



<?php if (isset($this->params['breadcrumbs'])): ?>
<!-- Breadcrumbs -->
<div class="container-fluid border-bottom bg-light">
    <div class="container">

    <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumb bg-transparent m-0 pl-0', 'style' => ''],
        ]);
    ?>

    </div>
</div>
<!-- Breadcrumbs -->
<?php endif; ?>



<?= $content ?>

<!-- Footer -->
<footer class="bg-info">

    <!-- Copyright -->
    <div class="text-center py-3 text-white">
        © <?= date('Y') ?> Все права защищены
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

<?php