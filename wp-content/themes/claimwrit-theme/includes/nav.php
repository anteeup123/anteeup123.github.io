<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'textdomain'); ?>">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'primary',
    'menu_id'        => 'primary-menu',
    'container'      => false,
  ) );
  ?>
</nav>
