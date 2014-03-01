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

				<!-- <p class="meta">
					<?php
						$date = '<time datetime="'.get_the_date('Y-m-d').'" pubdate>'.get_the_date().'</time>';
						printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
					?>
				</p> -->

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


<!--
<table class="zebra">
<thead>
<tr>
<th><a href="<?php the_permalink() ?>"><img class="alignnone size-medium wp-image-721" style="border: 5px solid #3FA5C3;" alt="10" src="<?=$post_info["wpcf-afisha"][0];?>" width="219" height="300" /></a></th>
<td style="width: 15%;"></td>
<th class="center" style="text-align: left;" align="right" valign="top">
<h3 style="text-align: right;"><strong><?=date( 'd F Y', $post_info["wpcf-date"][0]);?></strong></h3>
<h3 style="text-align: right;"><strong>  <?=date("H:i", $post_info["wpcf-date"][0]);?></strong></h3>
<h3 style="text-align: right;">г. <?=$post_info["wpcf-city"][0];?></h3>
<h3 style="text-align: right;">Клуб <strong><?=$post_info["wpcf-club"][0];?></strong></h3>
<?if($post_info["wpcf-vk"][0]):?>
        <h3 style="text-align: right;"><a href="<?=$post_info["wpcf-vk"][0];?>" title="<?php the_title_attribute(); ?>">Встреча вконтакте</a></h3>
<?endif;?>
</th>
</tr>
<tr>
<th colspan="3">
<p style="text-align: left;"><em><?=$post_info["wpcf-title_text"][0];?>
 <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">Подробнее...</a></em></p>
</th>
</tr>
</thead>
</table> -->





<table class="zebra">
<thead>
<tr>
<th style="vertical-align:text-top;">
<br>

<img class="alignnone size-medium wp-image-721" style="border: 5px solid #3FA5C3;" alt="10" src="<?=$post_info["wpcf-afisha"][0];?>" width="219" height="300" />
</th>
<td style="width: 4%;"></td>
<th class="center" style="text-align: left;" align="right">
	<h4>
	<dl class="separator">
		<dt>Когда?</dt>
			<dd><strong><?=date( 'd F Y', $post_info["wpcf-date"][0]);?></strong></dd>
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
				<a href="<?=$post_info["wpcf-vk"][0];?>" title="<?php /*the_title_attribute(); */?>">Встреча вконтакте</a>
			</dd>
			<?endif;?>


			<?if($post_info["wpcf-media"][0] == 2)://Фотоотчет если есть?>
			<dd>
				<a href="<?=$post_info["wpcf-url_media"][0];?>" title="<?php /*the_title_attribute(); */?>">Фото/Видео с концерта</a>
			</dd>
			<?endif;?>

	</dl>
	</h4>
	<a style="font-weight: normal; text-align: right; font-size: 14px; line-height: 1.5em;" href="http://фыва"> </a></th>
</tr>
</thead>
</table>
			<div class="content clearfix"><?php the_content(''); ?></div>

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
				<p style="font-style: italic;"><?=$post_info["wpcf-full_text"][0];?></p>

			</section>
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