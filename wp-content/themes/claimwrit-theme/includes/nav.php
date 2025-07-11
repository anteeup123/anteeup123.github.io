<nav>
    <div class="logo">
        <img src="<?= get_template_directory_uri(); ?>/images/ClaimWrit-Logo.jpg" alt="ClaimWrit Logo" />
    </div>
    <ul>
        <li><a href="<?= $base_url ?>/index.php" class="<?= $currentPage=='home' ? 'active' : '' ?>">Home</a></li>
        <li><a href="<?= $base_url ?>/mission.php" class="<?= $currentPage=='mission' ? 'active' : '' ?>">Our Mission</a></li>
        <li><a href="<?= $base_url ?>/services.php" class="<?= $currentPage=='services' ? 'active' : '' ?>">How We Help</a></li>
        <li><a href="<?= $base_url ?>/sample-request.php" class="<?= $currentPage=='sample' ? 'active' : '' ?>">Sample Request</a></li>
        <li><a href="<?= $base_url ?>/contact.php" class="<?= $currentPage=='contact' ? 'active' : '' ?>">Contact</a></li>
        <li><a href="<?= $base_url ?>/client-upload.php" class="<?= $currentPage=='upload' ? 'active' : '' ?>">Client Upload</a></li>
        <li><a href="<?= $base_url ?>/blog-index.php" class="<?= $currentPage=='blog' ? 'active' : '' ?>">ClaimWrit Blog</a></li>
    </ul>
</nav>
