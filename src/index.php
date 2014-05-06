<?php

get_header(); ?>


<div class="jumbotron">
	<div class="container">
		<h1>Hello, world!</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
	</div>
</div>


<div class="container">
	
	<div class="row">
		<?php
			if ( have_posts() ) :
				
				// Start the Loop.
				while ( have_posts() ) : the_post(); 

					get_template_part('content', 'teaser');

				endwhile;

			endif;
		?>
	</div>

</div>


<?php get_footer(); ?>
