<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ominis
 */

global $dataOminis;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body id="top" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ominis' ); ?></a>

			<header id="masthead" class="site-header">
				<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-dark " data-bs-theme="dark">
					<div class="container">
						<<?php echo (is_home())? 'h1' : 'h2';?> class="navbar-brand">
							<a class="navbar-brand link-light- " href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
						<?php
						$ominis_description = get_bloginfo( 'description', 'display' );
						if ( $ominis_description || is_customize_preview() ) :
							?>
							<small class="text-white-50"><?php echo $ominis_description; /* WPCS: xss ok. */ ?></small>
						<?php endif; ?>
						</<?php echo (is_home())? 'h1' : 'h2';?>>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div id="navbarSupportedContent" class="collapse navbar-collapse ">
							<?php
							wp_nav_menu( array(
								'theme_location'	=> 'menu-1',
								'menu_id'			=> 'primary-menu',
								'menu_class'		=> 'navbar-nav ms-auto ',
								'container'			=> '',
								'add_li_class'		=> 'nav-item', //function add_additional_class_on_li 
								'add_a_class'		=> 'nav-link link-light- ', //function add_additional_class_on_a 
								'depth'				=> 2
							) );
							?>
							<ul class="navbar-nav d-lg-flex flex-row justify-content-around">
							<?php if ($dataOminis['facebook']!='') {?>
								<li class="nav-item">
									<a class="nav-link link-light- " href="<?php echo $dataOminis['facebook'];?>" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
								</li>
							<?php } ?>
							<?php if ($dataOminis['twitter']!='') {?>
								<li class="nav-item">
									<a class="nav-link link-light- " href="<?php echo $dataOminis['twitter'];?>" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
								</li>
							<?php } ?>
							<?php if ($dataOminis['instagram']!='') {?>
								<li class="nav-item">
									<a class="nav-link link-light- " href="<?php echo $dataOminis['instagram'];?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
								</li>
							<?php } ?>
							<?php if ($dataOminis['pinterest']!='') {?>
								<li class="nav-item">
									<a class="nav-link link-light- " href="<?php echo $dataOminis['pinterest'];?>" target="_blank"><i class="fab fa-pinterest-square fa-2x"></i></a>
								</li>
							<?php } ?>
							<?php if ($dataOminis['email']!='') {
								$txtEmail = explode('@',$dataOminis['email']);
								?>
								<li class="nav-item" id="ominisEmailAddress" data-str1="<?php echo $txtEmail[0];?>" data-str2="<?php echo $txtEmail[1];?>">
									<a class="nav-link link-light- " href="mailto:" target="_blank"><i class="fas fa-envelope-square fa-2x"></i></a>
								</li>
							<?php } ?>
								<li class="nav-item">
									<a class="nav-link link-light- " href="<?php echo site_url(); ?>/feed/" target="_blank"><i class="fas fa-rss-square fa-2x"></i></a>
								</li>
							</ul>
						</div> <!-- /#navbarSupportedContent -->
					</div> <!-- /.container -->
				</nav><!-- /#site-navigation -->
			</header><!-- #masthead -->

			<div id="content" class="site-content <?php if (is_home()): echo 'bg-dark text-light'; endif?>">
				<div class="container">
					<div class="row">
