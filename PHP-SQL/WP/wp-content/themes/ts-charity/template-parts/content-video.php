<?php
/**
 * The template part for displaying post 
 *
 * @package TS Charity
 * @subpackage ts-charity
 * @since ts-charity 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video   = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article class="page-box">
  <div class="box-img">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?>
  </div>
  <div class="new-text">
    <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if( get_theme_mod( 'ts_charity_date_hide',true) != '' || get_theme_mod( 'ts_charity_comment_hide',true) != '' || get_theme_mod( 'ts_charity_author_hide',true) != '') { ?>
      <div class="metabox">
        <?php if( get_theme_mod( 'ts_charity_date_hide',true) != '') { ?>
          <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
        <?php } ?>

        <?php if( get_theme_mod( 'ts_charity_comment_hide',true) != '') { ?>
          <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'ts-charity'), __('0 Comments', 'ts-charity'), __('% Comments', 'ts-charity') ); ?> </span>
        <?php } ?>

        <?php if( get_theme_mod( 'ts_charity_author_hide',true) != '') { ?>
          <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        <?php } ?>
      </div>
    <?php }?>
    <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( ts_charity_string_limit_words( $excerpt, esc_attr(get_theme_mod('ts_charity_excerpt_number','20')))); ?></p></div>
    <div class="content-bttn">
      <div class="second-border">
        <a href="<?php the_permalink();?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'ts-charity' ); ?>"><?php echo esc_html(get_theme_mod('ts_charity_button_text','Read More'));?><span class="screen-reader-text"><?php esc_html_e( 'Read More','ts-charity' );?></span></a>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</article>
