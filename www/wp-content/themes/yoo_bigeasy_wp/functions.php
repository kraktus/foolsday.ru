<?php
/**
* @package   Big Easy
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   YOOtheme Proprietary Use License (http://www.yootheme.com/license)
*/

//Меняем страницу поиска на с /s/ на /search/
function fb_change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'fb_change_search_url_rewrite' );


//Делаем лого на вход в админку
// function my_custom_login_logo(){
//   echo '<style type="text/css">
//   h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
//   </style>';
// }
// add_action('login_head', 'my_custom_login_logo');


/**
 * [rdate description]
 * @param  [type]  $format    [как в date]
 * @param  [type]  $timestamp [время]
 * @param  integer $case      [По умолчанию он равен нулю, что означает склонение в именительном падеже. $case = 1 означает родительный падеж]
 * @return [date]             [возвращает дату в нужном формате]
 */
function rdate($format, $timestamp, $case = 0)
{
         if ( $timestamp === null )
                $timestamp = time();

         static $loc =
          'Январ,ь,я,е,ю,ём,е
          Феврал,ь,я,е,ю,ём,е
          Март, ,а,е,у,ом,е
          Апрел,ь,я,е,ю,ем,е
          Ма,й,я,е,ю,ем,е
          Июн,ь,я,е,ю,ем,е
          Июл,ь,я,е,ю,ем,е
          Август, ,а,е,у,ом,е
          Сентябр,ь,я,е,ю,ём,е
          Октябр,ь,я,е,ю,ём,е
          Ноябр,ь,я,е,ю,ём,е
          Декабр,ь,я,е,ю,ём,е';

         if ( is_string($loc) )
         {
                $months = array_map('trim', explode("\n", $loc));
                $loc    = array();

                foreach($months as $monthLocale)
                {
                           $cases = explode(',', $monthLocale);
                           $base  = array_shift($cases);

                           $cases = array_map('trim', $cases);

                           $loc[] = array(
                                    'base'  => $base,
                                    'cases' => $cases,
                                        );
                }
         }

         $m = (int)date('n', $timestamp)-1;

         $F = $loc[$m]['base'].$loc[$m]['cases'][$case];

         $format = strtr($format, array(
                'F' => $F,
                'M' => substr($F, 0, 3),
         ));

         return date($format, $timestamp);
}

//Узнаем админ ли пользователь.
function get_current_user_role() {
        global $wp_roles;

        $current_user = wp_get_current_user();
        $roles        = $current_user->roles;
        $role         = array_shift($roles);

        return $wp_roles->role_names[$role];
}

$current_user_role = get_current_user_role();



//Список менюшек для запрета
function remove_menus(){
  global $menu;
  $restricted = array(
    __('Dashboard'),
    __('Posts'),
    __('Media'),
    __('Links'),
    __('Pages'),
    __('Appearance'),
    __('Tools'),
    __('Users'),
    __('Settings'),
    __('Comments'),
    __('Plugins'),
    __('Wpcf7_admin_menu')
  );
  // echo "<pre>";
  // var_dump($menu);
  // echo "</pre>";
  end ($menu);
  while (prev($menu)){
    $value = explode(' ', $menu[key($menu)][0]);
    if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
      unset($menu[key($menu)]);
    }
  }
}
//Очистка консоли
function clear_dash(){
      $dash_side = &$GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
      $dash_normal = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];

      unset($dash_side['dashboard_quick_press']); //Быстрая публикация
    //  unset($dash_side['dashboard_recent_drafts']); //Полседние черновики
      unset($dash_side['dashboard_primary']); //Блог WordPress
      unset($dash_side['dashboard_secondary']); //Другие Нновости WordPress

      unset($dash_normal['dashboard_incoming_links']); //Входящие ссылки
    //  unset($dash_normal['dashboard_right_now']); //Прямо сейчас
      unset($dash_normal['dashboard_recent_comments']); //Последние комментарии
      unset($dash_normal['dashboard_plugins']); //Последние Плагины
}


//Запрещаем пользователю доступ.
if ($current_user_role!='Administrator')
{
    //Консоль
    add_action('wp_dashboard_setup', 'clear_dash' );
    //Пункты меню
    add_action('admin_menu', 'remove_menus');

    //Обновления
    if( !current_user_can( 'edit_users' ) ){
      add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
      add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
      // для 3.0+
      add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );


}

}


// load config
require_once(dirname(__FILE__).'/config.php');