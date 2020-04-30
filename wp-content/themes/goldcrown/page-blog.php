<?php
/*
 *  Template Name: Blogs
 */

get_header();?>

<div class="container">

	<!--=================== Latest_News ===================-->
	<div class="Latest_News spc">
		<ul>
		<?php 
			$args = array(
				'post_type' => 'blog',
				'order' => 'ASC',
				'post_per_page' => -1
			);
			
			$blogs = new WP_Query( $args);
			?>
			<?php
			while ( $blogs->have_posts()): $blogs->the_post();
			?>
			<li>
				<div class="image_holder">
				<?php
				if(has_post_thumbnail()){
					$thumbs=wp_get_attachment_image_src(get_post_thumbnail_id(),"full",false);
					$img =$thumbs[0];
					?>
					<img src="<?php echo $img;?>">
					<?php
				}
				?>
				</div>
				<div class="content_wrapper">
					<h4><?php the_title(); ?></h4>
					<p><?php the_excerpt();?></p>
					<a href="<?php the_permalink();?>" class="rde_more">Read more</a>
				</div>
			</li>	
			<?php
			endwhile;
			wp_reset_query();
			?>			
		</ul>
	</div>
	<!--=================== Latest_News ===================-->


</div>

<?php get_footer();?>