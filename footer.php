<?php
/**
 * The template for displaying the footer.
 *
 * @package novaworks
 */

global $nova_theme_options;
?>

</div><!-- #main-content -->

<footer class="footer-wrapper" role="contentinfo">

<!-- FOOTER 1 -->
<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
<div class="footer footer-1 container">
	<div class="row">
   		<?php dynamic_sidebar('sidebar-footer-1'); ?>        
	</div><!-- end row -->
</div><!-- end footer 1 -->
<?php endif; ?>


<!-- FOOTER 2 -->
<?php if ( is_active_sidebar( 'sidebar-footer-2-1' ) || is_active_sidebar( 'sidebar-footer-2-2' ) || is_active_sidebar( 'sidebar-footer-2-3' ) ) : ?>
<div class="footer-2-wrapper dark-skin">
<div class="footer footer-2 container">
	<div class="row">
   		<div class="col-sm-4 footer-2-left"> 
   			<div class="row">
	   			<?php dynamic_sidebar('sidebar-footer-2-1'); ?> 
   			</div>
   		</div>	        
   		<div class="col-sm-4 footer-2-menu"> 
   			<div class="row">
	   			<?php dynamic_sidebar('sidebar-footer-2-2'); ?> 
   			</div>
   		</div>	 
   		<div class="col-sm-4 footer-2-right"> 
   			<div class="row">
	   			<?php dynamic_sidebar('sidebar-footer-2-3'); ?> 
   			</div>
   		</div>	
	</div><!-- end row -->
</div><!-- end footer 2 -->
</div><!-- end .footer-2-wrapper -->
<?php endif; ?>
<div class="coppyright-footer">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			 <?php if ( has_nav_menu( 'footer' ) ) : ?>
				<?php  
						wp_nav_menu(array(
							'theme_location' => 'footer',
							'menu_class' => 'footer-nav',
							'depth' => 1,
							'fallback_cb' => false,
						));
				?>						
			<?php endif; ?>
		</div><!-- .col-md-6 -->
		<div class="col-md-6 text-right">
				<?php if(!empty($nova_theme_options['footer-copyright-text'])){ echo $nova_theme_options['footer-copyright-text'];} ?>
		</div>
	</div><!-- .row -->
</div><!-- .container-->
</div><!-- .coppyright-footer -->
</footer><!-- .footer-wrapper -->
</div><!-- #wrapper -->

<!-- back to top -->
<a href="#top" id="top-link"><i class="fa fa-angle-up"></i></a>
	<!--// FULL WIDTH VIDEO //-->
	<div class="nova-video-inner"><div class="nova-video-close"><i class="fa fa-power-off"></i></div></div>
<?php wp_footer(); ?>
</body>
</html>
