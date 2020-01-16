<?php
/**
 * The template for displaying single Studieort
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plushogskolan
 */

get_header();
?>
    <div class="row">
        <div id="primary" class="content-area col-12 col-md-12">
            <main id="main" class="site-main">

                <?php
                while (have_posts()) :
                    the_post();
                    $main_location_title = get_the_title();
                    $contactPhone = get_field("contactPhone");
                    $contactFax = get_field("contactFax");
                    $contactEmail = get_field("contactEmail");
                    $contactAddress = get_field("contactAdress");
                    $featuredImage = get_field("featuredImage");

                    get_template_part('template-parts/content', get_post_type());


                endwhile; // End of the loop.
                ?>
                <br class="clearfix">
                <div class="row">
                    <div class="address-area col-12 col-md-5">
                        <p class="address"><?php echo $contactAddress; ?></p>
                        <p class="phoneEmail"><?php echo $contactPhone . '<br>' . $contactEmail; ?></p>
                    </div>
                    <div class="image-area col-12 col-md-7">
                        <img class="studieort_image" alt="<?php echo $main_location_title; ?>"
                             src="<?php echo $featuredImage['url']; ?>"/>
                    </div>
                </div>
                <br class="clearfix">
                <!--
               ================================
                 connected programs start
               =============================
           -->
                <?php
                $utbildninger = get_posts(array(
                    'post_type' => 'utbildning',
                    'meta_query' => array(
                        array(
                            'key' => 'metaLocation', // name of custom field
                            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                            'compare' => 'LIKE'
                        )
                    )
                ));

                ?>
                <?php if ($utbildninger): ?>
                    <!-- #row utbilding-->
                    <h2 class="pt-4 mt-4 pb-3 text-center">Våra utbildningar i <?php echo $main_location_title; ?></h2>
                    <div class="row justify-content-center">

                        <?php foreach ($utbildninger as $utbildning): ?>
                            <?php


                            $utitle = get_the_title($utbildning->ID);
                            $upermalink = get_the_permalink($utbildning->ID);
                            $meta_start = get_field('metaUtbildningsstart', $utbildning->ID);
                            $utbildningstyp = get_field('metaEstablishment', $utbildning->ID);
                            $metaScope = get_field('metaScope', $utbildning->ID);
                            $metaStartDate = get_field('metaStartDate', $utbildning->ID);
                            $meta_location = get_field('metaLocation', $utbildning->ID);
                            $meta_locationText = get_field('metaLocationText', $utbildning->ID);
                            if ($meta_location):
                                $meta_location_count = count($meta_location);
                                $counter = 1;
                                $meta_location_text = '';
                                foreach ($meta_location as $location):
                                    $location_title = get_the_title($location->ID);
                                    $meta_location_text = $meta_location_text . $location_title;

                                    if ($counter < $meta_location_count) {
                                        $meta_location_text = $meta_location_text . ',';
                                    }
                                    $counter++;
                                endforeach;
                            endif;

                            if ($meta_locationText == "") {
                                $meta_locationText = $meta_location_text;
                            }

                            $utbildningstypText = "YH";
                            $utbildningClass = "class_yh";
                            if ($utbildningstyp != "") {
                                if ($utbildningstyp->name == "Kurs") {
                                    $utbildningstypText = "Kurs";
                                    $utbildningClass = "class_kurs";
                                }
                                if ($utbildningstyp->name == "Certifieringsutbildning") {
                                    $utbildningstypText = "Certi.";
                                    $utbildningClass = "class_certi";
                                }
                            }

                            ?>

                            <div class="utbildning-entry col-lg-4 col-md-4 col-sm-12">
                                <div class="bg-light <?php echo $utbildningClass; ?>">
                                    <div class="p-3 utbildning-entry-text">
                                        <h6 class="ff-label-wrapper custom"><?php echo $utbildningstypText; ?></h6>
                                        <h3 class="utbildning_title card-title mt-4"><a href="<?php echo $permalink; ?>"
                                                                                        title="<?php echo $utitle; ?> link"><?php echo $utitle; ?></a>
                                        </h3>
                                        <p class="program_meta"><span class="icon-location"></span>
                                            <span class="meta_text pl-2"
                                                  title="<?php echo $meta_locationText; ?>"><?php echo $meta_location_count > 1 ? $meta_location_count . ' orter' : $meta_locationText; ?></span>
                                        </p>
                                        <?php if ($meta_start != ""): ?>
                                            <p class="program_meta"><span class="icon-alarm"></span> <span
                                                        class="meta_text pl-2"><?php echo $meta_start->name; ?></span>
                                            </p>
                                        <?php endif;
                                        if ($metaScope != ""): ?>
                                            <p class="program_meta"><span class="icon-lightbulb-o"></span> <span
                                                        class="meta_text pl-2"><?php echo $metaScope; ?></span></p>
                                        <?php endif;
                                        if ($metaStartDate != ""): ?>
                                            <p class="program_meta"><span class="icon-laptop"></span> <span
                                                        class="meta_text pl-2"><?php echo $metaStartDate; ?></span></p>
                                        <?php endif; ?>
                                        <p class="program_meta pt-4">&nbsp;</p>
                                        <a href="<?php echo $upermalink; ?>" title="<?php echo $utitle; ?> link"
                                           class="arrow_right_container"><span class="icon-arrow-right2"></span></a>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div> <!-- #row utbilding-->
                <?php endif; ?>

                <!--

                ===============================================================
                    connected programs end
                ===============================================================

                   *********** Staff Section Start ***************************
                -->

                <?php
                if (have_rows('staffCards')): ?>
                <h2 class="text-center pt-4 mt-4">Vår personal i <?php echo $main_location_title; ?></h2>
                <div class="row">
                    <?php
                    // loop through the rows of data

                    while (have_rows('staffCards')): the_row();
                        // display a sub field value
                        $stimage = get_sub_field('image');
                        $stname = get_sub_field('name');
                        $stworkTitle = get_sub_field('workTitle');
                        $stworkDescription = get_sub_field('workDescription');
                        $stphone = get_sub_field('phone');
                        $stemail = get_sub_field('email');

                        ?>

                        <div class="staff-entry col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="bg-light">
                                <img src="<?php echo $stimage['url']; ?>" class="card-img-top"
                                     alt="<?php echo $stname; ?>  blid">
                                <div class="p-3 event-entry-text">
                                    <h4 class="nyheter_title card-title"><?php echo $stname; ?></h4>
                                    <p class="card-text"><?php echo $stworkTitle . '<br>' . $stemail . '<br>' . $stphone . '<br>' . $stworkDescription; ?></p>
                                </div>
                            </div>
                        </div>


                    <?php
                    endwhile;
                    echo '</div>';
                    else:

                        // no rows found

                    endif;
                    ?>
                    <!--

                    ===============================================================
                        Staff Section
                    ===============================================================

                       *********** LINk Section Start ***************************
                    -->

                    <?php
                    if (have_rows('infoBlocks')) :

                        while (have_rows('infoBlocks')) : the_row();

                            if (get_row_layout() == 'internalLink' || get_row_layout() == 'externalLink') :
                                $link_title = get_sub_field('title');
                                $link_excerpt = get_sub_field('excerpt');
                                $link_linkUrl = get_sub_field('linkUrl');
                                $link_image = get_sub_field('image');
                                $link_color = get_sub_field('color'); ?>

                                <div class="row">
                                    <div class="col-lg-12 col-12 p-4 mt-4 mb-4 text-white siteBg <?php echo $link_color; ?>">
                                        <a href="<?php echo $link_linkUrl; ?>" title="<?php echo $link_title; ?> link">
                                            <h4 class="nyheter_title card-title text-white"><?php echo $link_title; ?></h4>
                                        </a>
                                        <p><?php echo $link_excerpt; ?></p>
                                        <a href="<?php echo $link_linkUrl; ?>" title="<?php echo $link_title; ?> link"
                                           class="arrow_right_container"><span class="icon-arrow-right2"></span></a>
                                    </div>
                                </div>


                            <?php
                            endif;

                        endwhile;
                    endif;
                    ?>


            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #row -->
<?php get_footer();
