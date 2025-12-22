<?php
/**
 * Cache Clearing Utility
 * 
 * This file helps clear PHP opcode cache and verify file changes.
 * Access this file via browser: https://yourdomain.com/clear_cache.php
 * 
 * SECURITY: Delete this file after troubleshooting or restrict access!
 */

// Clear OPcache if available
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✓ OPcache cleared<br>";
} else {
    echo "ℹ OPcache not available<br>";
}

// Clear APCu cache if available
if (function_exists('apcu_clear_cache')) {
    apcu_clear_cache();
    echo "✓ APCu cache cleared<br>";
}

// Show current file modification time
$currentFile = __FILE__;
echo "<br><strong>Current file info:</strong><br>";
echo "File: " . basename($currentFile) . "<br>";
echo "Last modified: " . date('Y-m-d H:i:s', filemtime($currentFile)) . "<br>";
echo "File size: " . filesize($currentFile) . " bytes<br>";

// Show PHP version and cache info
echo "<br><strong>PHP Info:</strong><br>";
echo "PHP Version: " . phpversion() . "<br>";

if (function_exists('opcache_get_status')) {
    $status = opcache_get_status();
    if ($status) {
        echo "OPcache enabled: Yes<br>";
        echo "OPcache cached scripts: " . $status['opcache_statistics']['num_cached_scripts'] . "<br>";
    }
}

echo "<br><strong>Server Info:</strong><br>";
echo "Server time: " . date('Y-m-d H:i:s') . "<br>";
echo "Document root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

// Test file upload verification
echo "<br><strong>File Upload Test:</strong><br>";
$testFile = __DIR__ . '/contact/index.php';
if (file_exists($testFile)) {
    echo "contact/index.php exists<br>";
    echo "Last modified: " . date('Y-m-d H:i:s', filemtime($testFile)) . "<br>";
    echo "File size: " . filesize($testFile) . " bytes<br>";
} else {
    echo "contact/index.php NOT FOUND<br>";
}

echo "<br><hr>";
echo "<p style='color: red;'><strong>⚠ SECURITY WARNING:</strong> Delete this file after troubleshooting!</p>";
?>

