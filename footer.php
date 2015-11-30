<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Ligue_BN
 */
?>

	</div><!-- .site-content -->

	<aside id="rightside" class="ui rail">
	   <div class="ui sticky">
		<?php dynamic_sidebar( 'right' ); ?>
	   </div>
	</aside><!-- .sidebar -->
    <!-- .clearfix -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
