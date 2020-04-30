<?php
/*
 * Template Name: Login
 *
 */
 /*
if(is_user_logged_in()){
  header("location: ".home_url('shop'));
  die;
}
*/

get_header();
?>
    <section>
        <div class="contact-wrapper">
            <div class="contact-info">
                <div class="in-touch">
					<?php if(!is_user_logged_in()){ ?>
                    <h1>Login</h1>
                    <p>Use your email address and yur password to log in and shop</p>
                    <?php }?>
                </div>

                <div class="contact-details">
                    <div class="contact-input">           
                   <?php 
                        echo do_shortcode('[woocommerce_my_account]');
                    ?>

                    </div>

                    <div class="contact-location">

                        <div>

                            <div class="place">

                                <span class="fa fa-home"></span>

                                <div class="span-details">
                                    <p>Gold Crown Beverages (K) Ltd.</p>
                                    <p>P.O Box 16453 Mombasa, Kenya.</p>
                                    <a href="mailto:info@goldcrown.co.ke">Email: info@goldcrown.co.ke</a>
                                </div>

                            </div>
                            <div class="call">
                                <span class="fa fa-volume-control-phone"></span>
                                <div class="span-details">
                                    <p>GOLD CROWN BEVERAGES (K) LTD ,</p>
                                    <p>Chandaria Industries Complex A, Warehouse No. 6 & 7.</p>
                                    <p>+254736999333/ +254724257222</p>
                                </div>
                            </div>
                            <div class="email">
                                <span class="fa fa-envelope"></span>
                                <div class="span-details">
                                    <a href="mailto:info@goldcrown.co.ke">Email: info@goldcrown.co.ke</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>