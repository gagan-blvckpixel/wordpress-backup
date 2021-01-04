<?php
/**
 * Template Name: Home Page
 *
 * @package OceanWP WordPress theme
 */

?>

<?php get_header(); ?>

<section class="decision-making">
        <div class="box">
            <div class="left">
              <p class="one">Comprendre les enjeux, comparer les solutions et partenaires,</p>
              <p class="two">
                <span>
                  <b>disposer de préconisations pour accélérer la prise de décision.</b></span>
               </p>
             </div>
            <div class="right">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/decision-making.png">
            </div>
        </div>
      </section>

      <section class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/banner-one.png);">
                
              </div>
              <div class="carousel-item" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/banner-one.png);">
                
              </div>
              <div class="carousel-item" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/banner-one.png);">
                
              </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a> -->
        </div>
      </section>

      <section class="mini-slider">
        <div class="autoplay">
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/myteklist.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/hris.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/erp.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/public-cloud.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/myteklist.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/hris.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/erp.png)">
              </div>
            </div>
            <div>
              <div class="slider-image" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/image/public-cloud.png)">
              </div>
            </div>
        </div>
      </section>


<?php get_footer(); ?>

      