<?php

get_header(); ?>


<div class="container">
	
	<div class="row loop">
		<?php
			if ( have_posts() ) :
				
				// Start the Loop.
				while ( have_posts() ) : the_post(); 

					get_template_part('content', 'article');

				endwhile;

			endif;
		?>
		<?php get_sidebar( 'content' ); ?>
	</div>

</div>


<?php get_footer(); ?>
