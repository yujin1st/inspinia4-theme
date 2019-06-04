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
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/**
 * Отключение добавления класса к списку по умолчанию
 *
 * @package yujin1st\inspinia4theme\components
 */
class SidebarDropdown extends Dropdown
{
  public $addDefaultClass = true;

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();
    Html::removeCssClass($this->options, 'dropdown-menu');
    Html::addCssClass($this->options, 'submenu');
  }

  /**
   * Renders menu items.
   * Переопределено для определения дополнительных классов
   *
   * @inheritdoc
   * @param array $items the menu items to be rendered
   * @param array $options the container HTML attributes
   * @return string the rendering result.
   * @throws InvalidConfigException if the label option is not specified in one of the items.
   */
  protected function renderItems($items, $options = []) {
    $lines = [];
    foreach ($items as $i => $item) {
      if (isset($item['visible']) && !$item['visible']) {
        unset($items[$i]);
        continue;
      }
      if (is_string($item)) {
        $lines[] = $item;
        continue;
      }
      if (!array_key_exists('label', $item)) {
        throw new InvalidConfigException("The 'label' option is required.");
      }
      $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
      $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
      $itemOptions = ArrayHelper::getValue($item, 'options', []);
      $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
      $linkOptions['tabindex'] = '-1';
      $url = array_key_exists('url', $item) ? $item['url'] : null;
      if (empty($item['items'])) {
        if ($url === null) {
          $content = $label;
          Html::addCssClass($itemOptions, 'dropdown-header');
        } else {
          $content = Html::a($label, $url, $linkOptions);
        }
      } else {
        Html::addCssClass($linkOptions, 'dropdown-toggle');
        $label .= ' ' . Html::tag('b', '', ['class' => 'arrow fa fa-angle-down']);
        $submenuOptions = $options;
        unset($submenuOptions['id']);
        $content = Html::a($label, $url === null ? '#' : $url, $linkOptions)
          . $this->renderItems($item['items'], $submenuOptions);
        Html::addCssClass($itemOptions, 'dropdown-submenu');
      }

      $lines[] = Html::tag('li', $content, $itemOptions);
    }

    return Html::tag('ul', implode("\n", $lines), $options);
  }
}
