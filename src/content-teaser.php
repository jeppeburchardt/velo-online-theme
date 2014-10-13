<?php if ( has_post_thumbnail() ): ?>
	<div class="image teaser">
		<div <?php post_class(); ?>>

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
			<div class="meta"><?php the_author(); ?> | <?php the_time( get_option( 'date_format' ) ); ?></div>

			 
			

		
		</div>
	</div>
<?php else: ?>
	<div class="no-image teaser">
		<div <?php post_class(); ?>>
			<h2>
				<a href="<?php echo get_permalink($post->ID) ?>">
				<?php the_title(); ?>
				</a>
				<?php if (get_post_meta(get_the_ID(), 'lang', true)) : ?>
				<span class="lang"><?php echo get_post_meta(get_the_ID(), 'lang', true); ?></span>
				<?php endif; ?>
			</h2>
			<div class="meta"><?php the_author(); ?> | <?php the_time( get_option( 'date_format' ) ); ?></div>

		<?php the_excerpt(); ?>
		</div>
	</div>
<?php endif; ?>