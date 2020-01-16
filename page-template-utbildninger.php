<?php
/**
 *  Template Name: Utbildninger Page
 *
 * @package plushogskolan
 */

get_header();
?>
    <div class="row">
        <div id="filter_form" class="form-area col-12 col-md-3">
            <?php echo do_shortcode('[searchandfilter id="9897"]'); ?>
        </div>
        <div id="primary" class="content-area col-12 col-md-9">
            <main id="main" class="site-main pt-4">

                <?php
                while (have_posts()) :
                    the_post();

                    //get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                echo do_shortcode('[searchandfilter id="9897" show="results"]');
                ?>


            </main><!-- #main -->
        </div><!-- #primary -->


    </div><!-- #row -->
<?php get_footer();