<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="wraps">


<div class="prod_decrip">
    
    
    <div class="drecp_img">
        <div class="prod_img_wrapper">
           <?php
        		/**
        		 * Hook: woocommerce_before_single_product_summary.
        		 *
        		 */
        		do_action( 'woocommerce_before_single_product_summary' );
        	?>
			
			<!-- display variable image -->
		<?php
        // get the product variations
        if ( $product->get_type() == 'variable' ) {
            $product_variations = $product->get_available_variations();
            
            if ( !empty( $product_variations ) ) {
                ?>
            <div class="product-variation-images">
            <?php
            foreach($product_variations as $product_variation) {
    			/*echo '<pre>';
    			var_dump($product_variation);
    			echo '</pre>';exit;*/
    			if( isset($product_variation['attributes']['attribute_pa_weight']) ){
    			// get the slug of the variation - weight
                $product_attribute_name = $product_variation['attributes']['attribute_pa_weight'];
                ?>
                <div class="product-variation-image product-variation-<?php echo $product_attribute_name ?>" id="product-variation-<?php echo $product_variation['variation_id']; ?>" data-attribute="<?php echo $product_attribute_name ?>">
                <img src="<?php echo $product_variation['image']['url']; ?>" alt="">
                </div><!-- #product-variation-image -->
    			<?php } ?>
    			<?php if( isset($product_variation['attributes']['attribute_pa_teabag-pieces']) ){
    			// get the slug of the variation - weight
                $product_attribute_name = $product_variation['attributes']['attribute_pa_teabag-pieces'];
                ?>
                <div class="product-variation-image product-variation-<?php echo $product_attribute_name ?>" id="product-variation-<?php echo $product_variation['variation_id']; ?>" data-attribute="<?php echo $product_attribute_name ?>">
                <img src="<?php echo $product_variation['image']['url']; ?>" alt="">
                </div><!-- #product-variation-image -->
    			<?php } ?>
            <?php } ?>
            </div>
            <?php } ?>
        <?php } ?>
		<!-- end -->
			
			
        </div>
        <div class="cal2_wrapper">
            <ul>
                <li class="reciepe-list">
					<a href="#" class="reciepe">recipe</a>
					<div id="popup1" class="overlay">
						<!--div class="popup">
							<h2>Recipe</h2>
							<a class="close" href="#">&times;</a>
							<div class="recipe-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							</div>
						</div-->
					</div>
				</li>
                <li class="frnd-list">
                    
                    <a class="frnd fa fa-share-alt"></a>
                    
                    <ul class="share-social-icons">
                        <a class="fa fa-facebook" title="Click to share this product on Facebook" href="https://www.facebook.com/sharer?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank" rel="noopener">
                        <a class="fa fa-twitter" title="Click to share this product on Twitter" href="http://twitter.com/intent/tweet?text= <?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                        <a class="fa fa-whatsapp" title="Click to share this product on Whatsapp" href="https://api.whatsapp.com/send?phone=&text= <?php the_title(); ?>&url=<?php the_permalink(); ?>$s" target="_blank" rel="noopener"></a>
                    </ul>
					
					

                    
                    </li>
            </ul>
        </div>
    </div>
    
    
    <div class="drecp_content">
		
        <!-- <h5 class="mini_header">Description</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

        <h5 class="mini_header">Luxury Ingredeints</h5>
        <ul class="luxury_ingredeints">
            <li>Tea (caelia sinesis)</li>
            <li>Cinamon</li>
            <li>Oranges</li>
            <li>Rose petal natural</li>
        </ul>

        <h5 class="mini_header">Health Benefits</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p> -->
		<?php the_content(); ?>
		 <?php //echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
		

    </div>
    
    
    <div class="separator">
    <!--<h4>speciality infusion</h4>-->
    <!--<p class="prod_name">Lime & Lemon</p>-->
    <div class="single-tea-wrapper">
<div class="single-tea-name">


    
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
	
		?>
	
	
		<div class="single-tea-description"></div>
	</div>

</div>
</div>
    
</div>
</div>

<div class="related_tea">
    <h1>related teas</h1>
	
	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	
	
	
    <!--<ul class="products columns-4">

        <li>
            <div class="shop-tea-wrapper">
        	<a href="http://digilab.co.ke/gold/product/baraka-chai/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="55" height="83" src="http://digilab.co.ke/gold/wp-content/uploads/2018/06/cart1.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""><h2 class="woocommerce-loop-product__title">Baraka Chai</h2>	</a></div><a href="http://digilab.co.ke/gold/product/baraka-chai/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	</a><div class="prod-description"><a href="http://digilab.co.ke/gold/product/baraka-chai/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	    
        	<span class="price prize"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">KShs</span>200.00</span></span>
        </a><a href="/gold/shop/?add-to-cart=15" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart prod_cta " data-product_id="15" data-product_sku="" aria-label="Add “Baraka Chai” to your cart" rel="nofollow">Add to cart</a>	</div>
        </li>
        <li>
            <div class="shop-tea-wrapper">
        	<a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="284" height="262" src="http://digilab.co.ke/gold/wp-content/uploads/2018/06/tea1.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""><h2 class="woocommerce-loop-product__title">Kericho Gold 100g Leaf Tea</h2>	</a></div><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	</a><div class="prod-description"><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	    
        	<span class="price prize"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">KShs</span>73.00</span></span>
        </a><a href="/gold/shop/?add-to-cart=37" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart prod_cta " data-product_id="37" data-product_sku="" aria-label="Add “Kericho Gold 100g Leaf Tea” to your cart" rel="nofollow">Add to cart</a>	</div>
        </li>
        
        <li>
            <div class="shop-tea-wrapper">
        	<a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="284" height="262" src="http://digilab.co.ke/gold/wp-content/uploads/2018/06/tea1.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""><h2 class="woocommerce-loop-product__title">Kericho Gold 100g Leaf Tea</h2>	</a></div><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	</a><div class="prod-description"><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	    
        	<span class="price prize"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">KShs</span>73.00</span></span>
        </a><a href="/gold/shop/?add-to-cart=37" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart prod_cta " data-product_id="37" data-product_sku="" aria-label="Add “Kericho Gold 100g Leaf Tea” to your cart" rel="nofollow">Add to cart</a>	</div>
        </li>
        
        <li>
            <div class="shop-tea-wrapper">
        	<a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="284" height="262" src="http://digilab.co.ke/gold/wp-content/uploads/2018/06/tea1.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""><h2 class="woocommerce-loop-product__title">Kericho Gold 100g Leaf Tea</h2>	</a></div><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	</a><div class="prod-description"><a href="http://digilab.co.ke/gold/product/kericho-gold-100g-leaf-tea/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        	    
        	<span class="price prize"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">KShs</span>73.00</span></span>
        </a><a href="/gold/shop/?add-to-cart=37" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart prod_cta " data-product_id="37" data-product_sku="" aria-label="Add “Kericho Gold 100g Leaf Tea” to your cart" rel="nofollow">Add to cart</a>	</div>
        </li>
									
	</ul>-->
	
</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
