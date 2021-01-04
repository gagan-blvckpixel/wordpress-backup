<?php

/**
 * Template Name: News Page
 *
 * @package OceanWP WordPress theme
 */

?>

<?php get_header(); ?>
<div class="small-container">
<h2 class="feat-img">Nouvelles</h2>
<div id="news-panel" class="document-type-panel" style="display: block;">
    <?php
            $news = get_posts(array('post_type' => 'news'));
            if(!empty($news) && is_array($news)){
                echo '<div class="news--details"><div class="document-type-panels"><div id="all-panel" class="document-type-panel active">';
                foreach ( $news as $news_n ) {                  
                    $display_name = get_the_author_meta( 'display_name' , $news_n->post_author );
                    $news_date = get_field('news_date', $news_n->ID);
                    $summary = get_field('summary', $news_n->ID);
                    $detail = get_field('detail', $news_n->ID);
                    $post_thumbnail_id = get_post_thumbnail_id( $news_n->ID );
                   
                    ?>
                    <style type="text/css">
                        .news--details .card-body {
                            display: grid;
                            gap: 20px;
                            grid-template-columns: 170px 1fr;
                            align-items: flex-start;
                            justify-content: flex-start;
                            border-bottom: 1px solid #ccc;
                        }
                        .news--details .card {
                            border: 0px;
                        }
                    </style>
                        <div class="card mb-4">
                            <div class="card-body pt-0 pb-4 px-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="<?= wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0]  ?>" class="feat-img" alt="<?= $news_n->post_title ?>">
                                </div>
                                <div class="hc-lh-sm">
                                    <a href="<?= $news_n->guid ?>">
                                        <h3 class="m-0 hc-fs-36 hc-fw-700 hc-color-primary">
                                        <?= $news_n->post_title ?>
                                        </h3>
                                    </a>
                                    <span class="hc-fs-18 hc-fw-400"><?= $display_name?> | <?= date("F j, Y", strtotime($news_n->post_date))  ?></span>
        
                                    <p class="card-text my-4 hc-lh-base">
                                    <?= $news_n->post_excerpt ?>
                                    </p>
                                    <div>
                                        <span class="hc-fs-18 text-uppercase">
                                            <a href="<?= $news_n->ID ?>">READ MORE</a>

                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                 echo '</div></div></div>';
            }
    ?>
            </div>
            
</div>
<?php 
            echo "space for pagination";
            news_page_numeric_posts_nav();
            
get_footer(); ?>