<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');         // Default for XAMPP/Laragon
define('DB_PASS', '');             // Empty password for local dev
define('DB_NAME', 'claimwrit');    // Database name

// Site settings
define('BASE_URL', 'http://localhost/claimwrit');  // Update to your domain (e.g., https://claimwrit.com)
define('SITE_NAME', 'ClaimWrit');
define('COMPANY_NAME', 'ClaimWrit dba Envisage Companies LLC');
define('COMPANY_LOCATION', 'Fort Lauderdale, FL');

// Error reporting (enable for development)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Session management
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
