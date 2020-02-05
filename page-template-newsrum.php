<?php
/**
 *  Template Name: Nyhetsrum sida
 *
 * @package plushogskolan
 */

get_header();
?>

    <div class="row">
        <div id="primary" class="content-area col-12">
            <main id="main" class="site-main newsroom_content">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                endwhile; // End of the loop.
                ?>


            </main><!-- #main -->
        </div><!-- #primary -->


    </div><!-- #row -->
    </div><!-- #content -->
    <div class="extra-content news_filterin_section mt-5 mb-5">
<?php
echo get_field('form_code');
?>
<?php get_footer();