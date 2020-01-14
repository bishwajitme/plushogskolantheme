<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plushogskolan
 */

get_header();
?>
<div  class="row">
	<div id="primary" class="content-area col-12 col-md-8">
		<main id="main" class="site-main pr-3">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


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
