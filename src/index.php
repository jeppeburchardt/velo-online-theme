<?php

get_header(); ?>


<div class="jumbotron">
	<div class="container">
		<h1><?php bloginfo('name'); ?></h1>
		<p><?php bloginfo('description'); ?></p>
	</div>
</div>


<div class="container">
	
	<div class="row loop">
		<?php
			if ( have_posts() ) :
				
				while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-6 col-xs-12 col-md-4">
					<?php get_template_part('content', 'teaser'); ?>
					</div>
				<?php endwhile;

			endif;
		?>
	</div>

</div>


<?php get_footer(); ?>
