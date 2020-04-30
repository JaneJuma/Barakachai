<?php get_header();?>

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

//exclude baraka-chai
foreach($all_categories as $key => $item) 
{
  if ( $item->slug === "baraka-chai" ) 
  {
    unset($all_categories[$key]);
  }
}
?>

	
<script>
    function myFunction(id,pid) {
        var checkBox = document.getElementById(id);
        var text = document.getElementById(pid);
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
           text.style.display = "none";
        }
    }
</script>
<style>
    p.text1 a.active{
        color: #fff !important;
        font-weight: bold !important;
        background-color: #000 !important;
    }
	
	
	
	.shop-banner{
		
	}
	
</style>
<section>
    <div class="shop-wrapper">
        <div class="shop-smoke-wrapper">
		
		<?php
		//manually capture tea variant banners
		$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
		$termId = $term->term_id;
		
		$banner = get_term_meta($termId, 'categoryimage_attachment', true);
		$img= wp_get_attachment_image_src($banner, 'full'); 
				
		if(is_product_category( 'attitude-teas-range' ))
		{
			?>
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else if(is_product_category( 'black-tea-range' ))
		{
			?>
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else if(is_product_category( 'masala-tea' )){
			?>
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else if(is_product_category( 'tangawizi-tea' )){
			?>
			<!--div class="shop-banner"  style = "padding: 10% 0; background-image: url(<?php //echo $img[0]; ?>);"-->
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else if(is_product_category( 'speciality-teas-range' )){
			?>
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else if(is_product()){
			$id = get_the_ID();
			
			$banner = get_post_meta($id, 'banner', true);
			$img = wp_get_attachment_image_src($banner, 'full');
			?>
			<div class="shop-banner">
			<img src="<?php echo $img[0]; ?>">
			<?php
		}else
		{
		?>
            <div class="shop-banner"  >
			<img src="<?php echo get_the_post_thumbnail_url(1116, 'full'); ?>">
			<?php
		}
			?>
               <!--  <img src="images/tea-cup.png"> -->
                <!--=================== tea smoke ====================-->
                <div id="wrap">
                    <div class="steam" id="steam-one"></div>
                    <div class="steam" id="steam-two"></div>
                    <div class="steam" id="steam-three"></div>
                    <div class="steam" id="steam-four"></div>
                    <?php
		            if(is_shop())
		            {
		            ?>
                    
					<?php
					$cupPostId = get_post_meta(1116, 'cup_image', true);
										
					global $wpdb;
					$shopCupImage = $wpdb->get_var( "SELECT guid FROM ".$wpdb->prefix."posts WHERE ID = " . $cupPostId );
					?>
					<div id="cup" style="background-image:<?php echo $shopCupImage; ?>">
					
                    <?php
		            }else if(!is_product_category())
		            {
		            ?>
                    <div id="cup" style="background-image:none" >
                    <?php
		            }else{
		            ?>
                    <div class="cup" style="background-image:none" >
			        <?php
		            }
			        ?>
		           
                        <div id="cup-body">
                            <div id="cup-shade"></div>
                        </div>
                        <div id="cup-handle"></div>
                    </div>
                    <div id="shadow"></div>
                </div>
                <div class="shop-banner-caption">
                    <img src="<?php bloginfo('template_url');?>/assets/images/offer.png">
                    <h5>HURRY WHILE STOCKS LAST</h5>
                    <a href="single-tea.html">Place Order</a>
                </div>
            </div>
            <!--=================== tea smoke ====================-->
        </div>
        <div class="tea-wrapper">
            <div class="tea-filter">
                <h6>FILTER BY</h6>
                <ul id="accordion" class="tea-accordion">
                    <li>
                        <div class="link3"><i class="fa fa-angle-down"></i>Brands</div>
                        <div class="submenu3">
                            <!--<p>                                -->
                            <!--    <label for="myCheck1"><input type="checkbox" id="myCheck1"> Kericho Gold</label> -->
                            <!--</p>    -->
                            <p>                            
                               <label for="myCheck2"><input type="checkbox" id="myCheck2"> Baraka Chai</label>
                           </p>
                        </div>
                    </li>
                    <li>
                        <div class="link3"><i class="fa fa-angle-down"></i>Products</div>
                        <div class="submenu3">
							<?php 
							$current_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
							?>
							<?php
							foreach($all_categories as $category):
							
							if($current_url == get_site_url().'/product-category/'.$category->slug.'/')
							{
								$class = 'kericho-variant-active';
							}
							else
							{
								$class = '';
							}
							
							?>
								<p class="text1"><a class="kericho-tea-variant <?php echo $class;  ?>" data-cat-slug="<?php echo $category->slug; ?>" href="<?php echo get_site_url().'/product-category/'.$category->slug; ?>"><?php echo $category->name  ?></a></p>
							<?php
							endforeach;
							?>
							
						
                            <!-- 
							<p class="text2"><a href="../product/tangawizi-tea/">Tangawizi Tea</a></p>
                                <p class="text2"><a href="../product/string-and-tag-teabags/"> String & Tag Teabags</a></p>
							    <p class="text2"><a href="../product/enveloped-teabags/">Enveloped Teabags</a></p>
                
                                <p class="text2"><a href="../product/round-tagless-teabags/">Round Tagless Teabags</a></p>
-->
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tea-shop">
                        <?php woocommerce_content(); ?>
            </div>
        </div>
        <div class="free-shipping advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/free.png">
            <h3>FREE SHIPPING</h3>
            <p>Free Shipping on World wide Order Over $99.</p>
        </div>
        <div class="trusted advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/trusted.png">
            <h3>TRUSTED PAY</h3>
            <p>100% Payment Protection & Easy Return</p>
        </div>
        <div class="secured advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/secured.png">
            <h3>SECURED PAYMENT</h3>
            <p>All Major Credit & Debit Cards Accepted</p>
        </div>
        <div class="free-shipping mobile-advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/free.png">
            <h3>FREE SHIPPING</h3>
            <p>Free Shipping on World wide Order Over $99.</p>
        </div>
        <div class="trusted mobile-advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/trusted.png">
            <h3>TRUSTED PAY</h3>
            <p>100% Payment Protection & Easy Return</p>
        </div>
        <div class="secured mobile-advantage">
            <img src="<?php bloginfo('template_url');?>/assets/images/secured.png">
            <h3>SECURED PAYMENT</h3>
            <p>All Major Credit & Debit Cards Accepted</p>
        </div>
    </div>
</section>
<script type="text/javascript">

    var product_categories = ['uncategorized',
        'attitude-teas-range',
        'baraka-chai',
        'black-tea-range',
        'health-and-wellness-range',
        'kericho-gold',
        'luxury-pyramid-teas-range',
        'speciality-range'];

    var baraka_chai_categories = [
        'uncategorized',
        'baraka-chai'];

    var kericho_gold_categories = [
        'attitude-teas-range',
        'black-tea-range',
        'health-and-wellness-range',
        'kericho-gold',
        'luxury-pyramid-teas-range',
        'speciality-range'];

    jQuery(function(){
        $('#myCheck1').prop('checked',true);
        $('#myCheck2').prop('checked',false);
        $(document).on('change','#myCheck1',function(){
            if($('#myCheck1').prop('checked')){
               $('p.text1').slideDown();
                $.each(kericho_gold_categories,function(index,cat){
                    $('.product_cat-'+cat).slideDown();
                });
            } else {
                $('p.text1').slideUp();
                $.each(kericho_gold_categories,function(index,cat){
                    $('.product_cat-'+cat).slideUp();
                });
            }
        });
        $(document).on('change','#myCheck2',function(){
            if($('#myCheck2').prop('checked')){
                $('p.text2').slideDown();
                $.each(baraka_chai_categories,function(index,cat){
                    $('.product_cat-'+cat).slideDown();
                });
            } else {
                $('p.text2').slideUp();
                $.each(baraka_chai_categories,function(index,cat){
                    $('.product_cat-'+cat).slideUp();
                });
            }
        });
        $(document).ready(function() {
            $("[href]").each(function() {
                if (this.href == window.location.href) {
                    $(this).addClass("active");
                }
            });
        });
    })
        
    </script>
<?php get_footer();?>