<?php

/**
* The template for displaying all article single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package OceanWP WordPress theme
*/

get_header();
?>

<div class="article-page">
    <div class="small-container">
        <main id="primary" class="site-main">
            <?php 
            if ( is_singular() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
            }
            ?>
            <div class="introduction-conclusion">
                <?php if( have_rows('description_repeater') ): ?>
                    <div class="intro">
                        <?php while( have_rows('description_repeater') ): the_row(); ?>

                            <p><?php the_sub_field('article_description'); ?></p>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <h2><?php the_field('article_title'); ?></h2>
            </div>

            <div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">
                <div class="entry-content">
                    <?php
                    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                        the_excerpt();
                    } else {
                        the_content( __( 'Continue reading', 'twentytwenty' ) );
                    }
                    ?>
                </div><!-- .entry-content -->
            
                <div class="introduction-conclusion">
                    <?php if( have_rows('articel_description_repeater') ): ?>
                        <div class="intro">
                            <?php while( have_rows('articel_description_repeater') ): the_row(); ?>

                                <p><?php the_sub_field('article_conclusion_description'); ?></p>

                            <?php endwhile; ?>
                        </div>

                    <?php endif; ?>
                    <h2><?php the_field('article_conclusion_title'); ?></h2>
                </div>

                <!-- <?php if( have_rows('authors_details') ): ?>
                    <?php while( have_rows('authors_details') ): the_row(); ?>
                        <?php $autorName = get_sub_field('author_name'); ?>
                        <?php if($autorName != "") { ?>
                            <div class="author-details">
                                <div class="left">                          
                                    <div class="img-wrapper" style="background: url(<?php the_sub_field('author_image'); ?>);">
                                    </div>
                                </div>
                                <div class="right">
                                    <span><?php the_sub_field('author_name'); ?></span>
                                    <p><?php the_sub_field('author_description'); ?></p>
                                </div>
                            </div>
                        <?php } ?>  
                    <?php endwhile; ?>
                <?php endif; ?> -->

                <?php if( get_field('select_authors') ): ?>
                    <?php $featured_post = get_field('select_authors'); ?>
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
    </div>
</div>
<?php
$getPostID = get_the_id();
$getAllRevisions = wp_get_post_revisions($getPostID);
$versionNumber = 1;

if(count($getAllRevisions) > 0) {
    foreach (array_reverse($getAllRevisions) as $key => $value) {
        $author_id = $value->post_author;
        $authorName = get_the_author_meta( 'display_name', $author_id );
        $user_meta = get_userdata($author_id);
        $authorRole = (!(empty($user_meta->roles)) ? $user_meta->roles[0] : "");
        echo "<a href=".site_url('/single-revision/?revision_id='.$value->ID).">".$authorName." (".$authorRole.") - has been updated this article (V".$versionNumber.")</a><br />";
        $versionNumber++;
    }
}

/*********Display tag list**************/
$id = get_the_ID();
        $content_post = get_post($id);
        $tag_content = get_the_tags($id);
        echo '<div class="list-padding">';
        echo '<span class="text-uppercase tags-font">';
        echo '/';
        foreach($tag_content as $tag){
            echo '&nbsp';
            echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
            // echo "<a href=".site_url('/tag/'.$tag->name)." class='tag-link'>".$tag->name."</a>";
            echo '&nbsp';
            echo '/';
        }     
        echo '</span>';
        echo '</div>';
?>
<?php    
get_footer();
