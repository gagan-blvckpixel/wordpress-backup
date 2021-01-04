<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

function oceanwp_child_enqueue_parent_style()
{
    // Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
    $theme   = wp_get_theme('OceanWP');
    $version = $theme->get('Version');
    // Load the stylesheet
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('oceanwp-style'), $version);
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('custom-doc', get_stylesheet_directory_uri() . '/css/style-doc.css');
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('custom-font', get_stylesheet_directory_uri() . '/assets/font/font.css');

    wp_enqueue_script('jquery-custom', get_stylesheet_directory_uri() . '/js/jquery-3.5.1.min.js', array(), false, true);
    wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('jquery-custom'), false, true);
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js//bootstrap.min.js', array('jquery-custom'), false, true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.js', array('jquery-custom'), false, true);
    // wp_enqueue_script('search-engine', get_stylesheet_directory_uri() . '/js/search-engine.js', array('jquery-custom'), false, true);
    wp_enqueue_script('jquery-search-filter', get_stylesheet_directory_uri() . '/js/search-engine-filter.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');


define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());

// function tecknoew_include_jquery()
// {

//     wp_deregister_script('jquery');
//     //enqueuing th jquery and jquesy ui files
//     wp_enqueue_script('jquery ', THEME_URI . '/js/jquery-3.5.1.min.js', array(), '1.000');

//     add_action('wp_enqueue_scripts', 'jquery');
// }

// add_action('wp_enqueue_scripts', 'tecknoew_include_jquery');

// function invincix_scripts()
// {
//     //Theme css files

//     wp_enqueue_style('bootstrap-45', get_template_directory_uri() . '/css/bootstrap.min.css',  array(), false, 'all');


//     //Theme js files
//     wp_enqueue_script('bootstrap-js ', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.000');
// }
/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
// add_action('wp_enqueue_scripts', 'invincix_scripts');
if (!file_exists(get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php')) {
    // File does not exist... return an error.
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    // File exists... require it.
    require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
}


require_once get_stylesheet_directory() . '/inc/document_status.php';

add_filter('post_row_actions', 'remove_row_actions_post', 10, 2);
/*function remove_row_actions_post($actions, $post)
{
    if ($post->post_type === 'article' &&  $post->post_status == 'ready-for-review') {

        unset($actions['trash']);
    }
    if (($post->post_status === 'publish' && current_user_can('remove_edit_for_published_article')) || ($post->post_status === 'publication-review' && current_user_can('remove_integrator_edit__option'))) {
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}*/
function remove_row_actions_post($actions, $post)
{
    if (($post->post_type === 'article'|| $post->post_type === 'event') &&  $post->post_status == 'ready-for-review') {

        unset($actions['trash']);
    }
    if (($post->post_status === 'publish' && current_user_can('remove_edit_for_published_article'))) {
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}

add_action('admin_head', 'hide_edit_permalinks_admin_css');

function hide_edit_permalinks_admin_css()
{
    if (current_user_can('remove_integrator_publish_item') || current_user_can('remove_reviewer_publish_item')) {
?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#wp-admin-bar-publishpress_debug').remove();
                jQuery('#toplevel_page_pp-manage-roles').remove();
                jQuery('#publishing-action').remove();
                jQuery(' #major-publishing-actions .clear').empty();
            });
        </script>

    <?php
    }
    if (current_user_can('remove_publisher_publish_item')) {
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#wp-admin-bar-publishpress_debug').remove();
                jQuery('#toplevel_page_pp-manage-roles').remove();
            });
        </script>

    <?php
    }
    if (current_user_can('remove_article_add_new')) {
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#page-title-action').remove();

            });
        </script>

    <?php
    }
}
/*function remove_add_new_button()
{
    if (current_user_can('remove_article_add_new')) {
        global $submenu;
        unset($submenu['edit.php?post_type=article'][10][0]);
        unset($submenu['edit.php?post_type=article'][10][1]);
        unset($submenu['edit.php?post_type=article'][10][2]);
    }
}
add_action('admin_menu', 'remove_add_new_button');*/


function teknow_add_custom_field_automatically($post_id)
{
    global $wpdb;
    $votes_count = get_post_meta($post_id, 'revision_count', true);
    $revision_count = (int)$votes_count + 1;
    update_post_meta($post_id, 'revision_count', $revision_count);
    $revisions = new WP_Query(array(
        'post_status'       => 'inherit',
        'post_type'         => 'revision',
        'posts_per_page'    => 1,
        'orderby'           => 'ID'
    ));
    $lastRevisionID = array();
    $formatRevisions = array();
    if ($revisions->have_posts()) :
        while ($revisions->have_posts()) : $revisions->the_post();
            $lastRevisionID[] = get_the_ID() + 1;
        endwhile;
    endif;
    wp_reset_postdata();
    if (!empty($lastRevisionID)) {
        $formatRevisions = array('revision_id' => $lastRevisionID[0], 'revision_version' => $revision_count);
    } else {
        $formatRevisions = array('revision_id' => 1, 'revision_version' => $revision_count);
    }
    $getCustomRevisions = get_post_meta($post_id, 'custom_revisions');
    $parseRevisions = array();
    if (!empty($getCustomRevisions)) {
        $oldRevisions = $getCustomRevisions[0];
        $convertArr = (array)json_decode($oldRevisions);
        if (count($convertArr) > 0) {
            foreach ($convertArr as $key => $value) {
                $parseRevisions[] = (array)$value;
            }
            $parseRevisions[] = $formatRevisions;
        }
        update_post_meta($post_id, 'custom_revisions', json_encode($parseRevisions));
    } else {
        update_post_meta($post_id, 'custom_revisions', json_encode(array($formatRevisions)));
    }
}
add_action('publish_article', 'teknow_add_custom_field_automatically');


