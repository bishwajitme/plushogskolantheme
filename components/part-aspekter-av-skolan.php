<?php

$utbildningsomraden = get_sub_field('aspekt_avsnitt_titel');
$aspekter_background = get_sub_field('aspekter_background');

?>

<section class="part-viktiga-aspekter-av-skolan pt-4 pb-4 clearfix" style="background:<?php echo $aspekter_background; ?>">

    <div class="container">
        <h2 class="section_title text-left text-white pt-4 pb-4"><?php echo $utbildningsomraden; ?></h2>
        <div class="row">
            <?php
            if (have_rows('school_important_aspects')):

                // loop through the rows of data
                while (have_rows('school_important_aspects')): the_row();
                    // display a sub field value
                    $school_important_aspect = get_sub_field('school_important_aspect');
                    ?>

                    <div class="aspekter-entry col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2">

                        <p class="text-white aspekter_text"><span class="tick_marker_bg" aria-hidden="true"><span
                                        class="icon-checkmark"></span> </span> <?php echo $school_important_aspect; ?>
                        </p>

                    </div>


                <?php
                endwhile;

            else:

                // no rows found

            endif;
            ?>
        </div>
    </div>

</section>