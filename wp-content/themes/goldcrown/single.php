<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
 
if(in_category(18) ||in_category(21) || in_category(20) || in_category(22) || in_category(19) ){
    include(TEMPLATEPATH.'/page-variants.php');
    exit;
}


get_header(); ?>



<?php get_footer();?>
