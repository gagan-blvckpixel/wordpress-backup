<?php
/**
 * The template for displaying all news single posts
 *
 * This is a new template file that WordPress introduced in
 * version 4.3.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>

	<div class="single-news-wrapper">
		<div class="small-container">
			<h2><?php the_title(); ?></h2>
			
			<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
			<div class="banner" style="background: url(<?php echo $featured_img_url; ?>);">
            </div>
            <?php the_content(); ?>
		</div>
	</div>

<?php get_footer(); ?>
