<?php

namespace app\assets;

use yii\web\AssetBundle;

class AuthAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/bootstrap.min.css',
        'libs/font-awesome.min.css',
        'libs/ionicons.min.css',
        'libs/AdminLTE.min.css',
        'libs/blue.css',
    ];

    public $js = [
        'libs/bootstrap.min.js',
        'libs/icheck.min.js',
        'libs/auth.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}