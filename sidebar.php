<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plushogskolan
 */


?>
<?php
if (wp_nav_menu( array( 'theme_location' => 'menu-1', 'echo' => false, 'sub_menu' => true )) !== false || is_active_sidebar( 'sidebar-1' )) {
   ?>

<aside id="secondary" class="widget-area sidebar_menu col-12 col-lg-4">
<?php
wp_nav_menu( array(
  'theme_location' => 'menu-1',
  'sub_menu' => true,
  'show_parent' => true
) );
?>
	<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}
	 ?>
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
                    }
                    elseif($postType == 'page'){
                        $entityType = "Sida";
                    }
                    else {
                        $entityType = $postType;
                    }
                    ?>
                    <div class="event-entry col-12 easyanimator custom-content-card">
                         <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="full_box_link"></a>
    <div class="bg-light">
        <img src="<?php echo $featuredImage['url']; ?>" class="card-img-top" alt="<?php echo $title; ?> Featured blid">
        <h6 class="ff-label-wrapper custom"><?php echo $entityType; ?></h6>
        <div class="p-3 event-entry-text">
         <?php  if($postType != 'page'): ?>
            <p class="publish_date mb-2"><?php echo $publishdate; ?></p>
          <?php endif; ?>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link"><h4
                        class="nyheter_title card-title"><?php echo $title; ?></h4></a>
            <p class="card-text"><?php echo $excerpt ?></p>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="arrow_right_container"><span
                        class="icon-arrow-right2"></span></a>
        </div>
    </div>
</div>
                <?php endforeach; ?>

            <?php endif; ?>

             <?php
           if (have_rows('infoBlocks')) :

            while (have_rows('infoBlocks')) : the_row();

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
                    <div class="col-lg-12 col-12 mt-4 mb-4  siteBg <?php echo $link_color; ?>" style="background-image: url(<?php  echo $link_image; ?>)">
                        <div class="content-wrap pt-5 pb-5 pl-3 pr-3 text-white">
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
</aside><!-- #secondary -->
<?php }  ?>