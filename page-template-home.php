<?php
/**
 *  Template Name: Home Page
 *
 * @package plushogskolan
 */

get_header();
?>

    <div class="row">
        <div id="primary" class="content-area col-12 col-md-8">
            <main id="main" class="site-main pr-5">

                <?php
                while (have_posts()) :
                    the_post();

                    //	get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>


            </main><!-- #main -->

        </div><!-- #primary -->


    </div><!-- #row -->
    </div><!-- #content -->
    <div class="extra-content">
<?php
if (have_rows('page_content_flex')) :

    while (have_rows('page_content_flex')) : the_row();

        if (get_row_layout() == 'utbildningsomraden') :

            get_template_part('components/part-utbildningsomraden');

        elseif (get_row_layout() == 'viktiga_aspekter_av_skolan') :

            get_template_part('components/part-aspekter-av-skolan');

        elseif (get_row_layout() == 'mot_vara_studentavdelning') :

            get_template_part('components/part-vara-studentavdelning');

        elseif (get_row_layout() == 'senaste_nyhetsavsnittet') :

            get_template_part('components/part-senaste-nyhetsavsnittet');

        elseif (get_row_layout() == 'counters_section') :

            get_template_part('components/part-counters-section');

        elseif (get_row_layout() == 'events_section') :

            get_template_part('components/part-events-section');

        elseif (get_row_layout() == 'vittnesmal_avsnitt') :

            get_template_part('components/part-vittnesmal-avsnitt');

        elseif (get_row_layout() == 'samarbetsforetag_avsnitt') :

            get_template_part('components/part-samarbetsforetag-avsnitt');

        endif;

    endwhile;
endif;
?>
<?php get_footer();