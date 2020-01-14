<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plushogskolan
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head();

    if (get_current_blog_id() == 2) {
        $css_url = get_template_directory_uri() . "/css/ah.css";
    }
    if (get_current_blog_id() == 3) {
        $css_url = get_template_directory_uri() . "/css/vh.css";
    }
    if (get_current_blog_id() == 4) {
        $css_url = get_template_directory_uri() . "/css/th.css";
    }
    ?>
    <link rel='stylesheet' id='sitespecific-style-css' href='<?php echo $css_url; ?>' type='text/css' media='all'/>
    <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6256616/7040012/css/fonts.css" />
</head>

<body <?php body_class(); ?>>

<?php if (is_home() || is_front_page() || is_singular('utbildning')) :
    $bgimage = get_field('pageHeroImage')['url'];
    $hero_text = get_field('preambleText');
    $hero_title = get_field('preambleTitle');

else:
    $bgimage = get_field('pageHero')[0]['url'];
    $hero_title = get_the_title();
endif;

if (is_search()) {
    $hero_title = '<span>Sökresultat för: </span>' . esc_attr(get_search_query());
    $bgimage = '/wp-content/themes/plushogskolan/assets/images/default_bg.jpg';
}
if (is_404()) {
    $hero_title = 'Sidan hittas inte';
}

if (is_page(14) && isset($_GET['_sfm_meta_utbildningkategori'])) {
    $cat_id = $_GET['_sfm_meta_utbildningkategori'];
    $hero_title = get_the_title($cat_id);
    $hero_text = get_field('article_content', $cat_id);

}

if ($bgimage == "" || $bgimage == NULL) {
    $bgimage = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
if ($bgimage == "" || $bgimage == NULL) {
    $bgimage = '/wp-content/themes/plushogskolan/assets/images/default_bg.jpg';
}
if (get_current_blog_id() == 2) {
    $logo_url = get_template_directory_uri() . "/assets/logos/affarshogskolan_new_white.svg";
}
if (get_current_blog_id() == 3) {
    $logo_url = get_template_directory_uri() . "/assets/logos/vardyrkeshogskolan_new_white.svg";
}
if (get_current_blog_id() == 4) {
    $logo_url = get_template_directory_uri() . "/assets/logos/teknikhogskolan_new_white.svg";
}


?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'plushogskolan'); ?></a>

    <header id="masthead" class="site-header" style="background-image:url(<?php echo $bgimage; ?>);">
        <div class="header_overlay"></div>
        <div class="navbar navbar-default fixed-top">
            <div class="container">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                                        src="<?php echo $logo_url; ?>"
                                        Alt="<?php echo get_bloginfo('name'); ?> logo"></a></h1>
                    <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                                        src="<?php echo $logo_url; ?>"
                                        Alt="<?php echo get_bloginfo('name'); ?> logo"></a></p>
                    <?php
                    endif;
                    ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation nav navbar-nav navbar-right">
                    <button class="menu-toggle" aria-controls="primary-menu"
                            aria-expanded="false"><?php esc_html_e('Meny', 'plushogskolan'); ?></button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>


        <div class="container title-container">
            <h1 class="page-title" itemprop="headline"><?php echo $hero_title; ?></h1>
            <?php if (is_singular('utbildning')) :
            $metaScope = get_field('metaScope');
            echo '<p class="header_meta_scope text-white">'.$metaScope.'</p>';
            endif;

            if (is_home() || is_front_page() || is_singular('utbildning')) : ?>
                <p class="hero_text text-white"><?php echo $hero_text; ?></p>
            <?php endif; ?>

            <?php // check if the repeater field has rows of data
            if (!is_search()) {
                if (have_rows('preambleLinks')):
                    echo '<p class="links_container">';
                    // loop through the rows of data
                    while (have_rows('preambleLinks')) : the_row();
                        // display a sub field value
                        $link_name = get_sub_field('title');
                        $link_target = get_sub_field('linkUrl');
                        echo '<a href="'.$link_target.'" class="hero_links btn btn-primary btn-lg m-2">' . $link_name . '</a>';
                    endwhile;
                    echo '</p>';
                endif;
            }
            ?>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content container">
<?php
if (!is_front_page()){
    echo get_hansel_and_gretel_breadcrumbs();
}

?>