<!DOCTYPE html>
<html class="<?php echo esc_attr(oceanwp_html_classes()); ?>" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta name="site_url" content="<?php echo WP_SITEURL; ?>" />
  <!-- Import External Font From CDN [START] -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- Import External Font From CDN [END] -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup('html'); ?>>

  <?php wp_body_open(); ?>
  <section>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-md-auto">
            <div>
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?= wp_get_attachment_image_src(301)[0] ?>" class="d-inline" alt="..."></a>
            </div>
          </div>
          <div class="col mb-0">
            <form class="search-form" action="<?php echo get_permalink('899'); ?>">
              <input type="search" name="q" value="" placeholder="Search for Benchmarks, Trends, Challenges, Best Practices" class="search-input">
              <button type="submit" class="search-button">
                <svg class="submit-button">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                </svg>
              </button>

              <button type="submit" class="search-option">Rechercher</button>
              <!--<label for="type-users" class="mb-0">
                    Rechercher
                  </label>-->
            </form>
            <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
              <path id="search" opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M11.2547 10.312L15.8047 14.862C16.0653 15.1227 16.0653 15.544 15.8047 15.8047C15.6747 15.9347 15.504 16 15.3333 16C15.1627 16 14.992 15.9347 14.862 15.8047L10.312 11.2547C9.22334 12.136 7.84 12.6667 6.33334 12.6667C2.84134 12.6667 0 9.82531 0 6.33331C0 2.84131 2.84131 0 6.33331 0C9.82531 0 12.6667 2.84134 12.6667 6.33334C12.6667 7.84 12.136 9.22334 11.2547 10.312ZM1.33334 6.33331C1.33334 9.09066 3.576 11.3333 6.33334 11.3333C9.09066 11.3333 11.3333 9.09066 11.3333 6.33331C11.3333 3.57597 9.09069 1.33331 6.33334 1.33331C3.576 1.33331 1.33334 3.57597 1.33334 6.33331Z" fill="black" />
            </svg>
          </div>
          <div class="col-md-auto">
            <ul class="right-menue ">
              <li>
                <a class="nav-link" href="#"><img src="<?= wp_get_attachment_image_src(298)[0] ?>" class="d-inline" alt="..."> S’inscrire</a>
              </li>
              <li>
                <a class="nav-link" href="#"><img src="<?= wp_get_attachment_image_src(299)[0] ?>" class="d-inline" alt="..."> Connexion</a>
              </li>

            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 			======================== -->
  <div class="border-b_t ">
    <nav class="navbar navbar-expand-lg  ">
      <div class="container">
        <!-- <a class="navbar-brand" href="#"></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span>MENU </span>
          <i class="fa fa-bars" aria-hidden="true"></i>

        </button>

        <?php
        wp_nav_menu(array(
          'theme_location'    => 'main_menu',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'navbarText',
          'menu_class'        => 'navbar-nav mr-auto mr_0_auto long-menue',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ));
        ?>

      </div>
    </nav>
  </div>