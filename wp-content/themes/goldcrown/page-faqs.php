<?php


get_header();
?>
<section>
    <div class="checkout-wrapper">
        
        <figure class="swing">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-tea-bag.png">
        </figure>
        
        <div class="swing-leaf">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-leaf.png">
        </div>
            
        <div class="table-top">
            <h1>FAQs</h1>
            

            <div class="faqs-wrapper">
                <ul id="accordion" class="faqs-accordion">
                   
                        <?php 
            			$args = array(
            				'post_type' => 'faq',
            				'order' => 'ASC',
            				'post_per_page' => -1
            			);
            			
            			$faq = new WP_Query( $args);
            			?>
            			<?php
            			while ( $faq->have_posts()): $faq->the_post();
            			?> 
                            
                
                    <li>
                        <div class="link2 f-link2"><i class="fa fa-angle-down"></i><?php the_title(); ?></div>
                        <div class="submenu2">
                            <p><?php the_content(); ?></p>
                        </div>
                    </li>
                    
                    
                    
                    <?php
        			endwhile;
        			wp_reset_query();
        			?>			
                            
                </ul>
            </div>
        </div>
        </div>
    </div>

</section>


<?php get_footer();?>
