<?php
/*
 *
 *  Template Name: Which-Tea
 */

get_header();?>

<section>

    <div class="which-tea1-bg which-tea1-wrapper">
        <img src="<?php bloginfo('template_url');?>/assets/images/which-tea1-bg.png">
        
        
        <figure class="swing2">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-tea-bag.png">
        </figure>
        
        <div class="swing-leaf2">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-leaf2.png">
        </div>
        

        <div class="gender">
            <label>
                <input type="radio" name="fb" value="small" />
                <img src="<?php bloginfo('template_url');?>/assets/images/male.png">
                <h1>Male</h1>
            </label>

            <label>
                <input type="radio" name="fb" value="big"/>
                <img src="<?php bloginfo('template_url');?>/assets/images/female.png">
                <h1>Female</h1>
            </label>
        </div>

        <div class="next-1 next-tea">
            <!--<div class="skip">-->
            <!--    <a href="which-tea2.html">Skip</a>-->
            <!--</div>-->
            <div class="current1">
                <h5>1 / 5</h5>
            </div>
            <div class="continue">
                <a href="which-tea2.html">Continue</a>
            </div>
        </div>
    </div>

</section>
<?php get_footer(); ?>