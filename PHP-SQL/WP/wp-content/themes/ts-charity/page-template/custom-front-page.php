<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'ts_charity_before_slider' ); ?>

  <?php /** slider section **/ ?>
  <?php if( get_theme_mod('ts_charity_slider_hide_show',true) != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'ts_charity_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_pages[] = $mod;
            }
          }
          if( !empty($slider_pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $slider_pages,
              'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                      <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( ts_charity_string_limit_words( $excerpt,20 ) ); ?></p> 
                    </div>
                    <div class="col-lg-5 col-md-5">
                      <div class="more-btn">              
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','ts-charity'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','ts-charity' );?></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
            wp_reset_postdata();?>      
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','ts-charity' );?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','ts-charity' );?></span>
          </a>
        </div>  
      <div class="clearfix"></div>
    </section> 
  <?php } ?>
  <?php do_action( 'ts_charity_after_slider' ); ?>

  <?php /** post section **/ ?>
  <section id="causes">
    <?php if( get_theme_mod('ts_charity_title') != ''){ ?>
      <div class="heading-line">
        <h2><?php echo esc_html(get_theme_mod('ts_charity_title','')); ?> </h2>
        <img src="<?php echo esc_url( get_theme_mod('',get_template_directory_uri().'/images/hr.png') ); ?>" alt="Post thumbnail image">
      </div>
    <?php } ?>
    <div class="container"> 
      <div class="row">
       <?php 
          $catData=  get_theme_mod('ts_charity_causes_category');
            if($catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'ts-charity')));?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="causes-box col-lg-4 col-md-4">
                <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                <p><?php the_excerpt(); ?></p>
                <div class="metabox">
                  <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                  <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'ts-charity'), __('0 Comments', 'ts-charity'), __('% Comments', 'ts-charity') ); ?> </span>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
          <div class="clearfix"></div>
      </div>
    </div>
  </section>
  <?php do_action( 'ts_charity_after_causes_section' ); ?>
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>