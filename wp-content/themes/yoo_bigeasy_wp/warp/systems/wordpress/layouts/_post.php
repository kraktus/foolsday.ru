<?if (get_post_type() === 'events'):?>
<?
/**
 * ШАБЛОН ДЛВ ПУБЛИКАЦИИ ТИПА EVENTS (события)
 */
?>

<?
$post_info = get_post_custom();
// echo "<pre>";
// var_dump($post_info);
// echo "</pre>";
/*ВНИМАНИЕ МНОГО ГОВНОКОДА - Я НЕ УСПЕВАЛ :(*/?>
<? define(PAPER_NUMBER, 2); //Кол-во доступных газет для hover слоя превью события
?>

<?if($post_info["wpcf-city"][0] == 1)//Если город выбран правильно, то это Мск
        $post_info["wpcf-city"][0] = 'Москва';
else
        $post_info["wpcf-city"][0] =  $post_info["wpcf-another_city"][0];
?>
<article id="item-<?php the_ID(); ?>" class="item" data-permalink="<?php the_permalink(); ?>">

	<header>

		<h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

	</header>

        &nbsp;
<table class="zebra">
<thead>
<tr>



<th>
    <a  href="<?php the_permalink() ?>" class="opacity" style="position: relative; overflow: hidden;">
        <img src="<?=$post_info["wpcf-afisha"][0];?>" style="border: 1px solid  #1A1A1C;"  width="228" height="300" alt="Spotlight Image">
    </a>
</th>

<!--
<th>
    <a data-spotlight="effect:left;" href="<?php the_permalink() ?>" class="spotlight" style="position: relative; overflow: hidden;">
        <img src="<?=$post_info["wpcf-afisha"][0];?>" style="border: 1px solid  #1A1A1C;"  width="228" height="300" alt="Spotlight Image">
        <div class="overlay hover_paper<?=rand(1, PAPER_NUMBER)?>" style="position: absolute; visibility: visible; display: block; width: 228px; height: 300px; left: -228px; top: 0px; bottom: 0px;"></div>
    </a>
</th> -->




<td style="width: 15%;"></td>
<th class="center" style="text-align: left;" align="right" valign="top">
<h3 style="text-align: right;"><strong><?=rdate( 'd F Y', $post_info["wpcf-date"][0], 1);?></strong></h3>
<h3 style="text-align: right;"><strong>  <?=date("H:i", $post_info["wpcf-date"][0]);?></strong></h3>
<h3 style="text-align: right;">г. <?=$post_info["wpcf-city"][0];?></h3>
<h3 style="text-align: right;">Клуб <strong><?=$post_info["wpcf-club"][0];?></strong></h3>
<?if($post_info["wpcf-vk"][0]):?>
        <h3 style="text-align: right;"><a href="<?=$post_info["wpcf-vk"][0];?>" target="_blank"  title="<?php the_title_attribute(); ?>">Встреча вконтакте</a></h3>
<?endif;?>
</th>
</tr>
<tr>
<th colspan="3">
<p style="text-align: left;"><em><?=$post_info["wpcf-title_text"][0];?><br><br>
 <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">Подробнее...</a></em></p>
</th>
</tr>
</thead>
</table>
	<div class="content clearfix">
		<?php if (has_post_thumbnail()) : ?>
			<?php
			$width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
			$height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
			?>
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'alignright post-thumbnail')); ?></a>
		<?php endif; ?>
		<?php the_content(''); ?>
	</div>

	<!-- <p class="links">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a>
                <?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?>
        </p> -->

	<h4><?php edit_post_link(__('Изменить данные события', 'warp'), '<p class="edit">','</p>'); ?></h4>

</article>
<?elseif (get_post_type() === 'media'):?>
<?
/**
 * ШАБЛОН ДЛЯ ПУБЛИКАЦИИ ТИПА MEDIA(медиа-отчеты)
 */
?>

<?
$post_info = get_post_custom();
// echo "<pre>";
// var_dump($post_info);
// echo "</pre>";
/*ВНИМАНИЕ МНОГО ГОВНОКОДА - Я НЕ УСПЕВАЛ :(*/?>
<?if($post_info["wpcf-city"][0] == 1)//Если город выбран правильно, то это Мск
        $post_info["wpcf-city"][0] = 'Москва';
else
        $post_info["wpcf-city"][0] =  $post_info["wpcf-another_city"][0];
?>
<article id="item-<?php the_ID(); ?>" class="item" data-permalink="<?php the_permalink(); ?>">
        <header>
                <h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        </header>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr align="right">
<td rowspan="2" colspan="1">
<div class="wk-gallery wk-gallery-wall clearfix polaroid ">
        <a class="" href="<?php the_permalink() ?>" title=""><div><img src="<?=$post_info["wpcf-prev_img_1"][0]?>" width="220" height="150" alt="image1"><!-- <p class="title">Tony</p> --></div></a>
        <a class="" href="<?php the_permalink() ?>" title=""><div><img src="<?=$post_info["wpcf-prev_img_2"][0]?>" width="220" height="150" alt="image1"><!-- <p class="title">Tony</p> --></div></a>
</div>
</td>
<td>
<!-- <h3><strong><?=the_time('j F Y');?></strong></h3>
<h3><strong><?=get_the_time();?></strong></h3> -->
</td>
</tr>
<tr>
<td align="right" width="200">
        <?php if ($post_info["wpcf-isset_photo"][0] == 1): ?>
                <img class="alignnone  wp-image-775" alt="photo" src="/wp-content/uploads/2014/03/photo.png" width="60" height="60" />
        <?php endif ?>

        <?php if ($post_info["wpcf-isset_video"][0] == 1): ?>
                <img class="alignnone  wp-image-776" alt="video" src="/wp-content/uploads/2014/03/video.png" width="60" height="60" />
        <?php endif ?>
</td>
</tr>
<tr>
<td colspan="2"><em><?=$post_info["wpcf-title_text"][0]?>
 <br><br><a href="<?php the_permalink() ?>" title="">Подробнее...</a>
</em></td>
</tr>
</tbody>
</table>



          <div class="content clearfix">
                <?php if (has_post_thumbnail()) : ?>
                        <?php
                        $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
                        $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
                        ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'alignright post-thumbnail')); ?></a>
                <?php endif; ?>
                <?php the_content(''); ?>
        </div>

        <!-- <p class="links">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a>
                <?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?>
        </p> -->

        <h4><?php edit_post_link(__('Изменить данные события', 'warp'), '<p class="edit">','</p>'); ?></h4>

</article>

<?else:?>
<?
/**
 * ШАБЛОН ДЛЯ ПУБЛИКАЦИЙ ПО УМОЛЧАНИЮ
 */
?>
<article id="item-<?php the_ID(); ?>" class="item" data-permalink="<?php the_permalink(); ?>">

        <header>

                <h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

              <!--   <p class="meta">
                        <?php
                                $date = '<time datetime="'.get_the_date('Y-m-d').'" pubdate>'.get_the_date().'</time>';
                                printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
                        ?>
                </p> -->

        </header>

        <div class="content clearfix">
                <?php if (has_post_thumbnail()) : ?>
                        <?php
                        $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
                        $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
                        ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'alignright post-thumbnail')); ?></a>
                <?php endif; ?>
                <?php the_content(''); ?>
        </div>


               <h2> <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php/* _e('Continue Reading', 'warp'); */?>
                Перейти на страницу</a>
                </h2>
                <?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?>


        <h2><?php edit_post_link(__('Изменить данные', 'warp'), '<p class="edit">','</p>'); ?></h2>
<?endif;?>