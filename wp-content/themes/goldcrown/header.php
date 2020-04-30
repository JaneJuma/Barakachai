<?php
/*
 * Header Page
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Baraka Chai</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url');?>/assets/css/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url');?>/assets/css/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url');?>/assets/css/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url');?>/assets/css/favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/square/red.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/green.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/assets/css/dev.css">
    <link rel="mask-icon" href="<?php bloginfo('template_url');?>/assets/css/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<body>
<div class="container">
    <header>
        <div class="header-links">
            <div class="logo-wrapper">
                <a href="http://drdragon.xyz/barakachai/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url');?>/assets/images/header-logo.png"></a>
            </div>
            <div class="header-navigation">
                <ul>
                    <li class="<?php if(is_page('shop')){ echo "active-link"; } ?>"><a href="<?php echo esc_url(home_url('/')); ?>">TEA SHOP</a></li>
                    <!--<li class="<?php if( is_product_category( 'gift-pack' ) ){ echo "active-link"; } ?>"><a href="<?php echo get_site_url().'/product-category/gift-pack'; ?>">LUXURY GIFT ITEMS</a></li>-->
                </ul>
            </div>
            <div class="header-social">
                <ul>
                    
                    <?php
                      global $wpdb;
                      if(!is_user_logged_in()){
                          ?>
                          <li><a href="<?php echo home_url('/login'); ?>">Log In</a></li>
                          <li><a href="<?php echo home_url('/login'); ?>">Register</a></li>
                          <?php
                      }
                      else{
                          $current_user = wp_get_current_user();
                          $role = $current_user->roles[0];

						  if ( $role == 'customer' ) {
							  
                          ?>
                          <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">Welcome <?php echo ucfirst($current_user->data->display_name); ?></a> &nbsp;&nbsp; <a href="<?php echo wp_logout_url(home_url()); ?>"> Log Out</a></li>
                          <?php }else{
							?>
							<li><a href="<?php echo admin_url(); ?>">Welcome <?php echo ucfirst($current_user->data->display_name); ?></a> &nbsp;&nbsp;<a href="<?php echo wp_logout_url(home_url()); ?>"> Log Out</a></li>
							<?php	
						  }
                      }
                    ?>
                    
                    
                    
                    <li><a href="<?php echo esc_url(home_url('/'));?>cart" class="fa fa-cart-arrow-down link-with-bg"><span><?php echo $_cartQty = count( WC()->cart->get_cart() );?></span></a></li>
                   
                    <li><button class="search-icon fa fa-search link-with-bg" type="submit"></button></li>
                </ul>
            </div>
            
        </div>
        
        <div class="mobile-navigation">
            <div class="visible-mobile">
                <div class="mobile-logo-wrapper">
                    <a href="http://www.kerichogold.com" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url');?>/assets/images/header-logo.png"></a>
                </div>
                <i class="drop-bars fa fa-bars"></i>
                
                <li><a href="<?php echo esc_url(home_url('/'));?>cart" class="fa fa-cart-arrow-down link-with-bg"><span><?php echo $_cartQty = count( WC()->cart->get_cart() );?></span></a></li>
                
                
            </div>

            <div class="hidden-mobile">
                <ul class="mobile-nav-links">
                    <li class="<?php if(is_page('shop')){ echo "active-mobile"; } ?>"><a href="<?php echo esc_url(home_url('/')); ?>">TEA SHOP</a></li>
                    <!--<li class="<?php if(is_page('which-tea')){ echo "active-mobile"; } ?>"><a href="<?php echo esc_url(home_url('/'));?>which-tea">WHICH TEA ARE YOU?</a></li>-->
					<li class="<?php if( is_product_category( 'gift-pack' ) ){ echo "active-mobile"; } ?>"><a href="<?php echo get_site_url().'/product-category/gift-pack'; ?>">LUXURY GIFT ITEMS</a></li>
                    
                </ul>
                <div class="header-social">
                <ul>
                    
                    <?php
                      global $wpdb;
                      if(!is_user_logged_in()){
                          ?>
                          <li><a href="<?php echo home_url('/login'); ?>">Log In</a></li>
                          <li><a href="<?php echo home_url('/login'); ?>">Register</a></li>
                          <?php
                      }
                      else{
                          $current_user = wp_get_current_user();
						  $role = $current_user->roles[0];

						  if ( $role == 'customer' ) {
							  
                          ?>
                          <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">Welcome <?php echo ucfirst($current_user->data->display_name); ?></a> &nbsp;&nbsp; <a href="<?php echo wp_logout_url(home_url()); ?>"> Log Out</a></li>
                          <?php }else{
							?>
							<li><a href="<?php echo admin_url(); ?>">Welcome <?php echo ucfirst($current_user->data->display_name); ?></a> &nbsp;&nbsp;<a href="<?php echo wp_logout_url(home_url()); ?>"> Log Out</a></li>
							<?php	
						  }
                      }
                    ?>
                    
                </ul>
            </div>

                <div  class="search-wrap">
                    <form action="#" method="post">
                        <input type="search" placeholder="Search..." />
                        <button class="search-icon2 fa fa-search" type="submit"></button>
                    </form>
                </div>
            </div>
            	
            	
        </div>
        
        <div  class="search-wrap">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <input type="search" placeholder="Search..." value="" name="s" id="s" />
                <button class="search-icon2 fa fa-search" type="submit" id="searchsubmit" value="Search"></button>
            </form>
        </div>
    </header>
	<script type="text/javascript">
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>