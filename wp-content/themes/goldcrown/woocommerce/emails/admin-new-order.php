<?php
/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.5.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 /**
  * @hooked WC_Emails::email_header() Output the email header
  */
 // do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
 
 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		<style>
		html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, ul, li {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    background: transparent;
    text-decoration:none;
    quotes:none;
    list-style:none;
}
html, body {
  height:100%;
}
body{
    margin:0 ;
    padding:0;
    line-height:1;
    -webkit-text-size-adjust:none;
}
::-moz-selection { /* Code for Firefox */
    color: #ffffff;
    background: #000000;
}
::selection {
    color: #fecc04;
    background: #000000;
}
article, aside, footer, header, hgroup, nav, section, figure, figcaption{display:block; margin:0;}
*{-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}
input,textarea{-webkit-border-radius:0;border-radius:0;font-family: 'latomedium', sans-serif;}
input[type=submit],
input[type=button]{-webkit-appearance:none;}
button{font-family: 'latomedium', sans-serif;}
blockquote:before, blockquote:after, q:before, q:after{content: '';content:none;}
:focus{outline:0;}
::-moz-focus-inner {border:0;}
ins{text-decoration:none;}
del{text-decoration:line-through;}
table{border-collapse:collapse;border-spacing:0;}
*, *:after, *:before {
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin: 0;
    padding: 0;
}
a{
    transition: all 0.9s ease;
    outline:none;
    text-decoration: none;
    font-family: 'latomedium', sans-serif;
}
.clearfloat{ clear:both;}
body h1{ font-size:32px;font-family: 'latoblack', sans-serif;}
body h2{ font-size:20px;font-family: 'latoblack', sans-serif;}
body h3{ font-size:18px;font-family: 'latoblack', sans-serif;}
body h4{ font-size:16px;font-family: 'latobold', sans-serif;}
body h5{ font-size:14px;font-family: 'latobold', sans-serif;}
body h6{font-size: 0.9em;font-family: 'latobold', sans-serif;}
body p{
    font-size:13px;
    line-height:normal;
    font-weight:300;
    font-family: 'latomedium', sans-serif;
}
img{
    width:100%;
    display:block;
    transition:all 1s ease;
    margin: auto;
}
.container{
    width: 100%;
    float: left;
}

div, p, a, li, td {
	-webkit-text-size-adjust:none;
}
.ReadMsgBody {
	width: 100%;
	background-color: #d1d1d1;
}
.ExternalClass {
	width: 100%;
	background-color: #d1d1d1;
	line-height:100%;
}
body {
	width: 100%;
	height: 100%;
	background-color: #ffffff;
	margin:0;
	padding: 3em;
	-webkit-font-smoothing: antialiased;
	-webkit-text-size-adjust:100%;
}
html {
	width: 100%;
}
img {
	-ms-interpolation-mode:bicubic;
}
table[class=full] {
	padding:0 !important;
	border:none !important;
}

.header-wrapper{
  width: 100%;
  float: left;
}

.logo-wrapper{
  width: 30%;
  float: left;
}

.logo-wrapper img{
  width: 150px;
  float: left;
}

.contact-details{
  width: 70%;
  float: left;
}

.contact-details h5{
  text-align: right;
  font-size: 15px;
  line-height: 24px;
  color: #5f5f5f;
  text-transform: uppercase;
  font-family: 'latoregular', sans-serif;
}

.invoice-wrapper{
  width: 100%;
  float: left;
  padding: 30px;
  background-color: #d6d6d6;
  text-transform: uppercase;
  line-height: 22px;
}

.table-wrapper{
  width: 100%;
  float: left;
}

.table-wrapper table{}

  /* .table-wrapper table tbody{
    border: 1px solid #000000;
  } */

