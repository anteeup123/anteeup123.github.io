<?php
/**
 * Template Name: Login
 * Description: Custom login page template.
 */

get_header();

if ( is_user_logged_in() ) : ?>
    <p>You’re already logged in. <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">Log out?</a></p>
<?php else :
    // Display WP’s built-in login form, then a link to Register.
    wp_login_form( [ 'redirect' => home_url() ] );

    if ( get_option( 'users_can_register' ) ) {
        $reg_page = get_page_by_path( 'register' );
        if ( $reg_page ) {
            $reg_link = get_permalink( $reg_page );
            echo '<p class="register-link">Not registered yet? <a href="' . esc_url( $reg_link ) . '">Sign Up &rarr;</a></p>';
        }
    }
endif;

get_footer();
