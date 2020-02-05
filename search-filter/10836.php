<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */


if ($query->have_posts())
{
?>


<div class='search-filter-results-list'>
    <div class="container">
        <div class="row">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                $featuredImage = get_field('featuredImage');
                $excerpt = get_field('excerpt');
                $title = get_the_title();
                $permalink = get_the_permalink();
                $term_obj_list = get_the_terms(get_the_ID(), 'nyhetstyp');
                $entityType = join(', ', wp_list_pluck($term_obj_list, 'name'));
                $publishdate = get_the_date( 'm/d/Y');
                include(get_template_directory().'/components/post-item.php');
                ?>


                <?php
            }
            echo "</div></div></div>";
            }

            else {
                ?>
                <div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
                    
                </div>
                <?php
            }
            ?>
