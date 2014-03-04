<div id="system">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<article class="item">

			<header>

				<h1 class="title"><?php the_title(); ?></h1>

			</header>

			<div class="content clearfix"><?php the_content(''); ?></div>

			<h4><?php edit_post_link(__('Изменить данные страницы', 'warp'), '<p class="edit">','</p>'); ?></h4>


		</article>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php comments_template(); ?>

</div>