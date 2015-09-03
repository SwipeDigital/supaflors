<?php
	global $nova_theme_options; ?>
<header id="nova-header" class="site-header header-style-2" role="banner">
			<div class="container"> 
				<div class="row header-container">
					<div class="col-md-12 header-inner">
						<div class="row">
							<div class="col-md-12 col-xs-2 mobile-menu-icon">
								<a href="#mobile-menu" class="mobile-menu-open visible-sm visible-xs"><i class="fa fa-align-justify"></i></a>	
							</div>
							<div class="col-md-12 col-xs-10">
								<div id="logo" class="nova-logo-center clearfix">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
										<?php if(!empty($nova_theme_options['logo']['url'])){
											$site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
											echo '<img src="'.$nova_theme_options['logo']['url'].'" class="header_logo normal_logo" alt="'.$site_title.'"/>';
											if(!empty($nova_theme_options['logo-retina']['url'])) {
												echo '<img src="'.$nova_theme_options['logo-retina']['url'].'" class="header_logo retina_logo" alt="'.$site_title.'" style="width:'.$nova_theme_options['logo']['width'].'px; height:'.$nova_theme_options['logo']['height'].'px;" />';
											}
										} else {bloginfo( 'name' );}?>
									</a>
								</div><!-- .logo -->
							</div>
						</div>
<nav id="mobile-menu">
<ul>
	<?php if ( has_nav_menu( 'primary' ) ) : 
			wp_nav_menu( array( 'theme_location' => 'primary' ,
				'container'  => '',
				'container_class' => '',
				'menu_class' => false,
				'items_wrap' => '%3$s',
				'menu_id' => '',
				'fallback_cb' => 'top_navigation_fallback',
				'link_before' => '<span>',
				'link_after' => '</span>'
			));
			?>
    <?php else: ?>
        <li>Define your main navigation in <b>Apperance > Menus</b></li>
    <?php endif; ?>	
</ul>						
</nav>		
						<div class="right-links">
							<?php if(empty($nova_theme_options['woocomerce-catalog-mode']) && !empty($nova_theme_options['show-mini-cart'])) { ?> 
							<ul class="header-nav">
						<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
						<li class="mini-cart">
							<div class="cart-inner">
								<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="cart-link">
										<!-- cart icon -->
										<div class="cart-icon">
					                        <div class="mini-cart-inner">
						                        <div class="mini-cart-count<?php if ($woocommerce->cart->cart_contents_count > 0) { echo " active";}?>"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
					                        </div><!-- .custom-cart-inner -->

										</div><!-- end cart icon -->
										<i class="cart-icon fa fa-shopping-cart"></i>
								</a>
								<div class="nav-dropdown">
								  	<div class="nav-dropdown-inner">
									<!-- Add a spinner before cart ajax content is loaded -->
										<?php if ($woocommerce->cart->cart_contents_count == 0) {
											echo '<p class="empty">'.__('No products in the cart.','woocommerce').'</p>';
											?> 
										<?php } ?>
										</div><!-- nav-dropdown-innner -->
								</div><!-- .nav-dropdown -->
							</div><!-- .cart-inner -->
						</li><!-- .mini-cart -->
						<?php } else { echo '<li>WooCommerce not installed!</li>';} ?>
					</ul><!-- .header-nav -->
					<?php }?>
	
				</div><!-- .right-links -->
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<div class="main-navigation hidden-sm hidden-xs">
	<div class="container">
			<nav class="main_menu drop_down clearfix">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
				wp_nav_menu( array( 'theme_location' => 'primary' ,
					'container'  => '',
					'container_class' => '',
					'menu_class' => '',
					'menu_id' => '',
					'fallback_cb' => 'top_navigation_fallback',
					'link_before' => '<span>',
					'link_after' => '</span>',
					'walker' => new nova_mega_menu_walker()
				));
				?>
	            <?php else: ?>
	                <li>Define your main navigation in <b>Apperance > Menus</b></li>
	            <?php endif; ?>							
			</nav>		
	</div>	
</div>
<div class="init-sticky-header"></div>
</header><!-- .header -->

