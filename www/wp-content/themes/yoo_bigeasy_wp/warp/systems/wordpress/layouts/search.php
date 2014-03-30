<div id="system">

	<?php if (have_posts()) : ?>

		<h1><?php _e('Результаты поиска по запросу ', 'warp'); ?> &#8216;<?php echo stripslashes(strip_tags(get_search_query()));?>&#8217;</h1>
                <br>
                <hr>
		<?php echo $this->render('_posts'); ?>

		<?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

	<?php else : ?>

		<h2 >
                К сожалению, при поиске ничего не найдено
                </h2>
                <br>
                <br>
                <ul class="check">
                        <li>Убедитесь, что все слова написаны без ошибок.</li>
                        <li>Попробуйте использовать другие ключевые слова.</li>
                        <li>Попробуйте использовать более популярные ключевые слова.</li>
                </ul>
                <br>
                <br>

		<?php get_search_form(); ?>
	<?php endif; ?>

</div>