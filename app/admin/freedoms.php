<?php
/**
 * Your Rights administration panel.
 *
 * @package Jabali
 * @subpackage Administration
 */

/** Jabali Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

$title = __( 'Freedoms' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );

include( ABSPATH . 'admin/admin-header.php' );
?>
<div class="wrap about-wrap">

<h1><?php printf( __( 'Welcome to Jabali %s' ), $display_version ); ?></h1>

<p class="about-text"><?php printf( __( 'Thank you for updating to the latest version! Jabali %s helps you get your site set up the way you want it.' ), $display_version ); ?></p>

<div class="wp-badge"><?php printf( __( 'Version %s' ), $display_version ); ?></div>

<h2 class="nav-tab-wrapper wp-clearfix">
	<a href="about.php" class="nav-tab"><?php _e( 'What&#8217;s New' ); ?></a>
	<a href="credits.php" class="nav-tab"><?php _e( 'Credits' ); ?></a>
	<a href="freedoms.php" class="nav-tab nav-tab-active"><?php _e( 'Freedoms' ); ?></a>
</h2>

<p class="about-description"><?php printf( __( 'Jabali is Free and open source software, built by a distributed community of mostly volunteer developers from around the world. Jabali comes with some awesome, worldview-changing rights courtesy of its <a href="%s">license</a>, the GPL.' ), 'https://jabali.github.io/about/license/' ); ?></p>

<ol start="0">
	<li><p><?php _e( 'You have the freedom to run the program, for any purpose.' ); ?></p></li>
	<li><p><?php _e( 'You have access to the source code, the freedom to study how the program works, and the freedom to change it to make it do what you wish.' ); ?></p></li>
	<li><p><?php _e( 'You have the freedom to redistribute copies of the original program so you can help your neighbor.' ); ?></p></li>
	<li><p><?php _e( 'You have the freedom to distribute copies of your modified versions to others. By doing this you can give the whole community a chance to benefit from your changes.' ); ?></p></li>
</ol>

<p><?php printf( __( 'Jabali grows when people like you tell their friends about it, and the thousands of businesses and services that are built on and around Jabali share that fact with their users. We&#8217;re flattered every time someone spreads the good word, just make sure to <a href="%s">check out our trademark guidelines</a> first.' ), 'http://jabalifoundation.org/trademark-policy/' ); ?></p>

<p><?php

$plugins_url = current_user_can( 'activate_plugins' ) ? admin_url( 'plugins.php' ) : __( 'https://jabali.github.io/plugins/' );
$themes_url = current_user_can( 'switch_themes' ) ? admin_url( 'themes.php' ) : __( 'https://jabali.github.io/themes/' );

printf( __( 'Every plugin and theme in Jabali.org&#8217;s directory is 100%% GPL or a similarly free and compatible license, so you can feel safe finding <a href="%1$s">plugins</a> and <a href="%2$s">themes</a> there. If you get a plugin or theme from another source, make sure to <a href="%3$s">ask them if it&#8217;s GPL</a> first. If they don&#8217;t respect the Jabali license, we don&#8217;t recommend them.' ), $plugins_url, $themes_url, 'https://jabali.github.io/about/license/' ); ?></p>

<p><?php _e( 'Don&#8217;t you wish all software came with these freedoms? So do we! For more information, check out the <a href="https://www.fsf.org/">Free Software Foundation</a>.' ); ?></p>

</div>
<?php include( ABSPATH . 'admin/admin-footer.php' ); ?>