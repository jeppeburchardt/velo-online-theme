<div class="col-md-9" role="main">
<div <?php post_class((has_post_thumbnail()?"image":"no-image")); ?>>

<?php if ( has_post_thumbnail() ): ?>
	<img src="<?php print(wp_get_attachment_image_src(get_post_thumbnail_id(), 'velo-article')[0]); ?>" />
<?php endif; ?>
	

<!-- 	<div class="row">
		<div class="col-md-8"> -->
			<h1><?php the_title(); ?></h1>
			<div class="meta"><?php the_time( get_option( 'date_format' ) ); ?></div>
			<?php the_content(); ?>
<!-- 		</div>
	</div> -->
	<div>
		<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
	</div>
</div>
</div>