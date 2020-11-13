<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
   <?php foreach ($tools as $tool): ?>
        <div class="col-md-4">
            <div class="card border-0 bg-transparent h-100 text-center">
                <img src="/img/tools/<?= set_url(preg_replace("/[\/]/", "", $tool['title'])); ?>.svg" width="20%" class="mx-auto" alt="<?= $tool['title'] ?>">
                <div class="card-body">
                    <?= Html::a("<h3>$tool[title]</h3>", Url::to('tools/' . $tool['route']) , ['class' => 'card-title text-info']) ?>
                    <p><?= $tool['description'] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>