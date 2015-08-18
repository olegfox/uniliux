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
        'frontend/css/main.css',
    ];
    public $js = [
        'frontend/bower_components/jquery/dist/jquery.js',
        'frontend/bower_components/imagesloaded/imagesloaded.pkgd.min.js',
        'frontend/bower_components/masonry/dist/masonry.pkgd.min.js',
        'frontend/javascripts/main.js',
        'frontend/javascripts/click.menu.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
