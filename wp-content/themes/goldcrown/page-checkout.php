<?php
/*
 *
 *  Template Name: Checkout
 */
get_header();?>
<section>

    <div class="checkout-wrapper">

        <div class="table-top">
            <img src="<?php bloginfo('template_url');?>/assets/images/table-top-image.png">

            <div class="billing-wrapper">
                <?php
                while ( have_posts() ) : the_post();

                    the_content();

                endwhile;

                ?>
            </div>
        </div>
    </div>

</section>

<?php get_footer();?>
