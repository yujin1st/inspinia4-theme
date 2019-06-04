<?php
/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 *
 */

/* @var $this \yii\web\View */

?>
<?php
$items = [];
?>

<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <?= \yujin1st\inspinia4theme\components\SidebarNav::widget([
      'encodeLabels' => false,
      'options' => [
        'id' => "side-menu",
        'class' => 'nav metismenu',
      ],
      'items' => $items
    ]) ?>
  </div>
</nav>

  



