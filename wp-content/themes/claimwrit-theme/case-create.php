<?php
require_once(__DIR__ . '/wp-load.php'); // Access WP functions

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
    exit;
}

$currentUser = wp_get_current_user();
$username = sanitize_user($currentUser->user_login);

// Receive and sanitize folder name from form
$rawFolderName = $_POST['folder_name'] ?? '';
$caseName = preg_replace('/[^a-zA-Z0-9\s\-\(\)]/', '', $rawFolderName);

// Define folder path for this user's case
$baseDir = __DIR__ . '/uploads/clients/' . $username . '/';
$newPath = $baseDir . $caseName;

if (!is_dir($newPath)) {
    mkdir($newPath, 0777, true);
}

// Copy the checklist PDF into the new folder
$checklistSource = __DIR__ . '/assets/forms/DEMAND_PACKAGE_SUBMISSION_CHECKLIST.pdf';
$checklistDestination = $newPath . '/DEMAND_PACKAGE_SUBMISSION_CHECKLIST.pdf';

if (file_exists($checklistSource)) {
    copy($checklistSource, $checklistDestination);
}

// Redirect back to upload portal with folder name in query
header('Location: client-upload.php?folder=' . urlencode($caseName));
exit;
?>