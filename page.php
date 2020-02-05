<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plushogskolan
 */

get_header();
?>

<div  class="row">

	<div id="primary" class="content-area col-12 col-lg-8">

		<main id="main" class="site-main pr-5">


		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		
</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
?>
</div><!-- #row -->
    </div><!-- #content -->

    <!--
        ==============================*************===========================
        Relaterat section
        ==============================*************===========================
        -->
    <div class="extra-content  mt-4 mb-4 pt-4 pb-4">
    <div class="container">
        

         <?php
                    if (have_rows('infoBlocksBottom')) :

                        while (have_rows('infoBlocksBottom')) : the_row();

                            if (get_row_layout() == 'internalLink' || get_row_layout() == 'externalLink') :
                                $link_title = get_sub_field('title');
                                $link_excerpt = get_sub_field('excerpt');
                                $link_linkUrl = get_sub_field('linkUrl');
                                $link_image = get_sub_field('image');
                                if($link_image){
                                    $link_image = $link_image['url'];
                                }
                                else {
                                    $link_image = '';
                                }

                                $link_color = get_sub_field('color'); ?>

                                <div class="row">
                                    <div class="col-lg-12 col-12 mt-4 mb-4 siteBg <?php echo $link_color; ?>" style="background-image: url(<?php  echo $link_image; ?>)">
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



    </div>
<?php get_footer();