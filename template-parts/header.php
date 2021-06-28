<?php

$headerLayout    = xpro_get_option( 'xpro_header_type', 'standard' );
$header_meta    = xpro_get_meta( 'xpro-main-header-display');
$containerHeader = xpro_get_option( 'xpro_header_container', 'xpro-container' );
$headerSticky    = xpro_get_option( 'xpro_sticky_header_enable', '0' );

$logo_enable = xpro_get_option( 'xpro_header_logo_enable', '0' );
$site_logo   = xpro_get_option( 'xpro_site_logo', '' );
$sticky_logo = xpro_get_option( 'xpro_site_logo_sticky', '' );

$header_class = ( $headerSticky != '0' ) ? 'xpro-header-sticky' : '';

?>

<?php if ( $headerLayout !== 'none' && $header_meta !== 'disabled' ): ?>

    <header class="xpro-header <?php echo esc_attr($header_class); ?>">

        <nav id="xpro-main-nav"
             class="xpro-navbar-primary xpro-nav-layout-<?php echo esc_attr( $headerLayout ); ?>">
            <div class="<?php echo esc_attr($containerHeader); ?> xpro-navbar-inner">

                <!--Navbar Brand-->
                <h1 class="xpro-navbar-brand">
                    <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<?php
						if ( $logo_enable != '0' && ! empty( $site_logo ) ) {

							if ( ! empty( $site_logo ) ): ?>

                                <img src="<?php echo esc_url( $site_logo ); ?>"
                                     alt="<?php echo esc_attr( get_bloginfo() ); ?>"
                                     class="xpro-logo<?php echo ( ! empty( $sticky_logo ) ) ? ' xpro-logo-default' : ''; ?>">

							<?php else: bloginfo( 'name' ); endif;

							if ( ! empty( $sticky_logo ) ): ?>

                                <img src="<?php echo esc_url( $sticky_logo ); ?>"
                                     alt="<?php echo esc_attr( get_bloginfo() ); ?>" class="xpro-logo xpro-logo-sticky">

							<?php endif;

						} else {
							bloginfo( 'name' );
						}
						?>
                    </a>
                </h1>

                <!--Navbar Toggle-->
                <button class="xpro-navbar-toggle" type="button" data-toggle="collapse" data-target="#xpro-navbar-list" aria-expanded="false"
                        aria-label="<?php esc_attr_e( 'Toggle navigation', 'xpro' ); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

				<?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container_class' => 'xpro-navbar-collapse',
                            'container_id'    => 'xpro-navbar-menu',
                            'menu_class'      => 'xpro-navbar-nav',
                            'fallback_cb'     => 'xpro_nav_menu_fallback',
                            'menu_id'         => 'xpro-nav-menu',
                            'walker'          => new Xpro_Navwalker(),
                        )
                    );
				?>

            </div>
        </nav>

    </header>

<?php endif;