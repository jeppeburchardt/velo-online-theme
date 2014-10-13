<?php

get_header(); ?>


<div class="jumbotron">
	<div class="container">
		<h1>Velo Online</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
	</div>
</div>


<div class="container">
	
	<div class="row loop">
		<?php
			if ( have_posts() ) :
				
				while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-4 col-xs-6">
					<?php get_template_part('content', 'teaser'); ?>
					</div>
				<?php endwhile;

			endif;
		?>
	</div>

</div>


<?php get_footer(); ?>
