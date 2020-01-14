<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plushogskolan
 */


?>
<?php
if (wp_nav_menu( array( 'theme_location' => 'menu-1', 'echo' => false, 'sub_menu' => true )) !== false || is_active_sidebar( 'sidebar-1' )) {
   ?>

<aside id="secondary" class="widget-area sidebar_menu col-12 col-md-4">
<?php
wp_nav_menu( array(
  'theme_location' => 'menu-1',
  'sub_menu' => true,
  'show_parent' => true
) );
?>
	<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}
	 ?>
</aside><!-- #secondary -->
<?php }  ?>