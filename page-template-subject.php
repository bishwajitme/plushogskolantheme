<?php
/**
 *  Template Name: Subject Page
 *
 * @package plushogskolan
 */

get_header();
 $email_address = get_field('email_address', 'option');
  $phone_number = get_field('phone_number', 'option');
  $utbildninger_page = get_page_by_path( 'utbildningar' );
   $utbildninger_page_id = $utbildninger_page -> ID;
$sidebar_button_text = get_field('sidebar_button_text', $utbildninger_page_id);
$sidebar_button_link = get_field('sidebar_button_link', $utbildninger_page_id);
?>

<div class="row">
  
	<div id="primary" class="content-area col-12">
		<main id="main" class="site-main">
            <div class="container">

                <div class="row">
                   <?php
                   $subject_id = get_field('connected_subject_id');
                   while (have_posts()) :
                    the_post();?>

                    
                    <div class="col-12">
                        <?php
                        get_template_part('template-parts/content', 'page');

                endwhile; // End of the loop.
                ?>
            </div>
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
                            'key' => 'metaSubject', // name of custom field
                            'value' => $subject_id, // matches exactly "123", not just 123. This prevents a match for "1234"
                            'compare' => 'LIKE'
                        )
                    )
                ));

                ?>
                <?php if ($utbildninger): ?>
                    <!-- #row utbilding-->
        
                    <div class="row">
                          <div id="filter_form" class="form-area col-12 col-md-3">

        <div class="sidecontent d-none d-lg-block">
         <?php if($sidebar_button_link != ""):?>
          <p class="mb-0 mt-3"> <span class="font-weight-bold d-block">Vill du inleda en ny karriär?</span>Gå vidare med din ansökan!</p>
          <a href="<?php echo $sidebar_button_link; ?>" class="btn btn-primary ansok_button btn-md mt-3 mb-4"><?php echo $sidebar_button_text; ?></a>

           <?php endif;?>

      <p class="font-weight-bold d-block mb-0">  Kom i kontakt med oss</p>
      <p>Behöver mer info innan du bestämmer dig? Kontakta oss på <a href="tel:<?php echo $phone_number; ?>"> <?php echo $phone_number; ?> </a>
        eller <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>.</p>
       <p class="font-weight-bold d-block mb-0">Ska vi skicka dig mer info?</p>
        <p>Gör en <a href='/om-oss/intresseanmalan/' style="text-decoration: underline;"><strong>intresseanmälan</strong> </a>
        så håller vi dig uppdaterad om vad som är på gång!</p>
    </div>
</div>
    <div  class="program-area col-12 col-md-9">
         <div class="row">

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
                                        $meta_location_text = $meta_location_text . ', ';
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
                                    <a href="<?php echo $upermalink; ?>" title="<?php echo $title; ?> link" class="full_box_link"></a>
                                    <div class="p-3 utbildning-entry-text">
                                        <h6 class="ff-label-wrapper custom"><?php echo $utbildningstypText; ?></h6>
                                        <h3 class="utbildning_title card-title mt-4"><a href="<?php echo $permalink; ?>"
                                                                                        title="<?php echo $utitle; ?> link"><?php echo $utitle; ?></a>
                                        </h3>
                                        <p class="program_meta"><span class="icon-location"></span>
                                            <span class="meta_text pl-2"
                                                  title="<?php echo $meta_locationText; ?>"> <?php if($distance_loc){
                                           echo $meta_locationText;
                                          }
                                          else{
                                              echo ($meta_location_count > 1) ? $meta_location_count . ' orter' : $meta_locationText;
                                          }

                                          ?></span>
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
                         </div>
                         </div>
                    </div> <!-- #row utbilding-->
                <?php endif; ?>

                <!--

                ===============================================================
                    connected programs end
                ===============================================================


                       *********** LINk Section Start ***************************
                    -->

                    <?php
                    if (have_rows('infoBlocksBottom')) :

                        while (have_rows('infoBlocksBottom')) : the_row();

                            if (get_row_layout() == 'internalLink' || get_row_layout() == 'externalLink') :
                                $link_title = get_sub_field('title');
                                $link_excerpt = get_sub_field('excerpt');
                                $link_linkUrl = get_sub_field('linkUrl');
                                $link_image = get_sub_field('image');
                                $link_color = get_sub_field('color'); ?>

                                <div class="row">
                                    <div class="col-lg-12 col-12 p-4 mt-5 mb-3 text-white siteBg <?php echo $link_color; ?>">
                                        <a href="<?php echo $link_linkUrl; ?>" title="<?php echo $title; ?> link" class="full_box_link"></a>
                                        <div class="content-wrap p-4 text-white">
                                        <a href="<?php echo $link_linkUrl; ?>" title="<?php echo $link_title; ?> link">
                                            <h4 class="nyheter_title card-title text-white"><?php echo $link_title; ?></h4>
                                        </a>
                                        <p><?php echo $link_excerpt; ?></p>
                                        <a href="<?php echo $link_linkUrl; ?>" title="<?php echo $link_title; ?> link"
                                           class="arrow_right_container"><span class="icon-arrow-right2"></span></a>
                                    </div>
                                </div>
                                 </div>


                            <?php
                            endif;

                        endwhile;
                    endif;
                    ?>

                     <!--

                    ===============================================================
                       LINk Section end
                    ===============================================================

                      
                    -->


           
              <div class="p-3 m-3"></div>

</main><!-- #main -->
</div><!-- #primary -->

</div><!-- #row -->

<?php get_footer();