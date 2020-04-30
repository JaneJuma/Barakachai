<?php
/*
* Plugin Name: Kericho Gold User Import
* Description: Import from csv file.
* Version: 1.0
* Author: harun
*/

function wp_user_import()
{
	date_default_timezone_set('Africa/Nairobi');
	
	$filename = get_template_directory() . '/customer_20190125_080422.csv';

	$file = fopen($filename, "r");
	
	fgetcsv($file);
	
	
	while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	{
		if (count($getData) > 1) 
		{			
			$uname = $getData[9].' '.$getData[12];
			$email = $getData[0];
						
			$user = array(
			  'user_login' => $uname,
			  'user_pass' => '',
			  'user_nicename' => $uname,
			  'user_email' => $email,
			  'user_url' => '',
			  'user_registered' => date('Y-m-d H:i:s'),
			  'user_activation_key' => '',
			  'user_status' => 0,
			  'display_name' => $uname,
			  
			);
			
			// create new user and assign customer role
			$user_id = wp_insert_user($user);
			wp_update_user( array ('ID' => $user_id, 'role' => 'customer') );
										
			if($user_id)
			{
				update_usermeta( $user_id, 'website', $getData[1] );
				update_usermeta( $user_id, 'store', $getData[2] );
				update_usermeta( $user_id, 'abandonment_subscribed', $getData[3] );
				update_usermeta( $user_id, 'confirmation', $getData[4] );
				update_usermeta( $user_id, 'created_at', $getData[5] );
				update_usermeta( $user_id, 'created_in', $getData[6] );
				update_usermeta( $user_id, 'disable_auto_group_change', $getData[7] );
				update_usermeta( $user_id, 'dob', $getData[8] );
				update_usermeta( $user_id, 'gender', $getData[10] );
				update_usermeta( $user_id, 'group_id', $getData[11] );
				update_usermeta( $user_id, 'middlename', $getData[13] );
				update_usermeta( $user_id, 'phone', $getData[14] );
				update_usermeta( $user_id, 'billing_phone', $getData[14] );
				update_usermeta( $user_id, 'magento_password_hash', $getData[15] );
				update_usermeta( $user_id, 'prefix', $getData[16] );
				update_usermeta( $user_id, 'rp_token', $getData[17] );
				update_usermeta( $user_id, 'rp_token_created_at', $getData[18] );
				update_usermeta( $user_id, 'store_id', $getData[19] );
				update_usermeta( $user_id, 'suffix', $getData[20] );
				update_usermeta( $user_id, 'taxvat', $getData[21] );
				update_usermeta( $user_id, 'website_id', $getData[22] );
				update_usermeta( $user_id, 'password', $getData[23] );
				update_usermeta( $user_id, 'billing_city', $getData[24] );
				update_usermeta( $user_id, 'company', $getData[25] );
				update_usermeta( $user_id, 'billing_country', $getData[26] );
				update_usermeta( $user_id, 'fax', $getData[27] );
				update_usermeta( $user_id, 'first_name', $getData[9] );
				update_usermeta( $user_id, 'last_name', $getData[12] );
				update_usermeta( $user_id, 'billing_first_name', $getData[9] );
				update_usermeta( $user_id, 'billing_last_name', $getData[12] );
				
				update_usermeta( $user_id, 'billing_email', $email );
				update_usermeta( $user_id, 'billing_address_1', $getData[35] );
				
				
				update_usermeta( $user_id, 'nickname', $uname );
				update_usermeta( $user_id, 'middlename', $getData[30] );
				update_usermeta( $user_id, 'phone', $getData[31] );
				update_usermeta( $user_id, 'billing_phone', $getData[31] );
				update_usermeta( $user_id, 'phone', $getData[37] );
				update_usermeta( $user_id, 'billing_phone', $getData[37] );
				update_usermeta( $user_id, '_address_postcode', $getData[32] );
				update_usermeta( $user_id, '_address_prefix', $getData[33] );
				update_usermeta( $user_id, '_address_region', $getData[34] );
				update_usermeta( $user_id, '_address_street', $getData[35] );
				update_usermeta( $user_id, '_address_suffix', $getData[36] );
				update_usermeta( $user_id, '_address_telephone', $getData[37] );
				update_usermeta( $user_id, '_address_vat_id', $getData[38] );
				update_usermeta( $user_id, '_address_default_billing_', $getData[39] );
				update_usermeta( $user_id, '_address_default_shipping_', $getData[40] );
			}			
		}
	}
}

add_shortcode('userimport', 'wp_user_import');