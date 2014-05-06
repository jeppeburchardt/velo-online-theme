<?php

get_header(); ?>

<div id="page" class="main">


		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

					<div class="page <?php get_post_meta(the_ID(), 'class', true); ?>">
						<div class="wrap">
							<h2><?php the_title(); ?></h2>
							<div class="content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>

				<?php endwhile;

			endif;
		?>

</div>

<?php get_footer(); ?>