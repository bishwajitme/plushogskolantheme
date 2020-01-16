<?php

$utbildningsomraden = get_sub_field('utbildningsomraden_section_title');
$orter_text = get_sub_field('utbildningsomraden_orter_text');

?>
<section class="utbildningsomraden pt-4 mt-4 pb-4 mb-4 clearfix ">
    <h2 class="section_title text-center p-4 mb-4"><?php echo $utbildningsomraden; ?></h2>
        <div class="container">
            <div class="row">
                <?php
                if (have_rows('amne_names')):

                    // loop through the rows of data
                    while (have_rows('amne_names')): the_row();
                        // display a sub field value
                        $amne_title = get_sub_field('amne_title');
                        $amne_image = get_sub_field('amne_blid');

                        $amne_link = get_sub_field('amne_link');
                        ?>

                        <div class="amne-entry easyanimator col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">

                            <div class="text-white hovereffect">
                                <img src="<?php echo esc_url($amne_image['url']); ?>" class="img-responsive"
                                     alt="<?php echo $amne_title; ?>">
                                <div class="overlay">
                                    <h2 class="text-white"><a  href="<?php echo $amne_link; ?>"
                                                              title="gå till <?php echo $amne_title; ?>"><?php echo $amne_title; ?></a></h2>
                                    <p><a class="info" href="<?php echo $amne_link; ?>"
                                          title="gå till <?php echo $amne_title; ?>">Läs mer</a></p>
                                </div>
                            </div>
                        </div>


                    <?php
                    endwhile;

                else:

                    // no rows found

                endif;
                ?>
                <div class="amne-entry col-lg-4 col-md-4 col-sm-6 col-xs-12 p-2">

                    <div class="text-white hovereffect">
                        <img src="/wp-content/uploads/2016/02/AH-Örebro-Artikelkort.jpg" class="img-responsive"
                             alt="<?php echo $amne_title; ?>">
                        <div class="overlay">
                            <h2 class="text-white"><a href="<?php echo $amne_link; ?>"
                                                      title="gå till <?php echo $amne_title; ?>">Alla utbildningar</a></h2>
                            <p>Här hittar du hela utbildningsutbudet. <br/>
                                <a class="info" href="<?php echo $amne_link; ?>"
                                   title="gå till <?php echo $amne_title; ?>">Läs mer</a></p>
                        </div>
                    </div>
                </div>


            </div>
            <p class="orter_text text-center mt-4 mb-4 ml-auto mr-auto pt-4 pb-2 w-75"><?php echo $orter_text; ?></p>
        </div>

</section>