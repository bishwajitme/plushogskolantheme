<?php

$yh_aplication_link = get_sub_field('yh_aplication_link');
?>

<section class="part-samarbetsforetag-avsnitt home-section easyanimator clearfix">
    <div class="container">
        <div class="row">
            <div class="appli_process d-flex flex-sm-row flex-column w-100 p-3 align-items-center">
                <div class="icon_container"><a href="/utbildningar/" title="Jag vill läsa mer om utbildningarna"><span class="iconimg icon-list-alt"></span><span
                        class="samarbetsforetag_text">Jag vill läsa mer om utbildningarna</span></a></div>
                
                    <div class="separator-space"></div>
                    <div class="separator"></div>
                    <div class="separator-space"></div>
                    <div class="icon_container"><a href="/intresseanmalan/" title="Jag vill ha mer information"><span class="iconimg icon-lightbulb-o"></span><span
                    class="samarbetsforetag_text">Jag vill ha mer information</span></a></div>
                        <div class="separator-space"></div>
                        <div class="separator"></div>
                        <div class="separator-space"></div>
                        <div class="icon_container"><a href="<?php echo $yh_aplication_link; ?>" title="Jag vill ansöka" target="_blank"><span class="iconimg icon-desktop"></span><span class="samarbetsforetag_text">Jag vill ansöka</span></a></div>
                    </div>
                </div>

            </div>
            <div class="pt-4 mb-4 clearfix">&nbsp;</div>
            <div class="container">
                <h2 class="section_title text-left  pt-4">Några av våra samarbetsföretag</h2>
                <div class="row">
                  
                  <div id="carouselContent" class="carousel slide carousel-multi-item v-2  w-100" data-ride="carousel">
                <div class="carousel-inner v-2 v-100 mx-auto" role="listbox">
                    <?php
                    if (have_rows('sma_foretag')):

                        // loop through the rows of data
                        $slide_no = 0;
                        while (have_rows('sma_foretag')): the_row();
                            // display a sub field value
                            $sma_blid = get_sub_field('sma_blid');
                            $sma_foretagslank = get_sub_field('sma_foretagslank');
                            $slide_class = ($slide_no == 0) ? 'active' : '';
                            $slide_no = $slide_no + 1;
                            ?>

                            <div class="carousel-item text-white text-left <?php echo $slide_class; ?>">
                              
                                    <div class="col-lg-2 col-md-3 col-6">
                                        <div class="mb-2 text-center">
                                         <?php  if($sma_foretagslank != ""){
                                           echo '<a href="'.$sma_foretagslank.'" target="_blank" title="samarbetsforetag link">';
                                        }?>
                                        <img src="<?php echo $sma_blid; ?>" class="img-fluid mx-auto"
                                             alt="samarbetsforetag blid">

                                              <?php   if($sma_foretagslank !=""){
                                           echo '</a>';
                                        }?>
                                    </div>
                                </div>
                            </div>


                        <?php
                        endwhile;

                    else:

                        // no rows found

                    endif;
                    ?>
                </div>
               
            </div>
        </div>

                    </div>
                </div>




            </section>

            