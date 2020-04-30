<?php get_header()?>

<?php
//pull all product categories
$taxonomy     = 'product_cat';
$orderby      = 'name';  
$show_count   = 0;
$pad_counts   = 0;      
$hierarchical = 0;       
$title        = '';  
$empty        = 1;

$args = array(
	 'taxonomy'     => $taxonomy,
	 'orderby'      => $orderby,
	 'show_count'   => $show_count,
	 'pad_counts'   => $pad_counts,
	 'hierarchical' => $hierarchical,
	 'title_li'     => $title,
	 'hide_empty'   => $empty
);

//array_shift to purge uncategorized category
$all_categories = get_categories( $args );

//array_shift($all_categories);

//exclude gift-pack
foreach($all_categories as $key => $item) 
{
  if ( $item->slug === "gift-pack" || $item->slug === "baraka-chai" ) 
  {
    unset($all_categories[$key]);
  }
}
?>

<section>
    <div class="home-slider">
        <ul class="bxslider">
			<?php
			// $args = array(
				// 'post_type' => 'product',
				// 'order' => 'ASC',
				// 'posts_per_page' => -1
			// );
			// $products = new WP_Query($args);
			
			
			/*
			global $wpdb;
			$querystr = " SELECT $wpdb->posts.*, $wpdb->postmeta.meta_key, $wpdb->postmeta.meta_value  FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->postmeta.meta_key = 'promote_to_homepage' AND $wpdb->postmeta.meta_value = 'yes' AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'product' ";

			$products = $wpdb->get_results($querystr, OBJECT);
			*/
						
			foreach($all_categories as $category)
			{
				$banner = get_term_meta($category->term_id, 'categoryimage_attachment', true);
				$img= wp_get_attachment_image_src($banner, 'full'); 				
				?>
				<li>
					<img src="<?php echo $img[0]; ?>"/>
					<div class="slider-copy">
						<!--h1><?php //the_title(); ?></h1-->
						<!--p><?php //echo $short_description; ?></p-->
						<div class="read-more"><a href="<?php echo get_site_url().'/product-category/'.$category->slug; ?>">VIEW PRODUCTS</a></div>
					</div>
				</li>
				<?php
				
			}
			
			/*
			echo '<pre>';
			var_dump($products);
			echo '</pre>';
			exit;
			*/
			?>
            
        </ul>
    </div>

    <div class="who-we-are-wrapper">
        <div class="who-we-are">
            <div class="who-video-wrapper">
                <div class="inner-video-left">
                    <h5>Who we are</h5>
                    <p>The leading producer of a wide selection of fruits and herbal infusions that are naturally caffeine free.</p>
                    <a href="<?php echo esc_url(home_url('/'));?>about">Read More</a>
                </div>
                <div class="inner-video-right">
                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/UkoCqPnqlGM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="who-description">
            <ul>
                <li class="who1">
                    <h1>5</h1>
                    <p>Tea Variants</p>
                </li>
                <li class="who2">
                    <h1>52</h1>
                    <p>Tea blends</p>
                </li>
                <li class="who3">
                    <h1>1</h1>
                    <p>Company with shared Values, Mission & Vision</p>
                </li>
            </ul>
        </div>
    </div>

    <!--<div class="home-brief-about">-->
    <!--    <div class="brief-about mission">-->
    <!--        <h3>Mission</h3>-->
    <!--        <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>-->
    <!--    </div>-->
    <!--    <div class="brief-about vision">-->
    <!--        <h3>Vision</h3>-->
    <!--        <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>-->
    <!--    </div>-->
    <!--    <div class="brief-about values">-->
    <!--        <h3>Values</h3>-->
    <!--        <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="variant-wrapper">
        <h1>Tea variants</h1>
		<ul>
			<?php
			foreach($all_categories as $category):
				$image = get_term_meta($category->term_id, 'thumbnail_id', true);
				$img= wp_get_attachment_image_src($image, 'full');
			
			?>
				<li class="variant-bg1">
					<a href="<?php echo get_site_url().'/product-category/'.$category->slug; ?>">
						<img src="<?php echo $img[0]; ?>">
						<h5><?php echo $category->name; ?></h5>
					</a>
				</li>
			<?php
			endforeach;
			?>
		</ul>
    </div>
</section>


<?php get_footer(); ?>
