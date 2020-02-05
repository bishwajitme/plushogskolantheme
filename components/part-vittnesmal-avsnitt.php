<?php


$vittnesmal_background = get_sub_field('background_image');
?>

<section class="part-vittnesmal-section home-section clearfix " style="background-image:url(<?php echo $vittnesmal_background; ?>)">

    <div class="container">
        <div class="row">
            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner p-4" role="listbox">
                    <?php
                    if (have_rows('vittnesmal')):

                        // loop through the rows of data
                        $slide_no = 0;
                        while (have_rows('vittnesmal')): the_row();
                            // display a sub field value
                            $vittnesmal_blid = get_sub_field('vittnesmal_blid');
                            $vittnesmalstext = get_sub_field('vittnesmalstext');
                            $slide_class = ($slide_no == 0) ? 'active' : '';
                            $slide_no = $slide_no + 1;
                            ?>

                            <div class="carousel-item text-white text-left <?php echo $slide_class; ?>">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <img src="<?php echo $vittnesmal_blid['url']; ?>" class="img-fluid mx-auto d-block"
                                             alt="vittnesmal blid">
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p><?php echo $vittnesmalstext; ?></p>
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
                <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

</section>

