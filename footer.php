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
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'liguebn' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'liguebn' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
    </div><!-- .pusher -->
    </div><!-- .clearfix -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
