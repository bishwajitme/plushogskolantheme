<?php
/**
 *  Template Name: Location Page
 *
 * @package plushogskolan
 */

get_header();
?>

<div class="row">
	<div id="primary" class="content-area col-12">
		<main id="main" class="site-main">
            <div class="container">

                <div class="row">
                   <?php
                   while (have_posts()) :
                    the_post();
                    $map_iframe_code = get_field('map_iframe_code');
                    ?>


                    <div class="col-md-6 col-sm-12">
                      <?php echo $map_iframe_code; ?>
                        
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <?php
                        get_template_part('template-parts/content', 'page');

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
    <h3 class="location_title text-center mt-5 pt-4 pb-2">Här finns vi</h3>
    <?php
    $args = array(
     'post_type' => 'studieort',
     'orderby' => 'title',
     'order'   => 'ASC',

 );
    $studieorter = new WP_Query($args);
    ?>

    <section class="studieorter pt-4 pb-4 mt-3 mb-5">

     <div class="container">

      <div class="row">

       <?php if ($studieorter->have_posts()) : while ($studieorter->have_posts()) : $studieorter->the_post();
        $featuredImage = get_field("featuredImage");
        $excerpt = get_field('excerpt');
        $title = get_the_title();
        $permalink = get_the_permalink()

        ?>
        <div class="event-entry col-lg-4 col-md-6 col-sm-12">
           <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="full_box_link"></a>
         <div class="hovereffect">
          <img src="<?php echo $featuredImage['url']; ?>" class="img-responsive" class="card-img-top"alt="<?php echo $title; ?> Featured blid"> 
          <div class="overlay d-flex justify-content-center align-items-center">
           <h4 class="nyheter_title"><a
               href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a>
           </h4>
       </div>
   </div>

</div>


<?php
                                // end the inner loop, no reset
endwhile; endif;
wp_reset_postdata();
?>

</div>
</div>


</div>
</div>

</section>

</main><!-- #main -->
</div><!-- #primary -->

</div><!-- #row -->

<?php get_footer();