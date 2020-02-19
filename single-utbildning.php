<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plushogskolan
 */

get_header();
?>
    <div class="row">
        <div id="primary" class="content-area col-12">
            <main id="main" class="site-main pr-3">

                <?php
                while (have_posts()) :
                    the_post();




                    $meta_start = get_field('metaUtbildningsstart');
                    $utbildningstyp = get_field('metaEstablishment');
                    $metaStudietakt = get_field('metaStudietakt');
                    $metaStartDate = get_field('metaStartDate');
                    $metaScope = get_field('metaScope');
                    $metaDeadline = get_field('metaDeadline');
                    $metaPoints = get_field('metaPoints');
                    $meta_location = get_field('metaLocation');
                    $yh_apply_link = get_field('yh_apply_link');
                    $meta_locationText = get_field('metaLocationText');
                    //var_dump($meta_locationText);
                    $distance_loc = FALSE;
                    $meta_location_array = [];
              
                    if ($meta_location):
                        $meta_location_count = count($meta_location);
                        $counter = 1;
                        $meta_location_text = '';
                        foreach ($meta_location as $location):
                            $location_title = get_the_title($location->ID);
                            $meta_location_array[] = $location_title;
                        endforeach;

                        $meta_location_text = '';
                        sort($meta_location_array);
                        foreach ($meta_location_array as $locationTitle):
                            $meta_location_text = $meta_location_text .$locationTitle;
                            if ($counter < $meta_location_count) {
                                $meta_location_text = $meta_location_text . ', ';
                            }
                            $counter++;
                        endforeach;
                        
                    endif;

                endwhile; // End of the loop.

                /* find if it is Distans education */
                    $distance_loc = in_array("Distans", $meta_location_array);
                


                    if ($meta_locationText == "") {
                        $meta_locationText = $meta_location_text;
                    }
                ?>
                <?php if($yh_apply_link != ""):?>
                <a href="<?php echo $yh_apply_link; ?>" target="_blank" class="float_ansok_button">Ansök Nu</a>
                <?php endif;?>

                <div id="program_sidebar" class="content-area">
                    <div class="primary p-4 w-100 text-white">
                        <h3 class="ps_title pb-2 mb-4 border-bottom">Snabba fakta</h3>

                        <?php if ($metaDeadline != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Sista ansökningsdag</span><span><?php echo $metaDeadline; ?></span>
                            </p>
                        <?php endif; ?>

                        <?php if ($utbildningstyp != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Utbildningstyp</span><span><?php echo $utbildningstyp->name; ?></span>
                            </p>
                        <?php endif; ?>

                        <?php if ($metaScope != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Utbildningslängd</span><span><?php echo $metaScope; ?></span></p>
                        <?php endif; ?>

                        <?php if ($metaStudietakt != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Studietakt</span><span><?php echo $metaStudietakt->name; ?></span>
                            </p>
                        <?php endif; ?>

                        <?php if ($metaPoints != ""): ?>
                            <p class="kurs_mta"><span class="meta_lebel">Poäng</span><span><?php echo $metaPoints; ?></span>
                            </p>
                        <?php endif; ?>

                        <?php if ($meta_location_text != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Studieort</span><span><?php 

                                        if($distance_loc){
                                           echo $meta_locationText;
                                          }
                                          else{
                                              echo $meta_location_text;
                                          }

                                        ?></span></p>
                        <?php endif; ?>

                        <?php if ($metaDeadline != ""): ?>
                            <p class="kurs_mta"><span
                                        class="meta_lebel">Utbildningsstart</span><span><?php echo $metaStartDate; ?></span></p>
                        <?php endif; ?>

                    </div>
                </div>
                <?php  get_template_part('template-parts/content', get_post_type()); ?>
                 <div class="p-3 m-3 clearfix"></div>
                <div class="col-12 pl-0">

                    <!-- Accordians Begins  -->
                    <div id="programa_accordion" class="program_accordion accordion md-accordion mb-5">


                        <?php $Informationsflikar = get_field('tabList');

                        foreach ($Informationsflikar as &$value) {
                            $titleString = $value['tabTitle'];
                            $resultText = preg_replace("/[^a-zA-Z]/", "", $titleString);

                            ?>

                            <div class="accordionTab">
                                <div class="card-header bg-transparent" role="tab"
                                     id="heading_<?php echo $titleString; ?>">
                                    <h4 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse"
                                           data-target="#<?php echo $resultText; ?>" aria-expanded="true"
                                           aria-controls="<?php echo $resultText; ?>">
                                            <?php echo $titleString; ?> <span
                                                    class="icon-caret-down rotate-icon float-right"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?php echo $resultText; ?>" class="collapse"
                                     aria-labelledby="<?php echo $resultText; ?>"
                                     data-parent="#programa_accordion">
                                    <div class="accordian-content article-content pt-4 pb-4">
                                        <?php echo $value['tabContent']; ?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div><!--.col-md-12-->

            </main><!-- #main -->
        </div><!-- #primary -->


    </div><!-- #row -->
    </div><!-- #content -->


    <!--
     ==============================*************===========================
     SRS form Section
     ==============================*************===========================
     -->
<?php
$home_page_id = get_option('page_on_front');

?>

    <div class="extra-content primary mt-4 mb-5 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="why-brand col-12 col-md-6">
                 <?php
                    if (have_rows('program_important_aspects')):

                        // loop through the rows of data
                        while (have_rows('program_important_aspects')): the_row();
                            // display a sub field value
                            $program_important_aspect = get_sub_field('program_important_aspect');
                            ?>

                            <div class="aspekter-entry easyanimator col-12">

                                <p class="text-white aspekter_text"><span class="tick_marker_bg" aria-hidden="true"><span
                                                class="icon-checkmark"></span> </span> <?php echo $program_important_aspect; ?>
                                </p>

                            </div>


                        <?php
                        endwhile;

                    else:

                        // no rows found

                    endif;
                    ?>


                </div>
                <div class="crm_form col-12 col-md-6 text-white">
                    <h3 class="text-center pb-2">Intresseanmälan</h3>
                    <?php
                    echo '<p class="interset_text">Är du intresserad av en eller flera av våra utbildningar? Gör en intresseanmälan så skickar vi dig mer information! Fyll i dina uppgifter samt vilken/vilka utbildningar du är intresserad av i formuläret nedan.</p>';
                    echo do_shortcode('[interest_form form_title=""]');
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!--
     ==============================*************===========================
     Relaterat section
     ==============================*************===========================
     -->
    <div class="extra-content  mt-4 mb-5 pt-4 pb-4">
    <div class="container">
        <div class="row">

            <?php

            $relPosts = get_field('articleRowCards');
            //var_dump($relPosts);

            if($relPosts):
                foreach ($relPosts as $p): // variable must NOT be called $post (IMPORTANT)
                    $featuredImage = get_field('featuredImage', $p->ID);
                    $excerpt = get_field('excerpt', $p->ID);
                    $title = get_the_title($p->ID);
                    $permalink = get_the_permalink($p->ID);
                    $publishdate = get_the_date( 'm/d/Y', $p->ID);
                    $postType = get_post_type($p->ID);
                    if($postType == 'nyhet'){
                        $term_obj_list = get_the_terms($p->ID, 'nyhetstyp');
                        $entityType = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    }
                    elseif($postType == 'page'){
                        $entityType = "Sida";
                    }
                    else{
                        $entityType = $postType;
                    }
                    include('components/post-item.php');
                    ?>
                    <?php endforeach; ?>

            <?php endif; ?>


        </div>

    </div>


<?php get_footer();
