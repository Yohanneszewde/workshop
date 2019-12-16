<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package ts-charity
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-ts">
	<div class="container middle-align">
		<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'ts-charity' ), esc_html__( 'Not Found', 'ts-charity' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'ts-charity' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'ts-charity' ); ?></p>
		<div class="read-moresec">
    		<a href="<?php echo esc_url(home_url() ) ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'ts-charity' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'ts-charity' ); ?></span></a>
    	</div>
	</div>
	<div class="clearfix"></div>
</main>

<?php get_footer(); ?>