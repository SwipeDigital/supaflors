<?php
global $woo_options;
global $woocommerce;
global $nova_theme_options;
global $post;

$header_option = $nova_theme_options['header-style'];
if(!empty($_GET['_header_option'])) {
	$header_option = $_GET['_header_option'];
}else {
	$header_option = $nova_theme_options['header-style'];
}
?>
<!DOCTYPE html>
<!--[if lte IE 9 ]><html class="ie lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Custom favicon-->
	<?php if(!empty($nova_theme_options['favicon']['url'])): ?>
	<link rel="shortcut icon" href="<?php echo $nova_theme_options['favicon']['url']; ?>" type="image/x-icon" />
	<?php else:?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/x-icon" />
	<?php endif; ?>
	<?php if(!empty($nova_theme_options['iphone-icon']['url'])): ?>
	<!-- For iPhone -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $nova_theme_options['iphone-icon']['url']; ?>">
	<?php endif; ?>

	<?php if(!empty($nova_theme_options['iphone-icon-retina']['url'])): ?>
	<!-- For iPhone 4 Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $nova_theme_options['iphone-icon-retina']['url']; ?>">
	<?php endif; ?>

	<?php if(!empty($nova_theme_options['ipad-icon']['url'])): ?>
	<!-- For iPad -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $nova_theme_options['ipad-icon']['url']; ?>">
	<?php endif; ?>

	<?php if(!empty($nova_theme_options['ipad-icon-retina']['url'])): ?>
	<!-- For iPad Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $nova_theme_options['ipad-icon-retina']['url']; ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<div id="site-loading" class="circle"><div class="spinner"><div class="spinner-container container1"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container2"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container3"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div></div></div>
<?php
if(!empty($nova_theme_options['general-page-loader'])):
?>
<script>
	var _page_loader = true;
</script>
	<div class="page-loader">
		<?php if(!empty($nova_theme_options['general-loader-icon']) && !empty($nova_theme_options['general-loader-icon']['url'])){
			echo '<img src="'.$nova_theme_options['general-loader-icon']['url'].'" alt="Loading..."/>';
		} else {
			echo ' <img src="'.get_template_directory_uri().'/css/loading.gif" alt="Loading..."/>';
		
		}
		?>
	</div>
<?php else:?>
<script>
	var _page_loader = false;
</script>
<?php endif?>
	<div id="wrapper">
<?php do_action( 'before' ); ?>
<?php if(!empty($nova_theme_options['vertical-menu-area'])) { ?>
<a href="#mobile-menu" class="mobile-menu-open visible-sm visible-xs"><i class="fa fa-align-justify"></i></a>	
<div class="vertical-menu_area hidden-xs" tabindex="5000">



                <div class="vertical_area_background"></div>


            <div class="vertical_logo_wrapper">
								<div class="nova_logo_vertical">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
								<?php if(!empty($nova_theme_options['vertical-menu-logo']['url'])){
									$site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
									echo '<img src="'.$nova_theme_options['vertical-menu-logo']['url'].'" class="header_logo normal_logo" alt="'.$site_title.'"/>';
									if(!empty($nova_theme_options['vertical-menu-logo-retina']['url'])) {
										echo '<img src="'.$nova_theme_options['vertical-menu-logo-retina']['url'].'" class="header_logo retina_logo" alt="'.$site_title.'" style="width:'.$nova_theme_options['vertical-menu-logo']['width'].'px; height:'.$nova_theme_options['vertical-menu-logo']['height'].'px;" />';
									}
								} else {bloginfo( 'name' );}?>
							</a>
				</div>

			</div>
<div class="vetical-search-box">
	<?php if(function_exists('get_product_search_form')) {
										get_product_search_form();
									} else {
										get_search_form();
									} ?>
</div>
			<nav class="vertical-menu dropdown_animation vertical-menu-toggle">
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
								'walker' => new nova_vertical_walker_nav_menu()
							));
							?>
	                        <?php else: ?>
	                            <li>Define your main navigation in <b>Apperance > Menus</b></li>
				<?php endif; ?>	
			</nav>
			<div class="vertical-menu_area_widget_holder">			
			<?php dynamic_sidebar('vertical-menu-sidebar'); ?> 
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
<?php }else{ ?>
<?php
if(!empty($post->ID)) {
	$nova_page_title = get_post_meta($post->ID, 'nova_page_title', true);
	$nova_page_title_style = get_post_meta($post->ID, 'nova_page_title_style', true);
	$nova_page_custom_title = get_post_meta($post->ID, 'nova_page_custom_title', true);
	$nova_page_title_image = get_post_meta($post->ID, 'nova_page_title_image', true);
	$nova_page_title_text_style = get_post_meta($post->ID, 'nova_page_title_text_style', true);
	$custom_title_image_url = wp_get_attachment_url( $nova_page_title_image, 'full' );
	if ($nova_page_custom_title == "") {
		$nova_page_custom_title = get_the_title();
	}
}
?>
		<?php if(!empty($nova_theme_options['top-bar']) && $header_option !=4 && $header_option !=5){ ?>
		<div id="top-bar">
			<div class="container">
				<div class="row">
						<!-- left text -->
						<div class="left-text col-md-6 col-sm-6 col-xs-12">
							<div class="html"><?php echo $nova_theme_options['top-bar-left']; ?></div><!-- .html -->
							
						</div>
						<!-- right text -->
						<div class="right-text col-md-6 col-sm-6 col-xs-12 hidden-xs">
							 <?php if ( has_nav_menu( 'top_bar_nav' ) ) : ?>
							<?php  
									wp_nav_menu(array(
										'theme_location' => 'top_bar_nav',
										'menu_class' => 'top-bar-nav',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 2,
										'fallback_cb' => false
									));
							?>
							 <?php else: ?>
	                            Define your top bar navigation in <strong>Apperance > Menus</strong>
	                        <?php endif; ?>
	                        <div class="search-box hidden-xs hidden-sm">
	                        	<div class="search-box-label"><i class="fa fa-search"></i></div>
		                        <div class="nav-dropdown search-dropdown">
									<?php if(function_exists('get_product_search_form')) {
										get_product_search_form();
									} else {
										get_search_form();
									} ?>		                        
		                        </div>
	                        </div>
						</div><!-- .pos-text -->
					</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .#top-bar -->
		<?php }?>
<?php get_template_part("inc/headers/style_".$header_option); ?>
<?php if($nova_theme_options['sticky-header']){ ?>
<?php
// sticky header
get_template_part('inc/headers/sticky-header');
?>
<?php }?>
<?php
if(!empty($post->ID) && !is_search()) {
	$rev_slider_alias = get_post_meta($post->ID, 'nova_rev_slider_alias', true);					
	if ($rev_slider_alias != "") {  ?>
		<div class="home-slider-wrap">
			<?php putRevSlider($rev_slider_alias); ?>
			<!--<a href="#nextSection" class="bigArrow local"><i class="fa fa-angle-down"></i></a>-->
		</div>
	<?php 
	}else{ 
		if($header_option == 4 or $header_option == 5) {
			echo '<div class="sub-header">
					<div class="sub-header-title">'.$nova_page_custom_title.'</div>
			</div>';
		}
	}
}
if(is_search()) {
	if($header_option == 4 or $header_option == 5) {
		echo '<div class="sub-header">
		<div class="sub-header-title">	'.__('Search').'</div>
		</div>';
	}	
}
?>
<?php } //end vertical menu ?>
<div id="main-content" class="site-main">