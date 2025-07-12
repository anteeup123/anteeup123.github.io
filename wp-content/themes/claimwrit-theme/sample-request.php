<?php
$pageTitle = "Sample Request";
$currentPage = 'sample';
require_once __DIR__ . '/header.php';
?>

<main class="sample-request-page">
    <section class="page-hero" style="background-color: var(--pastel-green);">
        <h1>Request Samples</h1>
        <p>Review our work before you commit</p>
    </section>

    <section class="sample-options">
        <h2>Available Samples</h2>
        <p>Select the sample materials you'd like to receive:</p>
        
        <form action="/includes/sample-request-handler.php" method="post" class="sample-form">
            <div class="form-group checkbox-group">
                <input type="checkbox" id="sample-demand" name="samples[]" value="demand-letter">
                <label for="sample-demand">
                    <strong>Demand Letter Template</strong>
                    <span>Our formatted demand letter with persuasive argument structure</span>
                </label>
            </div>
            
            <div class="form-group checkbox-group">
                <input type="checkbox" id="sample-exhibits" name="samples[]" value="exhibit-index">
                <label for="sample-exhibits">
                    <strong>Exhibit Index Sample</strong>
                    <span>How we organize and reference medical records and evidence</span>
                </label>
            </div>
            
            <div class="form-group checkbox-group">
                <input type="checkbox" id="sample-chronology" name="samples[]" value="medical-chronology">
                <label for="sample-chronology">
                    <strong>Medical Chronology</strong>
                    <span>Sample timeline of treatment and key medical findings</span>
                </label>
            </div>
            
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="firm">Law Firm/Organization</label>
                <input type="text" id="firm" name="firm">
            </div>
            
            <div class="form-group">
                <label for="practice">Practice Area</label>
                <select id="practice" name="practice">
                    <option value="personal-injury">Personal Injury</option>
                    <option value="medical-malpractice">Medical Malpractice</option>
                    <option value="workers-comp">Workers' Compensation</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="notes">Special Requests or Notes</label>
                <textarea id="notes" name="notes" rows="4"></textarea>
            </div>
            
            <button type="submit" class="submit-button">Request Samples</button>
        </form>
    </section>
    
    <section class="sample-testimonial">
        <blockquote>
            "The sample demand package showed me exactly how ClaimWrit's systematic approach could improve my settlement outcomes. I was particularly impressed with how they presented the medical evidence."
        </blockquote>
        <div class="attribution">
            <p>Michael Chen, Esq.</p>
            <p>Chen & Associates</p>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>