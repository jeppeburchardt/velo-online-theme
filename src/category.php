<?php

get_header(); ?>


<div class="jumbotron">
	<div class="container">
		<h1><?php single_cat_title();?></h1>
		<?php if (category_description() != '') { ?>
		<p><?php echo category_description(); ?></p>
		<?php } ?>
	</div>
</div>


<div class="container">
	
	<div class="row">
		<?php
			if ( have_posts() ) :
				
				while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-4 col-xs-12">
					<?php get_template_part('content', 'teaser'); ?>
					</div>
				<?php endwhile;

			endif;
		?>
	</div>

</div>


<?php get_footer(); ?>
