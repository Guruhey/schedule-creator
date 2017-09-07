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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/jquery.formstyler.css',
        'css/bootstrap.min.css'
        #'css/site1.css',
    ];
    public $js = [
        'js/jquery.formstyler.min.js',
        'js/schedule_scripts.js',
        'js/drop_menu.js',
        'js/login.js',
        'js/forschedule.js',
        'js/exone.js',
        'js/extwo.js',
        'js/exthree.js',
        'js/ya_koval.js',
        'js/absolute_shit.js',
        'js/adm_anim.js',
        'js/adm_drop.js',
        'js/replacements.js',
        'js/bootstrap.min.js',
        'js/add_schedule.js'

    ];
    public $depends = [
        #'yii\web\YiiAsset',
        #'yii\bootstrap\BootstrapAsset',
    ];
}
