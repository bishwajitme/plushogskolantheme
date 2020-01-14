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

	<div id="primary" class="content-area col-12 col-md-8">

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
        <div class="row">

            <?php

            $relPosts = get_field('acticleCards');
            //var_dump($relPosts);

            if ($relPosts):
                foreach ($relPosts as $p): // variable must NOT be called $post (IMPORTANT)
                    $featuredImage = get_field('featuredImage', $p->ID);
                    $excerpt = get_field('excerpt', $p->ID);
                    $title = get_the_title($p->ID);
                    $permalink = get_the_permalink($p->ID);
                    $publishdate = get_the_date('m/d/Y', $p->ID);
                    $postType = get_post_type($p->ID);
                    if ($postType == 'nyhet') {
                        $term_obj_list = get_the_terms($p->ID, 'nyhetstyp');
                        $entityType = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    } else {
                        $entityType = $postType;
                    }
                    include('components/post-item.php');
                    ?>
                <?php endforeach; ?>

            <?php endif; ?>


        </div>

    </div>
<?php get_footer();