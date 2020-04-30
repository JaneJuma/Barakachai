<?php
/*----------Search Results Show Here -----*/

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="contact-wrapper">
				<div class="contact-info">
					<div class="in-touch">
						<h1>Search Results</h1>
					</div>

					<div class="contact-details" style="padding:40px 20px;">

						<?php
							global $query_string;
							$query_args = explode("&", $query_string);
							$search_query = array();

							foreach($query_args as $key => $string) {
							  $query_split = explode("=", $string);
							  $search_query[$query_split[0]] = urldecode($query_split[1]);
							} // foreach

							$the_query = new WP_Query($search_query);
							if ( $the_query->have_posts() ) : 
							?>
							<!-- the loop -->

							<ul>    
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<h5>=> <?php the_title(); ?></h5>
									</a>
								</li>   
							<?php endwhile; ?>
							</ul>
							<!-- end of the loop -->

							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php _e( 'Sorry, no posts matched your keyword. Please try again other keywords.' ); ?></p>
						<?php endif; ?>

					</div>
				</div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>