function display_custom_post_status_option()
{
    global $post;

    $user = wp_get_current_user();

    if ($post->post_type == 'article'|| $post->post_type == 'event') {
        if ($user->roles[0] === 'integrator') {
            echo '<script>
            jQuery(window).on("load", function() {
                jQuery("select#post_status option").remove();
                jQuery("select#post_status").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\">Ready for Review</option><option value=\"publication-review\" disabled=\"disabled\">Ready for Publish</option>");
				 jQuery(".inline-edit-status select option").remove();
                jQuery(".inline-edit-status select").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\">Ready for Review</option><option value=\"publication-review\" disabled=\"disabled\">Ready for Publish</option>");
            }); </script>
            ';
        } else if ($user->roles[0] === 'reviewer') {
            echo '<script>
            jQuery(window).on("load", function() {
                jQuery("select#post_status option").remove();
               jQuery("select#post_status").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\" >Ready for Review</option><option value=\"publication-review\">Ready for Publish</option>");
			   jQuery(".inline-edit-status select option").remove();
                jQuery(".inline-edit-status select").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\" >Ready for Review</option><option value=\"publication-review\">Ready for Publish</option>");
            });
            </script>
            ';
        } else if ($user->roles[0] == 'publisher') {
            echo '<script>
            jQuery(window).on("load", function() {
                jQuery("select#post_status option").remove();
                jQuery("select#post_status").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\" >Ready for Review</option><option value=\"publication-review\" >Ready for Publish</option><option value=\"publish\">Published</option>");
                jQuery(".inline-edit-status select option").remove();
                jQuery(".inline-edit-status select").append("<option value=\"draft\">Draft</option><option value=\"ready-for-review\" >Ready for Review</option><option value=\"publication-review\" >Ready for Publish</option><option value=\"publish\">Published</option>");
              
            });
            </script>
            ';
        }
    }
}
add_action('admin_footer', 'display_custom_post_status_option', 11);
/*Remove pending review --- Balbir 
add_action('post_submitbox_misc_actions', 'my_post_submitbox_misc_actions');
function my_post_submitbox_misc_actions()
{
    $js = <<<JS
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#misc-publishing-actions select#post_status option[value='pending']").remove();
});
</script>
JS;
    echo $js;
}
*/
function js_footer()
{
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery(".apply-filter").click(function() {
                jQuery(".post-data-grid").css("display", "none");
                // jQuery(".pagination-box").css("display","none");
                var count = 0;
                jQuery("input[name='sector[]']:checked").each(function() {
                    var id = jQuery(this).attr('id');
                    jQuery("#" + id).css("display", "block");
                    count++;
                });
                jQuery("input[name='author[]']:checked").each(function() {
                    var id = jQuery(this).attr('id');
                    jQuery("#" + id).css("display", "block");
                    count++;
                });
                jQuery("input[name='tag[]']:checked").each(function() {
                    var id = jQuery(this).attr('id');
                    jQuery("#" + id).css("display", "block");
                    count++;
                });
                // if(count >= 4){
                //    jQuery(".pagination-box").css("display","block"); 
                // }

            })
			jQuery(".filter_exapandable label").click(function(){
				console.log(jQuery(this));
				
                    if(jQuery(this).hasClass('collapsed-closed')){
						jQuery(this).removeClass('collapsed-closed');
						jQuery(this).addClass('collapsed-opened');
						
					} else if(jQuery(this).hasClass('collapsed-opened')){
						jQuery(this).removeClass('collapsed-opened');
						jQuery(this).addClass('collapsed-closed');
						
					}
					if(jQuery(this).hasClass('icon-plus-expanded')){
						jQuery(this).removeClass('icon-plus-expanded');
						jQuery(this).addClass('icon-minus-expanded');
						
					} else if(jQuery(this).hasClass('icon-minus-expanded')){
						jQuery(this).removeClass('icon-minus-expanded');
						jQuery(this).addClass('icon-plus-expanded');
						
					}
				jQuery(this).parent().find("ul.sub-term").toggle();
			});
			jQuery(".sub-term li").click(function(){

				var count = 0;
				jQuery(this).parent().find('li').each(function(index, value) {

					if(jQuery(this).find('input').is(":checked")){
						count++;
					}
				});

				if(count > 0){
					jQuery(this).parent().parent().find('input.checkbox-term').attr("checked", "checked");
				} else {
					jQuery(this).parent().parent().find('input.checkbox-term').removeAttr("checked");
				}
			})
        });
    </script>
