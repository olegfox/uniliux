<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'frontend/styles/slick.css',
        'frontend/styles/main.css'
    ];
    public $js = [
        'frontend/bower_components/modernizr/modernizr.js',
        'frontend/bower_components/jquery/dist/jquery.min.js',
        'frontend/bower_components/slick-carousel/slick/slick.min.js',
        'frontend/scripts/pace.min.js',
        'frontend/scripts/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
