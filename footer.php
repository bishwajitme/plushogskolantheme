<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plushogskolan
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<div class="footer-container container text-center text-md-left">
	<div id="footer-sidebar" class="secondary row">
<div class="footer-sidebar1 footer_widget col-lg-3 col-md-4  col-12">
<?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
}
?>
</div>
<div class="footer-sidebar2 footer_widget col-lg-3 col-md-4 col-12">
<?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
}
?>
</div>
<div class="footer-sidebar3 footer_widget col-lg-3 col-md-4 col-12">
<?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
}
?>
</div>
<div class="footer-sidebar4 footer_widget col-lg-3 col-md-4 col-12">
<?php
if(is_active_sidebar('footer-sidebar-4')){
dynamic_sidebar('footer-sidebar-4');
}
?>
</div>
</div>
		<div class="site-info footer-copyright text-center py-3">
			<?php
			if(get_current_blog_id()==2){
				$logo_url = get_template_directory_uri() ."/assets/logos/affarshogskolan_new_white.svg";
			}
			if(get_current_blog_id()==3){
				$logo_url = get_template_directory_uri() ."/assets/logos/vardyrkeshogskolan_new_white.svg";
			}
			if(get_current_blog_id()==4){
				$logo_url = get_template_directory_uri() ."/assets/logos/teknikhogskolan_new_white.svg";
			}
			?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="footer-logo"><img src="<?php echo $logo_url; ?>" Alt="<?php echo get_bloginfo( 'name' ); ?> logo"></a>
		<p class="site-info-text"><span class="site_name"><?php echo get_bloginfo( 'name' ); ?></span> är en del av AcadeMedia, norra Europas största utbildningsföretag <a href="http://www.academedia.se" target="_blank">www.academedia.se</a>. 
		Som en del av Plushögskolan AB är vi auktoriserade enligt <a href="https://www.utbildningsforetagen.se/" target="_blank">Almega Utbildningsföretagen</a>.
		Vi använder cookies för att förbättra din upplevelse av vår webbplats. Genom att surfa vidare accepterar du dessa kakor. <a href="/integritetspolicy">Läs mer om cookies</a>.
		</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        $('#education_select').multiselect({
            columns: 1,
            placeholder: 'Välj utbildning'
        });

        $(".search_icon").click(function() {
            $(".spicewpsearchform").slideToggle();
        });

    });
</script>

</body>
</html>
