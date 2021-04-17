<?php

/* @var $article array */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $article['title'];
$this->registerMetaTag(['name'=>'keywords', 'content'=>$article['keywords']]);
$this->registerMetaTag(['name'=>'description', 'content'=>$article['description']]);

$this->params['h1'] = $article['title'];
$this->params['description'] = $article['description'];

$this->params['breadcrumbs'][] = array(
    'label'=> 'Инструменты',
    'url' => Url::toRoute('/tools')
);

$this->params['breadcrumbs'][] = array(
    'label'=> $article['title'],
);

$js = <<< JS
    $('.btn').click(function() {
        let from = $('#from').val();
        let res;
        try {
            res = decodeURIComponent(from);
            if (res === from) res = encodeURIComponent(from);
        } catch(e) {
            try {
                res = decodeURI(from);
                if (res === from) res = encodeURIComponent(from);
            } catch (e) {
                res = encodeURIComponent(from);
            }
        }

        $('#to').val(res);
    });
JS;

$this->registerJs($js);

?>

<div class="container-fluid bg-light py-4 ">
    <div class="container bg-white p-5 border">
        <div class="row">
            <div class="col-md-6">
                <textarea id="from" class="form-control" rows="8" placeholder="Введите текст который вы хотите кодировать или декодировать" aria-label="Введите текст который вы хотите кодировать или декодировать"></textarea>
            </div>
            <div class="col-md-6">
                <textarea id="to" class="form-control bg-white" rows="8" readonly="readonly" placeholder="Вы увидите результат здесь" aria-label="Вы увидите результат здесь"></textarea>
            </div>
        </div>
        <?= Html::Button('Кодировать / Декодировать', ['class' => 'btn btn-success mt-4', 'id' => 'btn'])?>

    </div>
</div>

<div class="container">
    <div class="container my-text pt-4">
        <?= $article['text'] ?>
    </div>
</div>