<?php
}
add_action('wp_footer', 'js_footer');
// get taxonomies based on cpt
function get_terms_by_custom_post_type($post_type, $taxonomy)
{
    $args = array('post_type' => $post_type);
    $loop = new WP_Query($args);
    $postids = array();
    // build an array of post IDs
    while ($loop->have_posts()) : $loop->the_post();
        array_push($postids, get_the_ID());
    endwhile;
    // get taxonomy values based on array of IDs
    $regions = wp_get_object_terms($postids,  $taxonomy);
    return $regions;
}
// get site url
add_shortcode('cf7_siteurl', 'custom_siteurl', true);
function custom_siteurl(){
    return get_site_url();
}
 function change_dateformat($params, $content = null) {

    $data = do_shortcode($content);
    $newDate = date("d/m/Y", strtotime($data));
    return $newDate;

}
add_shortcode('change_date_format','change_dateformat');
function change_timeformat($params, $content = null) {
    setlocale(LC_TIME, "fr_FR"); 
    $data = do_shortcode($content);
   
    $newtime = strftime(" %T ", strtotime($data));
    return $newtime;

}
add_shortcode('change_time_format','change_timeformat');

function return_taxonomylist($taxonomy){

    $terms = get_terms(array(
                'taxonomy'   => $taxonomy,
                'hide_empty' => false,
                'parent' => 0,
            ));
        if (!empty($terms) && is_array($terms)) {
            foreach ($terms as $term) {
               
        ?>
            <li class="p-0 filter_exapandable">
                
                    <input id="filter-<?= $taxonomy ?>-<?= $term->term_id ?>" type="checkbox" value="<?= $term->term_id ?>" name="<?= $taxonomy ?>[]" class="checkbox-term" />
				
                <?php 
                 $childterms = get_terms(  array( 
                            'taxonomy'   => $taxonomy,
                            'parent' => $term->term_id, 
                            'orderby' => 'slug', 
                            'hide_empty' => false ) );
                 // print_r($childterms);exit();
                if(count($childterms) != 0) {
					echo '<label class="filter-expandable-label icon-plus-expanded haschild">'. $term->name.'</label>';
                    echo '<ul class="sub-term collapsed-closed ">';
                    foreach ($childterms as $child) {
                    ?>
                    <li class="p-0">
                        <label for="filter-<?= $taxonomy ?>-<?= $child->term_id ?>">
                            <input id="filter-<?= $taxonomy ?>-<?= $child->term_id ?>" type="checkbox" value="<?= $child->term_id ?>" name="<?= $taxonomy ?>[]" />
                            <?php echo $child->name; ?>
                        </label>
                    <?php 
                    }   
                    echo '</ul>';
					
                    }elseif(count($childterms) === 0) {
						echo '<label class="filter-expandable-label">'. $term->name.'</label>';
					}
                    ?>
            </li>
    <?php
        }
    }
        
}

function event_shortcode(){
    $events = get_posts(array('post_type' => 'event'));
    
    if(!empty($events) && is_array($events)){
        echo '<div class="events page-summary">';
        foreach ( $events as $event ) {
            
            $display_name = get_the_author_meta( 'display_name' , $event->post_author );
            $event_date = get_field('event_date', $event->ID);
            $summary = get_field('summary', $event->ID);
            $detail = get_field('detail', $event->ID);
            $announcement = get_field('announcement', $event->ID);
            $minutes = get_field('minutes', $event->ID);
            $post_thumbnail_id = get_post_thumbnail_id( $event->ID );
           
            ?>
                <div class="card page-summary-card mb-4">
                    <div class="card-body pt-0 pb-4 px-0 d-flex">
                        <div class="align-items-center justify-content-center">
                            <img src="<?= wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0]  ?>" class="feat-							img" alt="<?= $event->post_title ?>">
                        </div>
                        <div class="hc-lh-sm">
                            <a href="<?= $event->guid ?>">
                                <h3 class="m-0 hc-fs-36 hc-fw-700 hc-color-primary">
                                <?= $event->post_title ?>
                                </h3>
                            </a>
                            <span class="hc-fs-18 hc-fw-400"><?= $display_name?> | <?= date("F j, Y", strtotime($event->post_date))  ?></span>
                            <p class="card-text my-4 hc-lh-base">
                            	<?= $event->post_excerpt ?>
                            </p>
                            <div>
                                <span class="hc-fs-18 text-uppercase">
                                    <p class="hc-color-secondary">
                                        <b>Event Detail:</b><br><br> <?= $detail ?>
                                    </p>
                                    <p class="hc-color-secondary">
                                       <b> Event Announcement:</b><br><br> <?= $announcement ?>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
         echo '</div>';
    }
}
add_shortcode('get_all_events','event_shortcode');
    // functions for pagination on news page.