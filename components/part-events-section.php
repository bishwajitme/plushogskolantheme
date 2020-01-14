<?php

$args = array(
    'post_type' => 'nyhet',
    'posts_per_page' => 3,
    'tax_query' => array(
        array(
            'taxonomy' => 'nyhetstyp',
            'field' => 'slug',
            'terms' => 'event',
        )
    ),

);
$senaste_nyheter = new WP_Query($args);
?>

<section class="mot_vara_studentavdelning pt-4 pb-4 mt-4 mb-4 clearfix">

    <div class="container">
        <h2 class="section_title text-center pt-2 pb-2">Kommande event</h2>
        <div class="row">


            <?php if ($senaste_nyheter->have_posts()) : while ($senaste_nyheter->have_posts()) : $senaste_nyheter->the_post();
                $featuredImage = get_field('featuredImage');
                $excerpt = get_field('excerpt');
                $title = get_the_title();
                $permalink = get_the_permalink();
                $publishdate = get_the_date( 'm/d/Y', $senaste_nyheter->ID);
                $entityType = 'Event';
                include('post-item.php');
                ?>


            <?php
                // end the inner loop, no reset
            endwhile; endif;
            wp_reset_postdata();
            ?>


        </div>
    </div>

</section>