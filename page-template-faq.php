<?php
/**
 *  Template Name: FAQ Page
 *
 * @package plushogskolan
 */

get_header();
?>

    <div class="row">
        <div id="primary" class="content-area col-12">
            <main id="main" class="site-main pb-5">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');


                endwhile; // End of the loop.
                ?>
                <!-- Accordians Begins  -->
                <div id="programa_accordion" class="program_accordion accordion md-accordion">

                    <?php $Informationsflikar = get_field('faq_section');

                    foreach ($Informationsflikar as &$value) {
                        $titleString = $value['faq_title'];
                        $resultText = preg_replace("/[^a-zA-Z]/", "", $titleString);

                        ?>

                        <div class="accordionTab content_faq">
                            <div class="card-header bg-transparent" role="tab"
                                 id="heading_<?php echo $titleString; ?>">
                                <h2 class="mb-0 faq_header">
                                    <a class="collapsed" data-toggle="collapse"
                                       data-target="#<?php echo $resultText; ?>" aria-expanded="true"
                                       aria-controls="<?php echo $resultText; ?>">
                                        <?php echo $titleString; ?> <span
                                                class="icon-caret-down rotate-icon float-right"></span>
                                    </a>
                                </h2>
                            </div>
                            <div id="<?php echo $resultText; ?>" class="collapse"
                                 aria-labelledby="<?php echo $resultText; ?>"
                                 data-parent="#programa_accordion">
                                <div class="accordian-content article-content pt-4 pb-4">
                                    <?php echo $value['faq_description']; ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
                <!-- Accordians Ends  -->

  <div class="p-2 m-4 clearfix"></div>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- #row -->
<?php get_footer();