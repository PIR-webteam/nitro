<!-- Default Portfolio View - Grabs the variable set in the template-xxx.php files -->
<?php
if(isset($GLOBALS['portfolio_view']) && $GLOBALS[ 'portfolio_view' ] == 'Hybrid') : ?>

<?php wp_register_script( 'Footer1', WP_THEME_URL . '/assets/javascripts/theme/footer1.js', false, null, true);
wp_enqueue_script( 'Footer1' ); ?>

<?php elseif(isset($GLOBALS['portfolio_view']) && $GLOBALS[ 'portfolio_view' ] == 'List') : ?>

<?php wp_register_script( 'Footer3', WP_THEME_URL . '/assets/javascripts/theme/footer3.js', false, null, true);
wp_enqueue_script( 'Footer3' ); ?>

<?php else : ?>

<?php wp_register_script( 'Footer3', WP_THEME_URL . '/assets/javascripts/theme/footer3.js', false, null, true);
wp_enqueue_script( 'Footer3' ); ?>

<?php endif; ?>
<!-- End Default Portfolio View -->