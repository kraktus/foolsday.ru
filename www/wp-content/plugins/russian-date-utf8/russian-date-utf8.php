<?php
/*
Plugin Name: Russian Date (utf-8)
Plugin URI: http://www.udivankin.ru
Description: Russian Date 
Version: 1.04
Author: allx
Author URI: http://www.udivankin.ru
*/

function processdate($tdate = '') {

	if ( substr_count($tdate , '---') > 0 ) return str_replace('---', '', $tdate);

	$treplace = array (
	"Январь" => "января",
	"Февраль" => "февраля",
	"Март" => "марта",
	"Апрель" => "апреля",
	"Май" => "мая",
	"Июнь" => "июня",
	"Июль" => "июля",
	"Август" => "августа",
	"Сентябрь" => "сентября",
	"Октябрь" => "октября",
	"Ноябрь" => "ноября",
	"Декабрь" => "декабря",
	"*" => "",
	"th" => "",
	"st" => "",
	"nd" => "",
	"rd" => ""
	);
   	return strtr($tdate, $treplace);
}


function the_russian_posttime($tdate)
{
	if ( substr_count($tdate , '*') == 0 ) 
	{
		return processdate($tdate);
	}
	$postdate=get_post_time('m.y');
	$postday=get_post_time('d');
	$todate=gmdate(('m.y'), current_time('timestamp'));
	$today=gmdate(('d'), current_time('timestamp'));
	$delta=$today-$postday;

	if (($postdate==$todate) && ($delta<=1)) 
	{
	  if ($today==$postday) 
	     {
		  $tdate='cегодня';
	     }
	  else
	     {
		  $tdate='вчера';
  	     }	
	  return $tdate;
	} 
	return processdate($tdate);
}


function russian_comment_date($tdate)
{
	if ( substr_count($tdate , '*') == 0 ) 
	{
		return processdate($tdate);
	}
	$commentdate=get_comment_time('m.y');
	$commentday=get_comment_time('d');
	$todate=gmdate(('m.y'), current_time('timestamp'));
	$today=gmdate(('d'), current_time('timestamp'));
	$delta=$today-$commentday;

	if (($commentdate==$todate) && ($delta<=1)) 
	{
	  if ($today==$commentday) 
	     {
		  $tdate='cегодня';
	     }
	  else
	     {
		  $tdate='вчера';
  	     }	
	  return $tdate;
	} 
	return processdate($tdate);
}


add_filter('the_time', 'the_russian_posttime');
add_filter('the_date', 'the_russian_posttime');
add_filter('get_comment_date', 'russian_comment_date');


?>