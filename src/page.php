<?php

get_header(); ?>


<div class="container">
	
	<div class="row loop">
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

					<?php get_template_part('content', 'article'); ?>

					<!--div class="page <?php get_post_meta(the_ID(), 'class', true); ?>">
						<div class="wrap">
							<h2><?php the_title(); ?></h2>
							<div class="content">
								<?php the_content(); ?>
							</div>
						</div>
					</div-->

				<?php endwhile;

			endif;
		?>
		<?php get_sidebar( 'content' ); ?>
	</div>

</div>

<?php get_footer(); ?>