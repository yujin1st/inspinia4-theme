<?php
/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 */

use yii\bootstrap\Nav;
use yujin1st\inspinia4theme\components\NavBar;

/* @var $this \yii\web\View */

?>

<div class="row border-bottom">

  <?php NavBar::begin([
    'brandLabel' => '',
    'renderInnerContainer' => false,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
      'class' => 'navbar',
      'style' => 'margin-bottom: 0'
    ],
  ]); ?>

  <?= Nav::widget([
    'options' => ['class' => 'navbar-nav '],
    'items' => [
    ],
  ]); ?>

  <?= Nav::widget([
    'options' => ['class' => 'nav navbar-top-links navbar-right'],
    'encodeLabels' => false,
    'items' => [
      [
        'label' => '<i class="fa fa-sign-out"></i>' . Yii::t('app', 'Log out'),
        'url' => ['/user/security/logout'],
      ],
    ],
  ]); ?>
  <?php NavBar::end(); ?>


</div>

