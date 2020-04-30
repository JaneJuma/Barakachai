<?php
/*
 *  Template Name: Delivery Policy
 */

get_header();?>

<section>

    <div class="checkout-wrapper">
        
        <figure class="swing">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-tea-bag.png">
        </figure>
        
        <div class="swing-leaf">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-leaf.png">
        </div>

        <div class="table-top">
            <img src="<?php bloginfo('template_url');?>/assets/images/table-top-image.png">

            <div class="single-career-wrapper">
                <h2>DELIVERY POLICY</h2>
              
                <?php $content=apply_filters('the_content', get_post_field('post_content')); echo $content; ?>
               

               
               
             
            </div>
        </div>
    </div>

</section>


<?php get_footer();?>