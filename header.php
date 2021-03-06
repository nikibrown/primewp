<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prime
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<?php $id = get_the_ID(); ?>

	<style>

		<?php // current page navigation for template-parts/secondary-nav.php ?>

		.page-id-<?php echo $id; ?> .page-id-<?php echo $id; ?> {
			background-color: white!important;
		}

		.page-id-<?php echo $id; ?> .page-id-<?php echo $id; ?>:nth-child(1) a {
			color: #173862!important;
		}

		.page-id-<?php echo $id; ?> .page-id-<?php echo $id; ?>:nth-child(2) a {
			color: #757575!important;
		}

		.page-id-<?php echo $id; ?> .page-id-<?php echo $id; ?>:nth-child(3) a {
			color: #1f7da5!important;
		}

		.page-id-<?php echo $id; ?> .page-id-<?php echo $id; ?>:nth-child(4) a {
			color: #007660!important;
		}

	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>



<?php if( get_field('header_background_image') ){ ?>
	<header style="background-image: url('<?php the_field("header_background_image"); ?>')">
<? } else { ?>
	<header style="background-image: url('<?php the_field("default_header_background_image" , 'option'); ?>')">
<?php }  ?>

    <div class="container">
        <div class="header-inner">
            <div class="header-top">
                <a href="<?php bloginfo("url"); ?>" class="logo">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/prime.svg" alt="" />
                </a>

 				<nav class="nav--utility">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                             <a href="" data-toggle="modal" data-target="#searchmodal"><i class="fas fa-search fa-lg"></i></a>
                        </li>
						<?php get_search_form(); ?>
                        <li class="list-inline-item"><a href="<?php echo esc_url(get_page_link(186)); ?>">Contact Us</a></li>
                    </ul>

                    <p class="tagline">Principles of Microbial Ecosystems</p>
            	</nav>
			</div>
            <div class="header-bottom">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        Main Menu <span class="navbar-toggler-icon">&#9776;</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

					
					<?php
						wp_nav_menu( array(
						'menu'              => 'Main Nav',
						'theme_location'    => 'header-menu',
						'depth'             => 2,
						'container'         => 'false',
						'menu_class'        => 'navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
						);
					?>
						
                    </div>
                </nav>
            </div>
        </div>

        <div class="page-title-container">
            <div class="page-title">
				<?php if ( is_search() ) { ?>
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'prime' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php } else if ( is_404() ) { ?>
					<h1><?php esc_html_e( '404 Page Not Found', 'prime' ); ?></h1>
                <?php } else { ?>
					<h1><?php the_title(); ?></h1>
				<?php } ?>
            </div>
        </div>
    </div>
</header>