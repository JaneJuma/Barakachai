<?php
define( 'WP_DEBUG', true );

$filename = 'customer_20190125_080422.csv';

$file = fopen($filename, "r");
fgetcsv($file);

while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
{
	// echo '<pre>';
	// var_dump($getData);
	// echo '</pre>';
	
	// if (count($getData) > 1) 
	// {
		$uname = $getData[9].' '.$getData[12];
		$email = $getData[0];
		$created = $getData[5];
		
        // $user = create_user($uname, $email, $created);
		
		// if($user)
		// {
			
		// }
    // }
}
$user =  create_user($uname, $email, $created);
echo '<pre>';
var_dump($user);
echo '</pre>';

// create the user
function create_user($uname, $email, $created)
{
    $user = array(
      'user_login' => $uname,
	  'user_pass' => '',
      'user_nicename' => $uname,
      'user_email' => $email,
      'user_url' => '',
      'user_registered' => date('Y-m-d H:i:s', $created),
      'user_activation_key' => '',
      'user_status' => 0,
      'display_name' => $uname,
	  
    );

    // check if user exists
    if (username_exists($uname)) 
	{
      echo 'duplicate for '.$uname;
	  die();
    } 
	else 
	{
      // create new user
      $user_id = wp_insert_user($user);
    }
}