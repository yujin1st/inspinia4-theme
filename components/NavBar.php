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

/**
 *
 * Верхняя навигационная панель
 *
 * Переопределена ради использования возможностей темы:
 * * кнопка sidebar-toggle в левой панели
 *
 * @package yujin1st\inspinia4theme\components
 */
class NavBar extends \yii\bootstrap4\Nav
{

  /**
   * Рисуем кнопки отображения пунктов меню верхней и боковой панелей при узком экране
   *
   * @return string the rendering toggle buttons.
   */
  protected function renderToggleButton() {
    $targetId = '#' . $this->id . '-collapse';
    $str = '<button 
      aria-controls="navbar" 
      aria-expanded="false" 
      data-target="' . $targetId . '" 
      data-toggle="collapse" 
      class="navbar-toggle collapsed" 
      type="button">
        <i class="fa fa-reorder"></i>
      </button>';
    return $str;
  }
}
