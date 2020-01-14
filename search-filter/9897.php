<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */


if ($query->have_posts()) {
    ?>


    <div class='search-filter-results-list'>
        <div class="container">
            <div class="row">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();

                    $title = get_the_title();
                    $permalink = get_the_permalink();
                    $meta_start = get_field('metaUtbildningsstart');
                    $utbildningstyp = get_field('metaEstablishment');
                    $metaScope = get_field('metaScope');
                    $metaStartDate = get_field('metaStartDate');
                    $meta_location = get_field('metaLocation');
                    $meta_locationText = get_field('metaLocationText');
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
                                                                                title="<?php echo $title; ?> link"><?php echo $title; ?></a>
                                </h3>
                                <p class="program_meta"><span class="icon-location"></span>
                                    <span class="meta_text pl-2"
                                          title="<?php echo $meta_locationText; ?>"><?php echo $meta_location_count > 1 ? $meta_location_count . ' orter' : $meta_locationText; ?></span>
                                </p>
                                <?php if ($meta_start != ""): ?>
                                    <p class="program_meta"><span class="icon-alarm"></span> <span
                                                class="meta_text pl-2"><?php echo $meta_start->name; ?></span></p>
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
                                <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link"
                                   class="arrow_right_container"><span class="icon-arrow-right2"></span></a>

                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
<?php } else {
    ?>
    <div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
        <span>End of Results</span>
    </div>
<?php } ?>
