<?if (get_post_type() === 'events'):?>
<?
/**
 * ШАБЛОН ДЛВ ПУБЛИКАЦИИ ТИПА EVENTS (события)
 */
?>
<div id="system">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<article class="item" data-permalink="<?php the_permalink(); ?>">

			<header>

				<h1 class="title"><?php the_title(); ?></h1>

			</header>




<?
$post_info = get_post_custom();

/*echo "<pre>";
var_dump($post_info);
echo "</pre>";*/
/*ВНИМАНИЕ МНОГО ГОВНОКОДА - Я НЕ УСПЕВАЛ :(*/?>

<?if($post_info["wpcf-city"][0] == 1)//Если город выбран правильно, то это Мск
        $post_info["wpcf-city"][0] = 'Москва';
else
        $post_info["wpcf-city"][0] =  $post_info["wpcf-another_city"][0];
?>



<table class="zebra">
<thead>
<tr>
<th style="vertical-align:text-top;">
<br>

<img class="alignnone size-medium wp-image-721" style="border: 1px solid #1A1A1C;" alt="10" src="<?=$post_info["wpcf-afisha"][0];?>" width="228" height="300" />
</th>
<td style="width: 4%;"></td>
<th class="center" style="text-align: left;" align="right">
	<h4>
	<dl class="separator">
		<dt>Когда?</dt>
			<dd><strong><?=rdate( 'd F Y', $post_info["wpcf-date"][0], 1);?></strong></dd>
			<dd>Начало в <strong><?=date("H:i", $post_info["wpcf-date"][0]);?></strong></dd>
			<dd><br></dd>
		<dt>Где?</dt>
			<dd><strong>г. <?=$post_info["wpcf-city"][0];?></strong></dd>
			<dd><strong>Клуб <?=$post_info["wpcf-club"][0];?></strong></dd>
			<dd><br></dd>
		<dt>Как добраться?</dt>
			<?if($post_info["wpcf-metro"][0]):?>
        		<dd><?=$post_info["wpcf-metro"][0];?></dd>
        		<?endif;?>
			<dd><strong><?=$post_info["wpcf-adress"][0];?></strong></dd>
			<dd><br></dd>
		<dt>Дополнительная информация</dt>
			<dd>
				<strong>
				<?if($post_info["wpcf-isprice"][0] == 1)//Беплатно или за бабло
        				echo 'Вход бесплатный';
				else
        			echo 'Цена билета: '.$post_info["wpcf-price"][0].' руб.';
				?>
				</strong>
			</dd>



			<?if($post_info["wpcf-vk"][0])://ВК-встреча если есть?>
			<dd>
				<a href="<?=$post_info["wpcf-vk"][0];?>" target="_blank" title="<?php /*the_title_attribute(); */?>">Встреча вконтакте</a>
			</dd>
			<?endif;?>


			<?if($post_info["wpcf-media"][0] == 2)://Фотоотчет если есть?>
			<dd>
				<a href="<?=$post_info["wpcf-url_media"][0];?>" target="_blank" title="<?php /*the_title_attribute(); */?>">Фото/Видео с концерта</a>
			</dd>
			<?endif;?>

	</dl>
	</h4>
	<a style="font-weight: normal; text-align: right; font-size: 14px; line-height: 1.5em;" href="http://фыва"> </a></th>
