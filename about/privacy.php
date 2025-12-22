<?php 
// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("../global/includes/config.inc"); 
$thisPage="privacy"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo privacyTitle ?></title>
<?php include("../global/includes/head/head_global.inc"); ?>
</head>
<body id="<?php echo $thisPage; ?>">
	<?php include("../global/includes/nav/nav_global.inc"); ?>
    <div id="cardboard_top">
        <div id="cardboard_bottom">
            <div id="content">
                <div class="lt_column">
            		<h3><span>Privacy</span></h3>
                 	<a href="privacy.php" class="active">Privacy Policy</a>
                 	<a href="legal.php">Legal Disclaimer</a>
                 	<a href="terms.php">Terms of Service</a>
                </div>
                <div class="rt_column">
                	<div class="textcopy">
                        <h4>Privacy Policy</h4>
                        <p>
                            Write Your Ways LLC respects your privacy and is committed to protecting your personal information.
                        </p>
                        
                        <h5>1. Information We Collect</h5>
                        <p>
                            We may collect basic personal details such as your name, email address, phone number, and any handwriting samples or materials you voluntarily share for analysis. We only use this information to provide the services you request, communicate with you, and improve your overall experience.
                        </p>
                        
                        <h5>2. How Your Information Is Used</h5>
                        <p>
                            Your information is used solely for scheduling sessions, conducting handwriting analyses, providing follow-up insights, and sharing updates or offers if you have opted in. Your information will never be sold, traded, or shared with third parties for marketing purposes.
                        </p>
                        
                        <h5>3. Data Security</h5>
                        <p>
                            We take reasonable precautions to protect your information. While no online platform can guarantee absolute security, we maintain appropriate safeguards to prevent unauthorized access, use, or disclosure.
                        </p>
                        
                        <h5>4. Confidentiality</h5>
                        <p>
                            All handwriting samples, personal discussions, and session materials are treated as confidential and are not shared without your written consent, unless required by law.
                        </p>
                        
                        <h5>5. Cookies and Analytics</h5>
                        <p>
                            Our website may use cookies or third-party analytics tools to improve functionality and understand how visitors interact with our pages. You may adjust your browser settings to decline cookies if you prefer.
                        </p>
                        
                        <h5>6. Your Rights</h5>
                        <p>
                            You may request access to, correction of, or deletion of your personal information at any time by contacting us at <a href="mailto:writeyourways@gmail.com?subject=Regarding%20my%20personal%20information">writeyourways@gmail.com</a>.
                        </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

<?php include("../global/includes/foot/foot_global.inc"); ?>

</body>
</html>
