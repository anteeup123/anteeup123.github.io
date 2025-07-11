<?php
/**
 * Template Name: Client Upload
 * Description: Page template for clients (attorneys) to upload documents.
 */

require_once __DIR__ . '/wp-load.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';

// Redirect guests to login
if ( ! is_user_logged_in() ) {
    wp_redirect( wp_login_url() );
    exit;
}

// Get current user and sanitize
$currentUser = wp_get_current_user();
$username    = sanitize_user( $currentUser->user_login );

// Determine case folder name from query string
$caseName = sanitize_text_field( $_GET['folder'] ?? '' );

// Show success toast if folder exists
if ( $caseName !== '' ) {
    echo '<div class="success-toast">';
    echo 'Case folder <strong>' . esc_html( $caseName ) . '</strong> created successfully. You may now upload your documents.';
    echo '</div>';
}
?>

<main class="upload-container">
  <h1>Client Document Upload</h1>
  <p class="intro-text">
    Please use this portal to submit your documents for review. Refer to the checklist below to ensure you've included all necessary materials.
  </p>

  <div class="checklist-container">
    <h2>Demand Package Submission Checklist</h2>

    <!-- Create Case Folder Form -->
    <section class="create-case-form">
      <h3>Create a New Case Folder</h3>
      <form method="post" action="<?php echo esc_url( get_template_directory_uri() . '/case-create.php' ); ?>" class="case-form">
        <label for="folder_name">Client Name + DOA</label>
        <input
          type="text"
          id="folder_name"
          name="folder_name"
          placeholder="Jane Doe – DOA (05-15-2025)"
          required
        />
        <button type="submit">Create Case</button>
      </form>
    </section>

    <!-- Checklist Sections -->
    <?php
    $checklistSections = [
      'Incident & Liability Information' => [
        'Client intake sheet detailing how, when, and where the injury occurred',
        'Copies of all police, incident, or accident reports (with report numbers)',
        'Photographs or video of the scene, property damage, and visible injuries (if available)',
        'Names, contact information, and insurance details for all involved parties and witnesses',
      ],
      'Medical Records & Treatment Summaries' => [
        'All emergency room and hospital records from the date of accident forward',
        'Clinic or physician office visit notes and summaries for every provider seen',
        'Imaging reports (MRI, CT, X-ray) and corresponding radiology interpretations',
        'Physical therapy, chiropractic, pain-management, and other therapy records',
        'Detailed billing statements or itemized invoices for each provider',
        'Prescriptions with dosages and accompanying pharmacy receipts',
        'Any impairment ratings, specialist evaluations, or future care recommendations',
      ],
      'Financial & Employment Documentation' => [
        'Pay stubs or employer verification showing lost wages',
        'Tax returns or profit-and-loss statements if self-employed',
        'Receipts for out-of-pocket expenses',
        'Documentation of property damage expenses',
      ],
      'Insurance & Claim Forms' => [
        'Copies of all insurance correspondence',
        'Insurance policy declarations pages',
        'At-fault party insurance declarations',
        'Signed medical record authorizations and HIPAA release forms',
        'Any signed lien or subrogation reimbursement forms',
      ],
    ];

    foreach ( $checklistSections as $sectionTitle => $items ) {
      echo '<div class="checklist-section">';
      echo '<h4>' . esc_html( $sectionTitle ) . '</h4>';
      echo '<ul class="checklist-items">';
      foreach ( $items as $idx => $item ) {
        $id = 'item-' . sanitize_title_with_dashes( $sectionTitle ) . '-' . $idx;
        echo '<li>';
        echo '<input type="checkbox" id="' . esc_attr( $id ) . '">';
        echo '<label for="' . esc_attr( $id ) . '">' . esc_html( $item ) . '</label>';
        echo '</li>';
      }
      echo '</ul></div>';
    }
    ?>
  </div>

  <!-- Upload Form -->
  <?php if ( $caseName !== '' ) : ?>
  <div class="upload-area">
    <h3>Upload Your Documents for “<?php echo esc_html( $caseName ); ?>”</h3>
    <form
      action="<?php echo esc_url( get_template_directory_uri() . '/includes/upload-handler.php?folder=' . rawurlencode( $caseName ) ); ?>"
      method="post"
      enctype="multipart/form-data"
      class="upload-form"
    >
      <div class="form-group">
        <label for="client-name">Your Name</label>
        <input type="text" id="client-name" name="client_name" required>
      </div>

      <div class="form-group">
        <label for="client-email">Your Email</label>
        <input type="email" id="client-email" name="client_email" required>
      </div>

      <div class="form-group">
        <label for="fileInput">Select Files</label>
        <input
          type="file"
          id="fileInput"
          name="files[]"
          multiple
          required
        >
      </div>

      <button type="submit" class="submit-button">Submit Documents</button>
    </form>
  </div>
  <?php else : ?>
    <p>Please create or select a case folder first above.</p>
  <?php endif; ?>
</main>

<?php
require_once __DIR__ . '/footer.php';
