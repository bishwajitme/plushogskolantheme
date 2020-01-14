<?php

$senaste_antal_nyheter = get_sub_field('senaste_antal_nyheter');
$senaste_nyhetsavsnittet_blid = get_sub_field('senaste_nyhetsavsnittet_blid');
$args = array(
    'post_type' => 'nyhet',
    'posts_per_page' => $senaste_antal_nyheter,
    'tax_query' => array(
        array(
            'taxonomy' => 'nyhetstyp',
            'field' => 'slug',
            'terms' => 'nyhet',
        )
    ),

);
$senaste_nyheter = new WP_Query($args);
?>

<section class="mot_vara_studentavdelning pt-4 pb-4 mt-4 mb-4 clearfix">

    <div class="container">

        <div class="row">
            <div class="aspekter-entry col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2">
                <h2 class="section_title text-left pt-2 pb-2">Senaste nytt hos oss</h2>
                <?php if ($senaste_nyheter->have_posts()) : while ($senaste_nyheter->have_posts()) : $senaste_nyheter->the_post();
                    $title = get_the_title();
                    $permalink = get_the_permalink();
                    ?>

                    <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link"><h4
                                class="nyheter_title card-title"><?php echo $title; ?></h4></a>
                    <p class="publish_date"><?php echo get_the_date(); ?></p>
                <?php
                    // end the inner loop, no reset
                endwhile; endif;
                wp_reset_postdata();
                ?>

                <p class="las-mer"><a href="/nyheter" title=">Läs alla våra intervjuer">Gå in till vår nyhetsrum
                        >></a></p>
            </div>
            <div class="aspekter-entry col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2 minImageHeight">
                <p class="text-white pl-4"><img class="senaste-nyhetsavsnittet_image img-fluid z-depth-2"
                                                src="<?php echo $senaste_nyhetsavsnittet_blid['url'] ?>"
                                                alt="Nyhetsavsnittet blid"/></p>


            </div>


        </div>
    </div>

</section>