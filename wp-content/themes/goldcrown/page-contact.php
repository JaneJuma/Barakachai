<?php
/*
 *  Template Name: Contact
 */

get_header();
?>

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

	if(trim($_POST['contactsubject']) === '') 
	{
		$subjectError = 'Please enter a subject.';
		$hasError = true;
	} 
	else 
	{
		$subjectmessage = trim($_POST['contactsubject']);
	}
	if(trim($_POST['contacts']) === '') 
	{
		$contactError = 'Please enter your contacts.';
		$hasError = true;
	} 
	else 
	{
		$contactsmessage = trim($_POST['contacts']);
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

	if(!isset($hasError)) 
	{
		$emailTo = 'harunthuo4@gmail.com';
		
		$subject = 'Contact page email from '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nContacts: $contactsmessage \n\nSubject: $subjectmessage \n\nMessage: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

}
?>

    <section>
        <div class="contact-wrapper">
            <div class="contact-info">
                
                <?php if(isset($emailSent) && $emailSent == true) { ?>
						<div class="thanks">
							<p>Thanks, we have received your message.</p>
						</div>
					<?php } ?>
                <div class="contact-details">
                    
                    <div class="contact-input">
                        <form action="<?php the_permalink(); ?>" id="contactPageForm" method="post">
                            <div class="first">
                                <label>Full Name</label>
                                <input type="text" name="contactname" required>
                                <?php if($nameError != '') { ?>
        							<span class="error"><?=$nameError;?></span>
        						<?php } ?>
        						<br><br>
                            </div>
                            <div class="second">
                                <label>Email</label>
                                <input type="email" name="contactemail" required>
                                <?php if($emailError != '') { ?>
        							<span class="error"><?=$emailError;?></span>
        						<?php } ?>
        						<br><br>
                            </div>

                            <div class="first">
                                <label>Contacts</label>
                                <input type="text" name="contacts" required>
                                <?php if($contactError != '') { ?>
        							<span class="error"><?=$contactError;?></span>
        						<?php } ?>
        						<br><br>
                            </div>
                            <div class="second">
                                <label>Subject</label>
                                <input type="text" name="contactsubject" required>
                                <?php if($subjectError != '') { ?>
        							<span class="error"><?=$subjectError;?></span>
        						<?php } ?>
        						<br><br>
                            </div>
                            <div class="user-type">
                                <label>Message</label>
                                <textarea name="contactenquiry" required></textarea>
                                <?php if($commentError != '') { ?>
        							<span class="error"><?=$commentError;?></span>
        						<?php } ?>
        						<br><br>
                            </div>
                            <div class="contact-submit">
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                <input type="submit" class="submit-form" placeholder="Send">
                            </div>
                        </form>

                    </div>

                    <div class="contact-location">

                        <div>

                            <div class="place">

                                <span class="fa fa-home"></span>

                                <div class="span-details">
                                    <p>GOLD CROWN BEVERAGES (K) LTD.</p>
                                    <p>P.O Box 16453 Mombasa, Kenya.</p>
                                    <a href="mailto:info@goldcrown.co.ke">Email: info@goldcrown.co.ke</a>
                                </div>

                            </div>
                            <div class="call">
                                <span class="fa fa-volume-control-phone"></span>
                                <div class="span-details">
                                    <p>GOLD CROWN BEVERAGES (K) LTD ,</p>
                                    <p>Chandaria Industries Complex A, Warehouse No. 6 & 7.</p>
                                    <p>+254 722 205 583 / +254 724 257 222</p>
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
                
                
                
                <div class="map">
                    			
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.8664083841268!2d39.65034481303478!3d-4.04766579551332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x184012cb39eb7387%3A0x3fde92cf82f686c6!2sGold+Crown+Beverages+(K)+Ltd%2C+Chai+St%2C+Mombasa!5e0!3m2!1sen!2ske!4v1547021189552" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>