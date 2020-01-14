<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plushogskolan
 */
$featuredImage = get_field('featuredImage');
$excerpt = get_field('excerpt');
$title = get_the_title();
$permalink = get_the_permalink();
$publishdate = get_the_date( 'm/d/Y');
$postType = get_post_type(get_the_ID());

if($postType == 'nyhet'){
    $term_obj_list = get_the_terms(get_the_ID(), 'nyhetstyp');
    $entityType = join(', ', wp_list_pluck($term_obj_list, 'name'));
}
elseif($postType == 'page'){
    $entityType = "Sida";
    }
else{
    $entityType = $postType;
}
include(get_template_directory().'/components/post-item.php');
?>


