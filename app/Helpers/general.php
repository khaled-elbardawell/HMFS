<?php


define('PAGINATE_VALUE',8);



if (!function_exists('CustomAsset')){
    /**
     * To Solve Problem Path In Server Live
     * @param $url
     * @return string
     */
    function CustomAsset($url){
        return asset(env('LIVE_ASSET_PATH').$url);
    }
}


if (!function_exists('TextImage')){
    /**
     * @param $url
     * @return string
     */
    function TextImage($str){
        $words = explode(" ", $str);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= mb_substr($w, 0, 1);
        }

        return  mb_substr( strtoupper($acronym), 0, 3);
    }
}
