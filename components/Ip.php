<?php


namespace app\components;


class Ip
{
    public function get($url) {

        //$url = $_POST['Ip']['url'];

        if ($url == "") {echo "<div class=\"alert alert-danger\">Не может быть пустой строкой</div>"; die;}
        if(!preg_match('/^(http:\/\/|https:\/\/).+/', $url)) {$url = 'http://' . $url;}

        /*            $url = urlencode($url);

                    echo $url; die;*/

        $url = coderurl($url);


        $url = filter_var($url, FILTER_VALIDATE_URL);
        if ($url == "") {echo "Не корректный URL"; die;}


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        //curl_setopt($ch, CURLOPT_STDERR, $wrapper);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $ip = curl_getinfo($ch,CURLINFO_PRIMARY_IP);
        curl_close($ch);

        return $ip;

    }

}