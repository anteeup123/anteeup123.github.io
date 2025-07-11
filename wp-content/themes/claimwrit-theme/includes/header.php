<?php
require_once(get_template_directory() . '/includes/config.php');

if (!isset($pageTitle)) $pageTitle = 'Legal Document Services';
if (!isset($currentPage)) $currentPage = basename($_SERVER['PHP_SELF'], '.php');
if (!isset($site_name)) $site_name = "ClaimWrit";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle) ?> | <?= $site_name ?></title>

    <link rel="stylesheet" href="<?= $base_url ?>/css/styles.css">
    <link rel="stylesheet" href="<?= $base_url ?>/css/client-upload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include(get_template_directory() . '/includes/nav.php'); ?>
