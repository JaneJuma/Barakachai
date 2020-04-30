<?php
/*
 * Template Name: Single Career
 *
 */
get_header();
?>
<section>

	<div class="checkout-wrapper">

		<div class="table-top">
			<img src="http://digilab.ml/kerichogold/wp-content/uploads/2019/01/table-top-image.png">
			
			<?php 
			while(have_posts()): the_post(); 
			$the_Id = $post->ID;?>
			?>
			<div class="single-career-wrapper">
				<h2><?php the_title();?></h2>
				<?php $deadline = get_post_meta($the_Id, 'deadline', true); ?>
				<h6>Application deadline (<?php echo date('F j, Y', strtotime($deadline)); ?>)</h6>
				<?php the_content();?>

				<a href="mailto:info@kerichogold.co.ke">Apply</a>
			</div>
			<?php endwhile;

            wp_reset_query();

            ?>
	

		</div>
	</div>

</section>
<?php get_footer();?>