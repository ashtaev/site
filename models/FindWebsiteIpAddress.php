<?php


namespace app\models;


use yii\base\Model;

class FindWebsiteIpAddress extends Model
{

    public $url;

    /*    public function attributeLabels()
        {
            return [
                'url' => 'lklk',
            ];
        }*/

    public function rules()
    {
        return [
            //['url', 'required'],
            //['url', 'url']
        ];
    }

}