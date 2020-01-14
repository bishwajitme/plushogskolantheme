<?php
/**
 *  Template Name: Location Page
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
                <h3 class="location_title text-center pt-4 pb-2">Här finns vi</h3>
                <?php
                $args = array(
                    'post_type' => 'studieort',
                );
                $studieorter = new WP_Query($args);
                ?>

                <section class="studieorter pt-4 pb-4 mt-4 mb-4">

                    <div class="container">

                        <div class="row">

                            <?php if ($studieorter->have_posts()) : while ($studieorter->have_posts()) : $studieorter->the_post();
                                $featuredImage = get_field("featuredImage");
                                $excerpt = get_field('excerpt');
                                $title = get_the_title();
                                $permalink = get_the_permalink()

                                ?>
                                <div class="event-entry col-lg-4 col-md-6 col-sm-12">
                                    <div class="bg-light">
                                        <img src="<?php echo $featuredImage['url']; ?>" class="card-img-top"
                                             alt="<?php echo $title; ?> Featured blid">
                                        <div class="p-3 event-entry-text">
                                            <h4 class="nyheter_title"><a
                                                        href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a>
                                            </h4>
                                            <p class="card-text"><?php echo $excerpt ?></p>
                                            <a href="<?php echo $permalink; ?>"
                                               title="<?php echo $title; ?> studieort link"
                                               class="arrow_right_container"><span class="icon-arrow-right2"></span></a>
                                        </div>
                                    </div>
                                </div>


                            <?php
                                // end the inner loop, no reset
                            endwhile; endif;
                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>


        </div>
    </div>

    </section>

    </main><!-- #main -->
    </div><!-- #primary -->

    </div><!-- #row -->

<?php get_footer();