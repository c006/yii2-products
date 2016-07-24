<?php

namespace c006\products\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class AssetJqueyUi
 * @package c006\products\assets
 */
class AssetJqueyUi extends AssetBundle
{

    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/jquery-ui.css',
    ];

    public $js = [
        'js/jquery-ui.js',
    ];

    public $depends = [];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
