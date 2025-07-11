<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Default for XAMPP/Laragon
define('DB_PASS', '');           // Empty password for local dev
define('DB_NAME', 'claimwrit');  // Database name

// Site settings
$base_url = 'http://localhost/claimwrit'; // Update to your domain
$site_name = 'ClaimWrit';
$company_name = 'ClaimWrit dba Envisage Companies LLC';
$company_location = 'Fort Lauderdale, FL';

// Error reporting (enable for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>