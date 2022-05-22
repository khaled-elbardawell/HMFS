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


//if (!function_exists('CustomAsset')){
//    /**
//     * To Solve Problem Path In Server Live
//     * @param $url
//     * @return string
//     */
//    function CustomAsset($url){
//        return asset(env('LIVE_ASSET_PATH').$url);
//    }
//}
