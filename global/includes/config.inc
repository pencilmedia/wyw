<?php
// Prevent caching during development
if (!headers_sent()) {
    header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
}

define("homeTitle", "WriteYourWays.org");
define("aboutTitle", "WriteYourWays.org : About");
define("servicesTitle", "WriteYourWays.org : Services");
define("contactTitle", "WriteYourWays.org : Contact");
define("historyTitle", "WriteYourWays.org : History");
define("privacyTitle", "WriteYourWays.org : Privacy Policy");
define("legalTitle", "WriteYourWays.org : Legal Disclaimer");
define("termsTitle", "WriteYourWays.org : Terms of Service");
?>