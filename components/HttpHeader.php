<?php


namespace app\components;


class HttpHeader
{
    public function get($url) {

        if ($url == "") {echo "<div class=\"alert alert-danger\">Не может быть пустой строкой</div>"; die;}
        if(!preg_match('/^(http:\/\/|https:\/\/).+/', $url)) {$url = 'http://' . $url;}

        $url = coderurl($url);


        $url = filter_var($url, FILTER_VALIDATE_URL);
        if ($url == "") {echo "Не корректный URL"; die;}


        $array_headers = shell_exec('curl -I ' . $url);

        if ($array_headers == "") {return "<div class=\"alert alert-danger\">Сервер не отвечает</div>";}


        $array_headers = explode("\n", $array_headers);

        $he = trim(array_shift($array_headers)) . "</br>" . PHP_EOL;
        array_pop($array_headers);
        array_pop($array_headers);

        foreach ($array_headers as $value) {
            $value = trim($value);
            $res = explode(": ", $value, 2);
            $he .= "<b>" . $res[0] . ":</b> " . $res[1] . "</br>" . PHP_EOL;
        }

        return "<div class=\"alert alert-info\">" . $he . "</div>";
    }
}