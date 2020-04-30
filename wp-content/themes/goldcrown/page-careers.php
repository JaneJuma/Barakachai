<?php
/*
 *  Template Name: Careers
 */

get_header();?>

<?php
if(isset($_POST['submitted'])) 
{
	if(trim($_POST['contactname']) === '') 
	{
		$nameError = 'Please enter your name.';
		$hasError = true;
	} 
	else 
	{
		$name = trim($_POST['contactname']);
	}

	if(trim($_POST['contactemail']) === '')  
	{
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} 
	else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['contactemail']))) 
	{
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} 
	else 
	{
		$email = trim($_POST['contactemail']);
	}
	if(trim($_POST['contactphone']) === '') 
	{
		$telephoneError = 'Please enter your phone number.';
		$hasError = true;
	} 
	else 
	{
		$phone = trim($_POST['contactphone']);
	}
	if(trim($_POST['contactenquiry']) === '') 
	{
		$commentError = 'Please enter a message.';
		$hasError = true;
	} 
	else 
	{
		if(function_exists('stripslashes')) 
		{
			$comments = stripslashes(trim($_POST['contactenquiry']));
		} 
		else 
		{
			$comments = trim($_POST['contactenquiry']);
		}
	}
	if(empty($_FILES['fileUpload'])) 
	{
		$fileError = 'Please upload a file.';
		$hasError = true;
	} 
	else 
	{
		$uploadedfile = $_FILES['fileUpload'];

		// Check file size
		if ($_FILES["fileUpload"]["size"] > 500000) 
		{
			$fileError = 'Sorry, your file is too large.';
			$hasError = true;			
		}
		// Allow certain file formats
		if ($_FILES) 
		{
			$files = $_FILES['fileUpload'];
			
			foreach ($files['name'] as $key => $value) 
			{
				if ($files['name'][$key]) 
				{
					$file = array(
					'name'     => $files['name'][$key],
					'type'     => $files['type'][$key],
					'tmp_name' => $files['tmp_name'][$key],
					'error'    => $files['error'][$key],
					'size'     => $files['size'][$key]
					);

					$uploaded_file_type = $files['type'][$key];
					$allowed_file_types = array('application/msword', 'application/pdf');
				  
					if(!in_array($uploaded_file_type, $allowed_file_types)) 
					{
						$fileError = 'File extension not allowed.';
						$hasError = true;
					}
				}
			}
		}
		else
		{
			$file = wp_handle_upload( $files );
		}
	}
	if(!isset($hasError)) 
	{
		$emailTo = 'harunthuo4@gmail.com';
		
		$subject = 'Job Application from '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nMessage: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		$attachments = array(WP_CONTENT_DIR . '/uploads/'.$files);
		
		wp_mail($emailTo, $subject, $body, $headers, $attachments);
		$emailSent = true;
	}
}
?>
<section>

    <div class="checkout-wrapper">
        
        <figure class="swing">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-tea-bag.png">
        </figure>
        
        <div class="swing-leaf">
            <img src="<?php bloginfo('template_url');?>/assets/images/swing-leaf.png">
        </div>
        
        <div class="career-wrapper">
            <h1>Career</h1>
			
			<?php 
			$args = array(
				'post_type' => 'career',
				'order' => 'ASC',
				'post_per_page' => -1
			);
			
			$careers = new WP_Query( $args);
			
			?>
			
			<?php if(count($careers->posts) > 0){  ?>
            <ul>
                <?php
                while ( $careers->have_posts()): $careers->the_post();
                ?>
                <li>
                    <h3><?php the_title(); ?></h3>
                    <h6></h6>
                    <p><?php the_excerpt();?></p>
                    <a href="<?php the_permalink();?>">View Description</a>
                </li>
                <?php
                endwhile;
                wp_reset_query();
                ?>
            </ul>
			<?php } else{ ?>
			   
            <div class="no-vacancy-wrapper">
                
                <h3>LIKE YOU, WE ARE ALWAYS LOOKING. APPLY</h3>
                
                <h6>Send in your details. We’re always interested in those interested in us.</h6>
                
                <p>Currently there are no vacancies.😑</p>
                
                <h5>Get in touch.</h5>
                
                <p>To apply for one of our vacancies or chat about future job opportunities, please get in touch.</p>
                <?php if(isset($emailSent) && $emailSent == true) { ?>
					<div class="thanks">
						<p>Thanks, we have received your application.</p>
					</div>
				<?php } ?>
                <form action="<?php the_permalink(); ?>" id="applicationForm" method="post">
                    <input type="text" name="contactname" Placeholder="Name" required>
					<?php if($nameError != '') { ?>
						<span class="error"><?=$nameError;?></span>
					<?php } ?>
                    
                    <input type="email" Placeholder="Email" name="contactemail" required>
					<?php if($emailError != '') { ?>
						<span class="error"><?=$emailError;?></span>
					<?php } ?>
                    
                    <input type="text" Placeholder="Telephone" name="contactphone" required>
					<?php if($telephoneError != '') { ?>
						<span class="error"><?=$telephoneError;?></span>
					<?php } ?>
                    
                    <textarea placeholder="Your message, skills and area of expertise" name="contactenquiry" required></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span>
					<?php } ?>
                    
                    <div class="fileContainer sprite">
                        <span>choose file</span>
                        <input type="file" name="fileUpload" value="Choose File" required>
						<?php if($fileError != '') { ?>
							<span class="error"><?=$fileError;?></span>
						<?php } ?>
                    </div>
                    
					<input type="hidden" name="submitted" id="submitted" value="true" />
                    <button type="submit">SUBMIT</button>
                </form>
                
            </div>
			<?php } ?>
            
        </div>
    </div>

</section>

<?php get_footer();?>
