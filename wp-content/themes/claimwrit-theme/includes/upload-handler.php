<?php
// Load WordPress core (adjust path if your includes folder is elsewhere)
require_once __DIR__ . '/../wp-load.php';

if ( ! is_user_logged_in() ) {
    wp_redirect( wp_login_url() );
    exit;
}

$current_user = wp_get_current_user();
$username     = sanitize_user( $current_user->user_login );

$case_name  = sanitize_text_field( $_GET['folder'] ?? '' );
$target_dir = wp_normalize_path( WP_CONTENT_DIR . '/uploads/clients/' . $username . '/' . $case_name );

// Create target folder if it doesn’t exist
if ( ! is_dir( $target_dir ) ) {
    wp_mkdir_p( $target_dir );
}

$allowed_types = [ 'pdf','doc','docx','jpg','jpeg','png','xls','xlsx','txt' ];
$max_size      = 10 * 1024 * 1024; // 10 MB

$uploaded = [];

if ( ! empty( $_FILES['files'] ) ) {
    foreach ( $_FILES['files']['name'] as $i => $filename ) {
        $tmp   = $_FILES['files']['tmp_name'][ $i ];
        $size  = $_FILES['files']['size'][ $i ];
        $error = $_FILES['files']['error'][ $i ];
        $ext   = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );

        if ( UPLOAD_ERR_OK === $error 
             && in_array( $ext, $allowed_types, true ) 
             && $size <= $max_size 
        ) {
            $safe_name = preg_replace( '/[^a-zA-Z0-9_\.-]/', '_', $filename );
            $dest      = trailingslashit( $target_dir ) . $safe_name;
            move_uploaded_file( $tmp, $dest );
            $uploaded[] = $safe_name;
        }
    }
}

// ─────────────────────
// Notify site owner
// ─────────────────────
if ( ! empty( $uploaded ) ) {
    // Build a newline-separated list of filenames
    $file_list = implode( "\n- ", $uploaded );

    // Change this to your actual email address
    $owner_email = 'you@yourdomain.com';

    // Subject with username and case name
    $subject = sprintf(
        'Attorney %s uploaded files to "%s"',
        $username,
        $case_name
    );

    // Plain-text body
    $body  = "The attorney user \"{$username}\" has uploaded the following files to the \"{$case_name}\" folder:\n\n";
    $body .= "- {$file_list}\n\n";
    $body .= 'Review them here: ' . home_url( '/client-upload/?folder=' . rawurlencode( $case_name ) );

    wp_mail(
        $owner_email,
        $subject,
        $body,
        [ 'Content-Type: text/plain; charset=UTF-8' ]
    );
}

// ─────────────────────
// Redirect back to client-upload
// ─────────────────────
$upload_page = get_page_by_path( 'client-upload' );
if ( $upload_page ) {
    wp_safe_redirect(
        add_query_arg(
            'folder',
            urlencode( $case_name ),
            get_permalink( $upload_page->ID )
        )
    );
} else {
    wp_safe_redirect( home_url() );
}

exit;