</tr>
</thead>
</table>
			<div class="content clearfix"><?php the_content(''); ?></div>
                        <p style="font-style: italic;"><?=$post_info["wpcf-full_text"][0];?></p>
			<?php the_tags('<p class="taxonomy">'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

			<h4><?php edit_post_link(__('Изменить данные события', 'warp'), '<p class="edit">','</p>'); ?></h4>

			<?php if (pings_open()) : ?>
			<p class="trackback"><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
			<?php endif; ?>

			<?php if (get_the_author_meta('description')) : ?>
			<section class="author-box clearfix">

				<!-- <?php echo get_avatar(get_the_author_meta('user_email')); ?> -->

				<!-- <h3 >Описание</h3>
				 -->


			</section>
			<?php endif; ?>

			<?php comments_template(); ?>

		</article>

		<?php endwhile; ?>
	<?php endif; ?>

</div>
<?elseif (get_post_type() === 'media'):?>
<?
/**
 * ШАБЛОН ДЛЯ ПУБЛИКАЦИИ ТИПА MEDIA(медиа-отчеты)
 */
?>
<div id="system">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<article class="item" data-permalink="<?php the_permalink(); ?>">
			<header>
				<h1 class="title"><?php the_title(); ?></h1>
			</header>
<?
$post_info = get_post_custom();

// echo "<pre>";
// var_dump($post_info);
// echo "</pre>";
/*ВНИМАНИЕ МНОГО ГОВНОКОДА - Я НЕ УСПЕВАЛ :(*/?>

<!-- Заголовок -->
<table border="0" cellpadding="0" cellspacing="0" style="width: 600px;">
	<tbody>
		<tr>
			<td rowspan="2" style="width: 350px;">
				<p style="font-style: italic;"><?=$post_info["wpcf-full_text"][0];?></p>
				<? if($post_info["wpcf-as_event"][0] == 1):?>
					<h4><a href="" title="<?php /*the_title_attribute(); */?>">Перейти на страницу события</a></h4>
				<? endif;?>
			</td>
			<td style="text-align: right; vertical-align: top">
				<!-- <h4>
					<strong>
					<?=the_time('j F Y');?>
					<br><br>
					<?=get_the_time();?>
					</strong>
				</h4> -->
			</td>
		</tr>
		<tr>
			<td style="text-align: right; vertical-align: bottom;">
			</td>
		</tr>
	</tbody>
</table>
<br><br>
<!-- Если только фотки -->
<? if(($post_info["wpcf-isset_photo"][0] == 1) && ($post_info["wpcf-isset_video"][0] != 1)):?>
	<div class="wk-gallery wk-gallery-wall clearfix polaroid ">
		<? for ($i = 0; $i < count($post_info["wpcf-photos"]); $i++): ?>
			<a class="" href="<?=$post_info["wpcf-photos"][$i]?>" data-lightbox="group:506-5314969e78b60" title="">
			<div>
				<img src="<?=$post_info["wpcf-photos"][$i]?>" width="213" height="142" alt="image1">
				<!-- <p class="title">Tony</p> -->
			</div>
			</a>
		<? endfor; ?>
	</div>
<? endif;?>


<!-- Фоторамки -->
<!-- <div class="wk-gallery wk-gallery-wall clearfix polaroid ">
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image1.jpg" data-lightbox="group:506-5314969e78b60" title="Tony"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image1-28114964f3.jpg" width="200" height="150" alt="image1"><p class="title">Tony</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image2.jpg" data-lightbox="group:506-5314969e78b60" title="Susan"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image2-0774cee8c3.jpg" width="200" height="150" alt="image2"><p class="title">Susan</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image3.jpg" data-lightbox="group:506-5314969e78b60" title="Jennifer"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image3-b4c0ca1ce9.jpg" width="200" height="150" alt="image3"><p class="title">Jennifer</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image4.jpg" data-lightbox="group:506-5314969e78b60" title="Kim"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image4-6abba3a89c.jpg" width="200" height="150" alt="image4"><p class="title">Kim</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image5.jpg" data-lightbox="group:506-5314969e78b60" title="Vanessa"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image5-3449ac5be7.jpg" width="200" height="150" alt="image5"><p class="title">Vanessa</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image6.jpg" data-lightbox="group:506-5314969e78b60" title="Clark"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image6-a1235e1190.jpg" width="200" height="150" alt="image6"><p class="title">Clark</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image1.jpg" data-lightbox="group:506-5314969e78b60" title="Tony"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image1-28114964f3.jpg" width="200" height="150" alt="image1"><p class="title">Tony</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image2.jpg" data-lightbox="group:506-5314969e78b60" title="Susan"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image2-0774cee8c3.jpg" width="200" height="150" alt="image2"><p class="title">Susan</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image3.jpg" data-lightbox="group:506-5314969e78b60" title="Jennifer"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image3-b4c0ca1ce9.jpg" width="200" height="150" alt="image3"><p class="title">Jennifer</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image4.jpg" data-lightbox="group:506-5314969e78b60" title="Kim"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image4-6abba3a89c.jpg" width="200" height="150" alt="image4"><p class="title">Kim</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image5.jpg" data-lightbox="group:506-5314969e78b60" title="Vanessa"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image5-3449ac5be7.jpg" width="200" height="150" alt="image5"><p class="title">Vanessa</p></div></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/polaroid/image6.jpg" data-lightbox="group:506-5314969e78b60" title="Clark"><div><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/506/image6-a1235e1190.jpg" width="200" height="150" alt="image6"><p class="title">Clark</p></div></a>

</div> -->

<!-- Если и фотки и видео -->
<? if(($post_info["wpcf-isset_photo"][0] == 1) && ($post_info["wpcf-isset_video"][0] == 1)):?>
	<div class="wk-gallery wk-gallery-wall clearfix zoom ">
		<? for ($i = 0; $i < count($post_info["wpcf-photos"]); $i++): ?>
			<a class="" href="<?=$post_info["wpcf-photos"][$i]?>" data-lightbox="group:504-5314969e7657e" title="">
				<img src="<?=$post_info["wpcf-photos"][$i]?>" width="213" height="150" alt="image4">
			</a>
		<? endfor; ?>
	</div>

<? endif;?>

<!-- Без границы -->
<!-- <div class="wk-gallery wk-gallery-wall clearfix zoom ">
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image1.jpg" data-lightbox="group:504-5314969e7657e" title="Model 1"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image1-d9b9c40429.jpg" width="200" height="150" alt="image1"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image2.jpg" data-lightbox="group:504-5314969e7657e" title="Model 2"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image2-d3ca5d37ec.jpg" width="200" height="150" alt="image2"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image3.jpg" data-lightbox="group:504-5314969e7657e" title="Model 3"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image3-1aee0e3ca2.jpg" width="200" height="150" alt="image3"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image4.jpg" data-lightbox="group:504-5314969e7657e" title="Model 4"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image4-98d8eb069e.jpg" width="200" height="150" alt="image4"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image5.jpg" data-lightbox="group:504-5314969e7657e" title="Model 5"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image5-6c496abd8c.jpg" width="200" height="150" alt="image5"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image6.jpg" data-lightbox="group:504-5314969e7657e" title="Model 6"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image6-5c401ad41a.jpg" width="200" height="150" alt="image6"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image1.jpg" data-lightbox="group:504-5314969e7657e" title="Model 1"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image1-d9b9c40429.jpg" width="200" height="150" alt="image1"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image2.jpg" data-lightbox="group:504-5314969e7657e" title="Model 2"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image2-d3ca5d37ec.jpg" width="200" height="150" alt="image2"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image3.jpg" data-lightbox="group:504-5314969e7657e" title="Model 3"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image3-1aee0e3ca2.jpg" width="200" height="150" alt="image3"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image4.jpg" data-lightbox="group:504-5314969e7657e" title="Model 4"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image4-98d8eb069e.jpg" width="200" height="150" alt="image4"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image5.jpg" data-lightbox="group:504-5314969e7657e" title="Model 5"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image5-6c496abd8c.jpg" width="200" height="150" alt="image5"></a>
	<a class="" href="/demo/themes/wordpress/2011/bigeasy/wp-content/uploads/yootheme/widgetkit/gallery/zoom/image6.jpg" data-lightbox="group:504-5314969e7657e" title="Model 6"><img src="/demo/themes/wordpress/2011/bigeasy/wp-content/plugins/widgetkit/cache/gallery/504/image6-5c401ad41a.jpg" width="200" height="150" alt="image6"></a>
</div> -->


<!-- <a style="display: block;" data-lightbox  href="http://www.youtube.com/watch?v=O6RCrsATYw0" title="Изо Всех Сил">
 -->

<!-- Видосы -->
<? if($post_info["wpcf-isset_video"][0] == 1):?>
	<? for ($i = 0; $i < count($post_info["wpcf-video"]); $i++): ?>
		<br><br>
		<hr>
		<br><br>
		<?=$post_info["wpcf-video"][$i]?>
	<? endfor; ?>
<? endif;?>

			<div class="content clearfix"><?php the_content(''); ?></div>

			<?php the_tags('<p class="taxonomy">'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

			<h4><?php edit_post_link(__('Изменить данные события', 'warp'), '<p class="edit">','</p>'); ?></h4>

			<?php if (pings_open()) : ?>
			<p class="trackback"><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
			<?php endif; ?>



			<?php comments_template(); ?>

		</article>

		<?php endwhile; ?>
	<?php endif; ?>

</div>
<?else:?>
<?/**
 * ШАБЛОН ДЛВ ПУБЛИКАЦИИ ПО УМОЛЧАНИЮ
 */?>
<div id="system">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<article class="item" data-permalink="<?php the_permalink(); ?>">

			<header>

				<h1 class="title"><?php the_title(); ?></h1>

				<p class="meta">
					<?php
						$date = '<time datetime="'.get_the_date('Y-m-d').'" pubdate>'.get_the_date().'</time>';
						printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
					?>
				</p>

			</header>

			<div class="content clearfix"><?php the_content(''); ?></div>

			<?php the_tags('<p class="taxonomy">'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

			<?php edit_post_link(__('Edit this post.', 'warp'), '<p class="edit">','</p>'); ?>

			<?php if (pings_open()) : ?>
			<p class="trackback"><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
			<?php endif; ?>

			<?php if (get_the_author_meta('description')) : ?>
			<section class="author-box clearfix">

				<?php echo get_avatar(get_the_author_meta('user_email')); ?>

				<h3 class="name"><?php the_author(); ?></h3>

				<div class="description"><?php the_author_meta('description'); ?></div>

			</section>
			<?php endif; ?>

			<?php comments_template(); ?>

		</article>

		<?php endwhile; ?>
	<?php endif; ?>

</div>

<?endif;?>