<?php
/*
 * Template Name: Single Blog
 *
 */
get_header();
?>
<div class="container">


	<!--=================== Banner Holder ===================-->
	<?php
	$id = get_the_ID();
	
	$banner = get_post_meta($id, 'banner', true);
	$img = wp_get_attachment_image_src($banner, 'full');
	?>
	<div class="banner_holder">
		<img src="<?php echo $img[0]; ?>">
	</div>
	<!--=================== Banner Holder ===================-->

	<!--=================== Mega menu ===================-->
		<div class="media_single_wrapper">
			<div class="single_wrapper">
				
				
				<?php 
				while(have_posts()): the_post(); 
				$the_Id = $post->ID;?>
					<span class="date"><?php the_date(); ?></span>
				
					<h4><?php the_title();?></h4>
					<?php the_content();?>

					
				
				<?php endwhile;

				wp_reset_query();

				?>
			

			</div>
			<div class="blog-categories">
				<h3>Recent Posts</h3>
				<ul>
					<?php
					$args = array(
						'post_type' => 'blog',
						'order' => 'DESC',
						'posts_per_page' => 4,
						'post__not_in'  => array( $post->ID ),
					);
					$blogs = new WP_Query($args);
					while( $blogs->have_posts()): $blogs->the_post();
					?>
					<li>
						<div class="content_wrapper">
							<h4><?php the_title(); ?></h4>
							<p><?php the_excerpt();?></p>
							<a href="<?php the_permalink();?>" class="rde_more">Read more</a>
						</div>
					</li>
					<?php endwhile;

					wp_reset_query();

					?>
				</ul>
			</div>
		</div>
	<!--=================== Mega menu ===================-->

</div>

<?php get_footer();?>