<?php
/**
 *  Template Name: Full Width Page
 *
 * @package plushogskolan
 */

get_header();
?>

    <div class="row">
        <div id="primary" class="content-area col-12">
            <main id="main" class="site-main pr-5">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                endwhile; // End of the loop.
                ?>


            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- #row -->
<?php get_footer();