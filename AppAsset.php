<?php
/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 */

namespace yujin1st\inspinia4theme;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
  public $sourcePath = '@yujin1st/inspinia4theme/assets';

  public $css = [
    'css/style.css',
    'css/animate.css',
  ];

  public $js = [
    'js/jquery.metisMenu.js',
    'js/jquery.slimscroll.min.js',
    'js/inspinia4.js',
  ];

  public $depends = [
    'yii\bootstrap\BootstrapPluginAsset',
    'kartik\icons\FontAwesomeAsset',
    'yii\web\YiiAsset',
  ];
}
