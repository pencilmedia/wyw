<?php
// Test file to check if privacy.php exists
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$privacy_file = __DIR__ . '/privacy.php';
$exists = file_exists($privacy_file);

echo "<h1>Privacy.php File Check</h1>";
echo "<p><strong>File exists:</strong> " . ($exists ? "YES" : "NO") . "</p>";
echo "<p><strong>File path:</strong> " . $privacy_file . "</p>";

if ($exists) {
    echo "<p><strong>File size:</strong> " . filesize($privacy_file) . " bytes</p>";
    echo "<p><strong>Last modified:</strong> " . date("Y-m-d H:i:s", filemtime($privacy_file)) . "</p>";
} else {
    echo "<p style='color: green;'><strong>✓ File is deleted (as expected)</strong></p>";
}

echo "<hr>";
echo "<p><strong>Current time:</strong> " . date("Y-m-d H:i:s") . "</p>";
echo "<p><strong>Server:</strong> " . $_SERVER['SERVER_NAME'] . "</p>";
?>

