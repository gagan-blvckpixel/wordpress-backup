<?php
/**
 * Template Name: OceanWP Child Single Revision
 *
 * @package OceanWP WordPress theme
 */

get_header();
?>

<?php 
$getRevisionID = (isset($_GET['revision_id']) ? $_GET['revision_id'] : 0);
$getRevision = wp_get_post_revision($getRevisionID); 
?>
<main id="primary" class="site-main article-page">
    <?php 
    if ( is_singular() ) {
        echo '<h1 class="entry-title">';
            echo $getRevision->post_title;
        echo '</h1>';
    } else {
        echo '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink($getRevisionID) ) . '">';
            echo $getRevision->post_title;
        echo '</a></h2>';    
    }
    ?>
    <div class="introduction-conclusion">
        <?php if( have_rows('description_repeater', $getRevisionID) ): ?>
            <div class="intro">
                <?php while( have_rows('description_repeater', $getRevisionID) ): the_row(); ?>

                    <p><?php the_sub_field('article_description'); ?></p>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <h2><?php the_field('article_title', $getRevisionID); ?></h2>
    </div>

    <div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">
        <div class="entry-content">
            <?php
            echo $getRevision->post_content;
            ?>
        </div><!-- .entry-content -->
    
        <div class="introduction-conclusion">
            <?php if( have_rows('articel_description_repeater', $getRevisionID) ): ?>
                <div class="intro">
                    <?php while( have_rows('articel_description_repeater', $getRevisionID) ): the_row(); ?>

                        <p><?php the_sub_field('article_conclusion_description'); ?></p>

                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
            <h2><?php the_field('article_conclusion_title', $getRevisionID); ?></h2>
        </div>

        <?php if( get_field('select_authors', $getRevisionID) ): ?>
            <?php $featured_post = get_field('select_authors', $getRevisionID); ?>
            <div class="author-details">
                <div class="left">                          
                    <div class="img-wrapper" style="background: url(<?php echo get_the_post_thumbnail_url($featured_post->ID, 'full'); ?>);">
                    </div>
                </div>
                <div class="right">
                    <span><?php echo get_the_title($featured_post->ID); ?></span>
                    <p><?php echo $featured_post->post_content; ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
     </div>   
</main>

<?php 
$author_id = $getRevision->post_author;
echo get_the_author_meta( 'nicename', $author_id );
?>
<?php    
get_footer();
