<?php
/*
 *
 *  Template Name: Cart
 */
get_header();?>


<section>

	<div class="cart-wrapper">

		<div class="table-top">
			<img src="<?php bloginfo('template_url');?>/assets/images/table-top-image.png">
            <?php
            while ( have_posts() ) : the_post();

                the_content();

            endwhile;

            ?>
		</div>
	</div>

</section>

<?php get_footer();?>
