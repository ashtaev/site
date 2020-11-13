<?php

/* @var $article array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = $article['title'];
$this->registerMetaTag(['name'=>'keywords', 'content'=>$article['keywords']]);
$this->registerMetaTag(['name'=>'description', 'content'=>$article['description']]);

$this->params['h1'] = $article['title'];
$this->params['description'] = $article['description'];

$this->params['breadcrumbs'][] = array(
    'label'=> $article['title'],
);

$url = Url::to('/tools/' . $article['route']);

$js = <<<JS
    $('#btn').on('click', function() {
    $("#result").html('<div class="alert alert-success"><i class="fa fa-spinner fa-pulse fa-1x fa-fw" style="font-size: 20px"></i> Пожалуйста подождите...</div>');  
        
        $.ajax ({
            url: '$url',
            data: $('#sendUrl').serialize(),
            type: 'POST',
            success: function(res) {
                //console.log(res);
                $("#result").html(res);
            },
            error:  function(xhr, str) {
	            alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    });
JS;

$this->registerJs($js);

?>

<div class="container-fluid bg-light py-4">
    <div class="container bg-white p-5 border text-center">
        <p>Определить IP адрес сайта</p>

        <?php $form = ActiveForm::begin(['options' => ['id' => 'sendUrl', 'action' => 'javascript:void(null);']]); ?>
        <?= $form->field($model, 'url')->textInput(['class' => 'form-control mb-5', 'placeholder' => "Введите адрес сайта"])->label(''); ?>
        <?= Html::Button('Получить HTTP заголовки', ['class' => 'btn btn-success mb-2 mx-auto', 'id' => 'btn'])?>
        <?php ActiveForm::end(); ?>

        <div id="result" class="text-left mt-4"></div>
    </div>
</div>

<div class="container">
    <div class="container my-text pt-4">
        <?= $article['text'] ?>
    </div>
</div>