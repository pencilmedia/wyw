<?php include("../global/includes/config.inc"); ?>
<?php $thisPage="contactResults"; ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo contactTitle ?></title>
<?php include("../global/includes/head/head_global.inc"); ?>
<?php include("../global/includes/head/head_contact.inc"); ?>
</head>
<body id="<?php echo $thisPage; ?>">
<?php include("../global/includes/nav/nav_global.inc"); ?>
<div id="cardboard_top">
  <div id="cardboard_bottom">
    <div id="content">
      <div class="lt_column">
        <h3><span>Contact</span></h3>
        <img src="../global/media/img/photos/photo_spot_about.png" alt="Photo of writing" /> </div>
      <div class="rt_column">
        <div class="textcopy">
        	<div id="page1">
			<?php
				// UPLOAD SCRIPT
				
				// Get the name of the file (including file extension).
				$filename = $_FILES['uploaded_file']['name'];
				// Get the file size TRY:round( $_FILES['uploaded_file']["size"] / 1048576 * 100) / 100 . "MB"; 
				$filesize = $_FILES['uploaded_file']['size'];
				// Get the extension from the filename.
				$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
				// These will be the types of file that will pass the validation.
			    $allowed_filetypes = array('.jpg','.jpeg','.gif','.pdf','.png','.doc');
				//Determine the path to which we want to save this file
				$newname = dirname(__FILE__).'/uploaded/'.$filename;
				// Maximum filesize in BYTES (currently 0.75MB).
				$max_filesize = 1500000;
					
					
				//FIX THIS...WHY ARE SOME OF THE UPLOADED FILES COMING OUT AS ZERO????
				if (( !empty($_FILES['uploaded_file']['name']) ) && ($filesize == 0) ) 
				{
					$status .= '<h4 style=\'margin-top: 20px\'><span style=\'color: #903\'>Attention:</span> File is ZERO!</h4>';
					$status .= '<p>Your file size is <span style=\'color: #903\'> ' . $filesize . '</span> bytes, which is too large. Please reduce the size of your file <span style=\'color: #903\'>under 1000KB (1MB)</span> and upload again.</p>';
					$status .= '<p><a href=javascript:history.back()>Return to Form</a></p>';
					die($status);
				}
				
				
				//Сheck that we have a file to upload
				if ( (!empty($_FILES['uploaded_file'])) && ($_FILES['uploaded_file']['error'] == 0) )
				{		
					//Check if the file with the same name is already exists on the server
					if ( file_exists($newname) )
					{
						$status .= '<h4 style=\'margin-top: 20px\'><span style=\'color: #903\'>Attention:</span> Filename Already Exists</h4>';
						$status .= '<p>Sorry, the file <strong>'.$_FILES['uploaded_file']['name'].'</strong> already exists on our servers. Click on the return to form link below and change the name of your file and resubmit. Thank you.</p>';
						$status .= '<p><a href=javascript:history.back()>Return to Form</a></p>';
					die($status);
					}
					//Non Valid file extension check
					if ( !in_array($ext,$allowed_filetypes) ) 
					{
						$status .= '<h4 style=\'margin-top: 20px\'><span style=\'color: #903\'>Attention:</span> Invalid File</h4>';
						$status .= '<p>Only <span style=\'color: #903\'>.jpg, .gif, .png, and .pdf</span> file formats <span style=\'color: #903\'>under 1500KB (1.5MB)</span> are accepted for upload to our servers. Please choose another file in the appropriate format and upload again.</p>';
						$status .= '<p><a href=javascript:history.back()>Return to Form</a></p>';
					die($status);
					}
					//Valid file size check
					if ( ($filesize > $max_filesize) ) 
					{
						$status .= '<h4 style=\'margin-top: 20px\'><span style=\'color: #903\'>Attention:</span> File is Too Large!</h4>';
						$status .= '<p>Your file size is <span style=\'color: #903\'> ' . $filesize . '</span> bytes, which is too large. Please reduce the size of your file <span style=\'color: #903\'>under 1500KB (1.5MB)</span> and upload again.</p>';
						$status .= '<p><a href=javascript:history.back()>Return to Form</a></p>';
					die($status);
					}
					//If all okay, upload file and give message
					if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname)))
					{
						$status .= '<div style=\'border:1px solid #77624e; background-color: #eae0a6; margin: 10px 3px; padding: 5px; width: 95%;\'>Your file has been saved as:  ' . $filename . '</div>';
					}
					else
					{
						$status .= '<div style=\'border:1px solid #77624e; background-color: #eae0a6; margin: 10px 3px; padding: 5px; width: 95%;\'>No file was uploaded.</div>';
					}
				} 
				
			
			
					// FORM FIELD DATA
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $upload = $_POST['upload'];
                    $message = $_POST['message'];
                    
                    $fp = fopen("contactFormBackup.txt", "a"); 
                    fwrite($fp, $name . "," . 
                                $email . "," . 
                                $phone . ". | " . 
                                date("M-d-Y") . "\n");
                    fclose($fp);
					
					// Preview Results
					if ( !empty($_FILES['uploaded_file']['name']) ) {
						if ( ($_FILES['uploaded_file']["type"] == "application/pdf") || ($_FILES['uploaded_file']["type"] == "application/doc") )
						{
							$file_preview .= "PDF or Word file has been uploaded.";
						}
						else 
						{
							$file_preview .= "<img src=\"/contact/uploaded/".$filename."\" style=\"max-width: 350px; max-height: 230px;\" />";
						}
					}
					else {
						$file_preview .= "No Preview Available";
					}
					
					if ( !empty($_FILES['uploaded_file']['name']) ) {
						$file_link .= "<a href=\"/contact/uploaded/".$filename."\" target=\"_blank\">Click to View File</a>";
					}
					else {
						$file_link .= "No File Uploaded";
					}
					
					if ( !empty($_FILES['uploaded_file']['name']) ) {
						$file_name .= $filename;
					}
					else {
						$file_name .= "File Not Provided";
					}
                    
                    // send form results through email
                    $recipient = "rolando@writeyourway.org"; 
                    $subject = "Write Your Way Inquiry";
                    $forminfo = 
                    (
                        //$dateHeader . "<p>" . date("M-d-Y") . "</p>" .
                        $header . "<div style='margin: 10px; border: 1px solid #E2DFC3; padding: 0 10px 10px 10px'><h5>Contact Information</h5>" .
                        "<p><label>Date:  </label>" . date("M-d-Y") .  "</p>" .
						"<p><label>Name:  </label>" . $name .  "</p>" .
                        "<p><label>Email:  </label>" . $email .  "</p>" .
                        "<p><label>Phone:  </label>" . $phone .  "</p>" .
                        "<p><label>File Preview:  </label>" . $file_preview . "</p>" .
                        "<p><label>Link to File:  </label>" . $file_link . "</p>" .
                        "<p><label>File Name:  </label>" . $file_name .  "</p>" .
                        "<p><label>File Size:  </label>" . $filesize .  "KB</p>" .
                        "<p><label>Message:  </label>" . $message .  "</p>" .
                        "</div>\n"
                    );
                    
                    $formsend = mail("$recipient", "$subject", "$forminfo", "From: $email\r\nReply-to:$email\r\nBCC:ralph@pencilmedia.com; $strFrom\r\nContent-type: text/html; charset=us-ascii");
				    $display .= '<h4>Thank You</h4>';
					$display .= nl2br($status);
                    $display .= '<p>Thank you for your inquiry. I will be in contact with you shortly.</p>';
                    $display .= nl2br($forminfo);
					
					echo $display;
                ?>
       		</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("../global/includes/foot/foot_global.inc"); ?>
</body>
</html>