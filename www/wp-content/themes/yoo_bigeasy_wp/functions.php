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





// load config
require_once(dirname(__FILE__).'/config.php');