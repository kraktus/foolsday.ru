



<?php
/**
* @package   Big Easy
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   YOOtheme Proprietary Use License (http://www.yootheme.com/license)
*/

// get warp
$warp = Warp::getInstance();
 get_header(); ?>

<h1>Сообщение 404 - Страницы не существует</h1>
<br>
<br>
<h4>
Упс...
<br>
<br>
Простите, но у нас возникли проблемы с поиском страницы, <br>которую Вы запрашиваете :(
<br>
<br>
…Скорее всего, <strong>страница переехала</strong> или страницы больше нет
<br>
В любом случае администратор сайта будет сурово наказн за это...
<br>
<br>
</h4>
<h3><a href="/">На главную</a></h3>
<h4>
<br>
Но возможно, Вы допустили небольшую опечатку при вводе адреса –<br> такое случается даже с нами, поэтому еще раз внимательно проверьте.
<br>
<br>
Пожалуйста, <strong>воспользуйтесь навигацией</strong> или <strong>формой поиска</strong>, <br>чтобы найти интересующую Вас информацию
</h4>

<?php get_footer();
// render error layout
//echo $warp['template']->render('error', array('title' => __('Page not found', 'warp'), 'error' => '404', 'message' => sprintf(__('404_page_message', 'warp'), $warp['system']->url, $warp['config']->get('site_name'))));