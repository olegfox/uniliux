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
        'frontend/styles/font-awesome.min.css',
        'frontend/styles/slick.css',
        'frontend/scripts/SidebarTransitions/component.css',
        'frontend/styles/social-likes_birman.css',
        'frontend/styles/main.css',
        'frontend/styles/animate.css',
        'frontend/styles/dark-bottom.css'
    ];
    public $js = [
        'frontend/bower_components/modernizr/modernizr.js',
//        'frontend/bower_components/jquery/dist/jquery.min.js',
        'frontend/bower_components/slick-carousel/slick/slick.min.js',
        'frontend/scripts/jquery.event.frame.js',
        'frontend/scripts/jquery.parallax.min.js',
        'frontend/scripts/main.js',
        'frontend/scripts/SidebarTransitions/classie.js',
        'frontend/scripts/SidebarTransitions/sidebarEffects.js',
        'frontend/scripts/wow.min.js',
        'frontend/scripts/social-likes.min.js',
        //'//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
