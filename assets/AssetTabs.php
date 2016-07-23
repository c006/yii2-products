<?php

namespace c006\products\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class AssetTabs
 * @package c006\products\assets
 */
class AssetTabs extends AssetBundle
{

    public $basePath = '@webroot';

    public $baseUrl  = '@web';

    public $css      = [
        'css/tabs.css',
    ];

    public $js       = [    ];

    public $depends  = [];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
