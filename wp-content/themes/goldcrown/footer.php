<footer>
    <div class="footer-column">
        <div class="footer-logo">
            <a href="index.html"><img src="<?php bloginfo('template_url');?>/assets/images/header-logo.png"></a>
        </div>
        <ul class="footer-social">
            <li><a href="https://www.facebook.com/kerichogold/" target="_blank" class="fa fa-facebook"></a></li>
            <li><a href="https://twitter.com/attitude_teas" target="_blank" class="fa fa-twitter"></a></li>
            <li><a href="https://www.youtube.com/channel/UCX02RnH3tPvYsouy_864wsA" target="_blank" class="fa fa-youtube"></a></li>
            <li><a href="https://www.instagram.com/attitudeteas/?hl=en" target="_blank" class="fa fa-instagram"></a></li>
        </ul>
        
        <div class="payment-logos">
            <h5>YOU CAN BUY WITH</h5>
            <ul>
                <li><img src="<?php bloginfo('template_url');?>/assets/images/payment1.png"></li>
                <li><img src="<?php bloginfo('template_url');?>/assets/images/payment2.png"></li>
                <li><img src="<?php bloginfo('template_url');?>/assets/images/payment3.png"></li>
                <li><img src="<?php bloginfo('template_url');?>/assets/images/payment4.png"></li>
                <li><img src="<?php bloginfo('template_url');?>/assets/images/payment5.png"></li>
            </ul>
        </div>
        
    </div>
    <div class="footer-column">
        <div class="border-top"></div>
        <h5>HELP</h5>
        <ul>
            <!--<li><a href="#">Gold Points</a></li>-->
             <li><a href="<?php echo esc_url(home_url('/'));?>gold-points">Gold Points</a></li>
            <li><a href="<?php echo esc_url(home_url('/'));?>faqs">FAQs</a></li>
            <li><a href="<?php echo esc_url(home_url('/'));?>terms">Terms of Service</a></li>
            <!--<li><a href="<?php echo esc_url(home_url('/'));?>privacy">Privacy Policy</a></li>-->
            <li><a href="<?php echo esc_url(home_url('/'));?>refund-policy">Refund Policy</a></li>
            <li><a href="<?php echo esc_url(home_url('/'));?>delivery-policy">Delivery Policy</a></li>
            <li><a href="<?php echo esc_url(home_url('/'));?>careers">Careers</a></li>
        </ul>
        
        
    </div>
    <div class="footer-column">
        
        <div class="footer-contact">
            <div class="border-top"></div>
            <h5>CONTACTS</h5>
            <ul>
                <li><a href="mailto:info@kerichogold.co.ke">info@goldcrown.co.ke</a></li>
            </ul>
        </div>
        
        <div class="footer-contact">
            <div class="border-top"></div>
            <h5>PHONE NUMBER</h5>
            <ul>
                <li><a href="callto:0736999333">+254 722 205 583 / </a> <a href="callto:0724257222">  +254 724 257 222</a></li>
                
            </ul>
        </div>
        
        
        <!--<div class="footer-contact">-->
        <!--    <div class="border-top"></div>-->
        <!--    <h5>LOCATION</h5>-->
        <!--    <ul>-->
        <!--        <li><a href="<?php echo esc_url(home_url('/'));?>contact">Kenya Tea Packers</a></li>-->
        <!--    </ul>-->
        <!--</div>-->
        <!--<div class="border-top"></div>-->
        <!--<h5>P.O BOX</h5>-->
        <!--<ul>-->
        <!--    <li>55082-00200 - Nairobi, Kenya</li>-->
        <!--</ul>-->
    </div>
    <div class="copyright">
        <p>&copy; Barakachai <?php date('Y');?></p>
    </div>
</footer>
</div>
<!--script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/jquery-3.2.1.js"></script-->
<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/jquery.nice-select.js"></script>
<!--  Disabled to Fix Events and Display -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/icheck.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/script.js"></script>

<!--  shipping cost spinner -->
<script type="text/javascript">
function loadContentSpinner()
{
    document.getElementById("loader").style.display = "block";
    document.getElementById("loading-text").style.display = "block";
}   
</script>
<?php wp_footer(); ?>
</body>
</html>