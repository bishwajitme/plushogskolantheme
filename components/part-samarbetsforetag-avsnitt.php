<?php

?>

<section class="part-samarbetsforetag-avsnitt home-section easyanimator clearfix">
    <div class="container">
        <div class="row">
            <div class="appli_process d-flex flex-sm-row flex-column w-100 p-3 align-items-center">
                <div class="icon_container"><a href="#"><span class="iconimg icon-lightbulb-o"></span></a><span
                            class="samarbetsforetag_text">Jag vill ha mer information</span></div>
                <div class="separator-space"></div>
                <div class="separator"></div>
                <div class="separator-space"></div>
                <div class="icon_container"><a href="#"><span class="iconimg icon-list-alt"></span></a><span
                            class="samarbetsforetag_text">Jag vill läsa mer om utbildningarna</span></div>
                <div class="separator-space"></div>
                <div class="separator"></div>
                <div class="separator-space"></div>
                <div class="icon_container"><a href="#"><span class="iconimg icon-desktop"></span></a><span
                            class="samarbetsforetag_text">Jag vill ansöka</span></div>
            </div>
        </div>

        <div class="container">
            <h2 class="section_title text-left  pt-4 pb-4 mb-4">Våra samarbetsföretag</h2>
            <div class="row">
                <?php
                if (have_rows('sma_foretag')):

                    // loop through the rows of data
                    $slide_no = 0;
                    while (have_rows('sma_foretag')): the_row();
                        // display a sub field value
                        $sma_blid = get_sub_field('sma_blid');
                        $sma_foretagslank = get_sub_field(' sma_foretagslank');
                        ?>
                        <div class="samarbetsforetag-entry col-lg-2 col-md-3 col-sm-6 text-center">
                            <a href="<?php echo $sma_foretagslank; ?>" title="samarbetsforetag link"><img
                                        src="<?php echo $sma_blid; ?>" class="img-fluid"
                                        alt="samarbetsforetag blid"></a>
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