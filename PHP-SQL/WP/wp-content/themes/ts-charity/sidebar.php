<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ts-charity
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="archives" role="complementary" class="widget" aria-label="firstsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'ts-charity' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" role="complementary" class="widget" aria-label="secondsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'ts-charity' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>