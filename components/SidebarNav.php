<?php
/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 */

/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 */


namespace yujin1st\inspinia4theme\components;

use yii\base\InvalidConfigException;
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Отличия от родительского класса в том, что передаются по своему обрабатывается dropdown
 *
 * @package yujin1st\inspinia4theme\components
 */
class SidebarNav extends Nav
{
  public $activateParents = true;

  /**
   * @inheritdoc
   * @param array $items
   * @param array $parentItem
   * @return mixed
   */
  protected function renderDropdown($items, $parentItem) {
    return Nav::widget([
      'encodeLabels' => false,
      'options' => [
        'class' => 'nav nav-second-level collapse',
      ],
      'items' => $items
    ]);
  }

  /**
   * Renders a widget's item.
   *
   * @param string|array $item the item to render.
   * @return string the rendering result.
   * @throws InvalidConfigException
   */
  public function renderItem($item) {
    if (is_string($item)) {
      return $item;
    }
    if (!isset($item['label'])) {
      throw new InvalidConfigException("The 'label' option is required.");
    }
    $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
    $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
    if (($iconPos = strpos($label, '</i>')) !== false) {
      $icon = substr($label, 0, $iconPos + 4);
      $label = substr($label, $iconPos + 4, strlen($label));
    } else {
      $icon = '';
    }
    $label = $icon . Html::tag('span', $label, ['class' => 'nav-label']);
    $options = ArrayHelper::getValue($item, 'options', []);
    $items = ArrayHelper::getValue($item, 'items');
    $url = ArrayHelper::getValue($item, 'url', '#');
    $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

    if (isset($item['active'])) {
      $active = ArrayHelper::remove($item, 'active', false);
    } else {
      $active = $this->isItemActive($item);
    }

    if ($items !== null) {
      $label .= ' ' . Html::tag('span', '', ['class' => 'arrow fa fa-angle-down']);
      if (is_array($items)) {
        if ($this->activateItems) {
          $items = $this->isChildActive($items, $active);
        }
        $items = $this->renderDropdown($items, $item);
      }
    }

    if ($this->activateItems && $active) {
      Html::addCssClass($options, 'active');
    }

    return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
  }

}