.table-wrapper table th{padding: 10px;background-color: #c3c3c3;border: 1px solid #000;}

.table-wrapper table tr{text-align: left;}

.table-wrapper table td{padding: 10px;border: 1px solid #000000}

.table-total-wrapper{

}

.table-total-wrapper table{

}

.table-total-wrapper table th{padding: 10px;background-color: #c3c3c3;border: 1px solid #000;}

.table-total-wrapper table tr{text-align: left;}

.table-total-wrapper table td{padding: 10px;border: 1px solid #000000}


/* .table-total-wrapper table tbody{
  border: 1px solid #000000;
} */


table td img[class=imgresponsive] {
	width:100% !important;
	height:auto !important;
	display:block !important;
}

@media only screen and (max-width: 800px) {
body {
 width:auto!important;
}

table[class=full] {
 width:100%!important;
}
table[class=devicewidth] {
 width:100% !important;
 padding-left:20px !important;
 padding-right: 20px!important;
}
table td img.responsiveimg {
 width:100% !important;
 height:auto !important;
 display:block !important;
}
}
@media only screen and (max-width: 640px) {
table[class=devicewidth] {
 width:100% !important;
}
table[class=inner] {
 width:100%!important;
 text-align: center!important;
 clear: both;
}
table td a[class=top-button] {
 width:160px !important;
 font-size:14px !important;
 line-height:37px !important;
}
table td[class=readmore-button] {
 text-align:center !important;
}
table td[class=readmore-button] a {
 float:none !important;
 display:inline-block !important;
}
.hide {
 display:none !important;
}
.hidden{
 display:none !important;
}
table td[class=smallfont] {
 border:none !important;
 font-size:22px !important;
}
table td[class=sidespace] {
 width:10px !important;
}
}

@media only screen and (max-width: 480px) {
 table {
 border-collapse: collapse;
}
table td[class=template-img] img {
 width:100% !important;
 display:block !important;
}
}
		</style>
	</head>
	<body>

        <div class="header-wrapper">

          <div class="logo-wrapper">

            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png' ?>" alt="Kericho Gold Logo">

          </div>

          <div class="contact-details">

            <h5>Gold Crown Beverages (K) Ltd.</h5>
            <h5>Chai Street, Shimanzi,</h5>
            <h5>P.O. Box 16453-80100,</h5>
            <h5>Mombasa, Kenya.</h5>
            <h5>Email: shop@kerichogold.com</h5>
            <h5>Tel: +254-706-655955</h5>
            <h5>VAT Number : 0116486A</h5>

          </div>

        </div>
		
		<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
						
		<div class="invoice-wrapper">

          <h5>Order # <?php echo $order->get_id(); ?></h5>
          <h5>Order Date: <?php echo wc_format_datetime( $order->get_date_created() ); ?></h5>

        </div>
		
		<div class="table-wrapper">

          <table mc:repeatable="Section03" width="100%" border="0" cellspacing="0" cellpadding="0" class="full">



                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="devicewidth" >

                  <thead>
                    <th>Sold To:</th>
                    <th>Ship To:</th>
                  </thead>

                  <tbody>

                    <tr>
                      <td><?php echo $order->billing_first_name.' '.$order->billing_last_name; ?></td>
                      <td><?php echo $order->billing_first_name.' '.$order->billing_last_name; ?></td>                      
                    </tr>

                    <tr>
                      <td><?php echo $order->billing_address_1; ?></td>
                      <td><?php echo $order->billing_address_1; ?></td>                      
                    </tr>

                    <tr>
                      <td><?php echo $order->billing_city; ?></td>
                      <td><?php echo $order->billing_city; ?></td>
                    </tr>

                    <tr>
						<td><?php echo $order->billing_email; ?></td>                      
						<td><?php echo $order->billing_email; ?></td>                      
                    </tr>

                    <tr>
                      <td>T: <?php echo $order->billing_phone; ?></td>                      
                      <td>T: <?php echo $order->billing_phone; ?></td>                      
                    </tr>

                  </tbody>

                </table>
            
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="devicewidth" >

                  <thead>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                  </thead>

                  <tbody>
					<?php  foreach ($order->get_items() as $item_id => $item ):  ?>
                    <tr>
					  <?php $product = $item->get_product(); ?>
                      <td><?php echo $item->get_name(); ?></td>                      
                      <td><?php echo 'KSH '.$product->get_price(); ?></td>                      
                      <td><?php echo $item->get_quantity(); ?></td>       
                      <td><?php echo 'KSH '.(number_format($product->get_price()*$item->get_quantity(), 2)); ?></td>  
                    </tr>

                    <?php endforeach; ?>

                  </tbody>
				  
				  <tfoot>
					<?php
						foreach ( $order->get_order_item_totals() as $key => $total ) {
							?>
							<tr>
								<th scope="row"><?php echo $total['label']; ?></th>
								<td><?php echo $total['value']; ?></td>
							</tr>
							<?php
						}
					?>
					<?php if ( $order->get_customer_note() ) : ?>
						<tr>
							<th><?php _e( 'Note:', 'woocommerce' ); ?></th>
							<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
						</tr>
					<?php endif; ?>
				</tfoot>

                </table>


          </table>

        </div>

	</body>

    </html>
