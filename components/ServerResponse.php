<?php


namespace app\components;


class ServerResponse
{

    public function getArray($url)
    {
        while (true) {
            //echo $url; exit;
            $srInterate = $this->getHeaderInterete($url);
            $sr[] = $srInterate;

            if (!isset($srInterate['Headers']['Location'])) {
                break;
            } else {
                $url = trim($srInterate['Headers']['Location']);
            }
        }

        //echo count($sr); exit;

        //print_r($sr); die;

        return $sr;
    }

    public function getHeaderInterete($url) {

        if ($url == "") {
            return [
                'Error' => 'Не корректный URL'
            ];
        }

        if (!preg_match('/^(http:\/\/|https:\/\/).+/', $url)) {
            $url = 'http://' . $url;
        }

        $url = coderurl($url);


        //$url = filter_var($url, FILTER_VALIDATE_URL);

        //echo "----" . $url . "----" . '<br>' . PHP_EOL ;

        if ($url == "") {
            return [
                'Error' => 'Не корректный URL2'
            ];
        }

        //echo $url; exit;

        $array_headers = shell_exec('curl -I ' . $url);

        //echo $array_headers; exit;

        if ($array_headers == "") {
            return [
                'Error' => 'Сервер не отвечает'
            ];
        }

        $array_headers = explode("\n", $array_headers);

        $status_line = array_shift($array_headers);

        $status_line = explode(" ", $status_line);

        $ah['Url'] = array_merge(
            ['value' => $url],
            parse_url($url)
        );

        $ah['StatusLine'] = [
                'HttpVersion' => $status_line[0],
                'StatusCode' => $status_line[1],
                'Description' => $status_line[2],
        ];

        array_pop($array_headers);
        array_pop($array_headers);

        foreach ($array_headers as $value) {
            $res = explode(": ", $value, 2);
            $ah['Headers'][$res[0]] = $res[1];
        }

        return $ah;
    }



    public function getHtml($url) {

        $serverRequestArray = $this->getArray($url);

        $result = "";

        foreach ($serverRequestArray as $serverRequestArrayInterate) {

            if (isset($serverRequestArrayInterate['Error'])) {
                return '<div class="alert alert-danger">' . $serverRequestArray['Error'] . '</div>';
            }

            $he = $serverRequestArrayInterate['StatusLine']['HttpVersion'] . " "
                . $serverRequestArrayInterate['StatusLine']['StatusCode'] . " "
                . $serverRequestArrayInterate['StatusLine']['Description'] . "<br>";

            foreach ($serverRequestArrayInterate['Headers'] as $key => $value) {
                $he .= "<b>" . $key . ":</b> " . $value . "</br>" . PHP_EOL;
            }

            $result .= '<div class="alert alert-info">' . $he . '</div>';
        }

        return $result;
    }

}