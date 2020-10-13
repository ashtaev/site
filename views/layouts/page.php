<?php

/* @var $content string */

use app\assets\PageAsset;

PageAsset::register($this);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Проверка ответа сервера</h1>

<?= $content ?>

</body>
</html>

<?php