<?php
/**
 * The template part for displaying services
 *
 * @package ts-charity
 * @subpackage ts-charity
 * @since ts-charity 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article class="page-box grid">
    <div class="box-image"> 
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>        
    </div>
    <div class="new-text">          
      <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( ts_charity_string_limit_words( $excerpt, esc_attr(get_theme_mod('ts_charity_excerpt_number','20')))); ?></p></div>
      <div class="content-bttn">
        <div class="second-border">
          <a href="<?php the_permalink();?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'ts-charity' ); ?>"><?php echo esc_html(get_theme_mod('ts_charity_button_text','Read More'));?><span class="screen-reader-text"><?php esc_html_e( 'Read More','ts-charity' );?></span></a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </article>
</div>