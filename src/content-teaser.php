<?php if ( has_post_thumbnail() ): ?>
	<div class="col-sm-4 col-xs-12">
	<div class="image teaser">

		<a href="<?php echo get_permalink($post->ID) ?>">
			<?php the_post_thumbnail('velo-frontpage'); ?>
		</a>
	
		<h2>
			<a href="<?php echo get_permalink($post->ID) ?>">
			<?php the_title(); ?>
			</a>
			<?php if (get_post_meta(get_the_ID(), 'lang', true)) : ?>
			<span class="lang"><?php echo get_post_meta(get_the_ID(), 'lang', true); ?></span>
			<?php endif; ?>
		</h2>

		 
		

		
		</div>
	</div>
<?php else: ?>
	<div class="col-sm-4 col-xs-12">
	<div class="no-image teaser">
		<h2>
			<a href="<?php echo get_permalink($post->ID) ?>">
			<?php the_title(); ?>
			</a>
			<?php if (get_post_meta(get_the_ID(), 'lang', true)) : ?>
			<span class="lang"><?php echo get_post_meta(get_the_ID(), 'lang', true); ?></span>
			<?php endif; ?>
		</h2>

	<?php the_excerpt(); ?>
	</div>
	</div>
<?php endif; ?>