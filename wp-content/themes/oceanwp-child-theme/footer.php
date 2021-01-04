<?php

/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>

</main><!-- #main -->

<?php do_action('ocean_after_main'); ?>

<?php do_action('ocean_before_footer'); ?>

<?php
// Elementor `footer` location.
if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) {
?>

  <?php //do_action( 'ocean_footer' ); 
  ?>

<?php } ?>

<?php do_action('ocean_after_footer'); ?>

</div><!-- #wrap -->

<?php do_action('ocean_after_wrap'); ?>

</div><!-- #outer-wrap -->

<?php do_action('ocean_after_outer_wrap'); ?>

<?php
// If is not sticky footer.
if (!class_exists('Ocean_Sticky_Footer')) {
  get_template_part('partials/scroll-top');
}
?>

<?php
// Search overlay style.
if ('overlay' === oceanwp_menu_search_style()) {
  get_template_part('partials/header/search-overlay');
}
?>

<?php
// If sidebar mobile menu style.
if ('sidebar' === oceanwp_mobile_menu_style()) {

  // Mobile panel close button.
  if (get_theme_mod('ocean_mobile_menu_close_btn', true)) {
    get_template_part('partials/mobile/mobile-sidr-close');
  }
?>

  <?php
  // Mobile Menu (if defined).
  get_template_part('partials/mobile/mobile-nav');
  ?>

<?php
  // Mobile search form.
  if (get_theme_mod('ocean_mobile_menu_search', true)) {
    get_template_part('partials/mobile/mobile-search');
  }
}
?>

<?php
// If full screen mobile menu style.
if ('fullscreen' === oceanwp_mobile_menu_style()) {
  get_template_part('partials/mobile/mobile-fullscreen');
}
?>

<footer>
  <div class="small-container">
    <div class="detail-list">
      <div class="wrapper">
        <div class="logo-wrapper">
          <a href="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/footer-logo.png">
          </a>
          <div class="social-wrapper">
            <a href="#" class="linkedin">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/linkedin.png">
            </a>
            <a href="#">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/twitter.png">
            </a>
          </div>
        </div>
        <div class="about-details">
          <p><strong>About</strong></p>
          <p>About teknowlogy Group</p>
          <p>Become Member</p>
          <p>GTC</p>
          <p>Legal Notices</p>
          <p>Privacy Policy- Personal Data</p>
        </div>
        <div class="customer-relationship">
          <p><strong>Customer Relationship</strong></p>
          <p>01.53.05.50</p>
          <p>relation_client@teknowlogy.com</p>
          <p>Contact form</p>
          <p>Open source</p>
        </div>
        <div class="how-to-use">
          <p><strong>How to use Myteknow</strong></p>
          <p>Contact your main contact to organize a presentation session of the tool for a quick start.</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<script>
  // $('.autoplay').slick({
  //   slidesToShow: 6,
  //   slidesToScroll: 6,
  //   autoplay: true,
  //   autoplaySpeed: 6000,
  // });


  jQuery('.autoplay').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 6000,
    centerPadding: '0px',
    centerMode: false,
    responsive: [{
        breakpoint: 1250,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
</script>

</body>

</html>