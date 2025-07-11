<?php
/**
 * Template Name: Register
 * Description: Custom registration page template.
 */

get_header();

if ( is_user_logged_in() ) : ?>

  <p>You already have an account!</p>

<?php elseif ( ! get_option( 'users_can_register' ) ) : ?>

  <p>Sorry, registration is currently closed.</p>

<?php else :

  // Handle form submission
  if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
    $username = sanitize_user( wp_unslash( $_POST['user_login'] ?? '' ) );
    $email    = sanitize_email( wp_unslash( $_POST['user_email'] ?? '' ) );
    $result   = register_new_user( $username, $email );

    if ( is_wp_error( $result ) ) {
      echo '<p class="error">' . esc_html( $result->get_error_message() ) . '</p>';
    } else {
      echo '<p>Thanks for signing up! Check your email for the confirmation link.</p>';
      get_footer();
      exit;
    }
  }
  ?>

  <form method="post" class="register-form">
    <p>
      <label for="user_login">Username<br>
        <input name="user_login" id="user_login" type="text" required>
      </label>
    </p>
    <p>
      <label for="user_email">Email Address<br>
        <input name="user_email" id="user_email" type="email" required>
      </label>
    </p>
    <p>
      <input type="submit" value="Register">
    </p>
  </form>

<?php
endif;

get_footer();
