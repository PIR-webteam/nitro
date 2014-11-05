<!-- Super Container | Footer Widget Space (Optional) -->
<?php if (get_option_tree('pre_footer_widgets') == 'Yes') { ?>
<div class="super-container full-width" id="section-pre-footer">

<!-- 960 Container -->
<div class="container">
	
<hr class="hr5"/>

<!-- footer -->
<footer>
	<div class="sixteen columns" id="pre-footer-row"> 
		<br />
		<div class="one-third column alpha">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('pre-footer-widget-1') ) ?>
		</div>
		<div class="one-third column">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('pre-footer-widget-2') ) ?>
		</div>
		<div class="one-third column omega">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('pre-footer-widget-3') ) ?>
		</div>
		<br />
	</div>
</footer>
<!-- /End Footer -->

</div>
<!-- /End 960 Container -->
</div>
<!-- /End Super Container -->
<?php } else{} ?>


<!-- ============================================== -->


<!-- Super Container | Footer Widget Space (Optional) -->
<?php if (get_option_tree('footer_widgets') == 'Yes') { ?>
<div class="super-container full-width" id="section-footer">

<!-- 960 Container -->
<div class="container">
<!-- footer -->
<footer>
	<div class="sixteen columns" id="footer-row"> 
		<br />
		<div class="one-third column alpha">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-widget-1') ) ?>
		</div>
		<div class="one-third column">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-widget-2') ) ?>
		</div>
		<div class="one-third column omega">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-widget-3') ) ?>
		</div>
		<br />
	</div>
</footer>
<!-- /End Footer -->

</div>
<!-- /End 960 Container -->
</div>
<!-- /End Super Container -->
<?php } else{} ?>


<!-- ============================================== -->


<!-- Super Container - SubFooter Space -->
<div class="super-container full-width" id="section-sub-footer">

<!-- 960 Container -->
<div class="container">

<div class="sixteen columns">
<?php if (get_option_tree('footer_blurb_left')) : ?><span class="copyright"><?php echo get_option_tree('footer_blurb_left'); ?></span><?php endif; ?>
<?php if (get_option_tree('footer_social') == 'Yes') : ?>
	<?php get_template_part( 'element', 'getsocial' ); ?>
<?php endif; ?>
<?php if (get_option_tree('footer_blurb_right')) : ?><span class="colophon"><?php echo get_option_tree('footer_blurb_right'); ?></span><?php endif; ?>
</div>

</div>
<!-- /End 960 Container -->
</div>
<!-- /End Super Container -->


<!-- ============================================== -->


<?php wp_footer(); ?>
</body>
</html>