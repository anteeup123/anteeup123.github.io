<?php
$pageTitle = "Our Services";
$currentPage = 'services';
require_once __DIR__ . '/header.php';
?>

<main class="services-page">
    <section class="page-hero" style="background-color: var(--pastel-lavender);">
        <h1>How We Help</h1>
        <p>Comprehensive legal documentation services tailored to your needs</p>
    </section>

    <section class="services-intro">
        <h2>Specialized Demand Package Preparation</h2>
        <p>ClaimWrit specializes in creating persuasive, well-documented demand packages for personal injury cases. Our services transform raw medical records and evidence into compelling legal arguments that maximize settlement potential.</p>
    </section>

    <section class="service-categories">
        <div class="service-tabs">
            <button class="tab-button active" data-tab="personal-injury">Personal Injury</button>
            <button class="tab-button" data-tab="medical-malpractice">Medical Malpractice</button>
            <button class="tab-button" data-tab="workers-comp">Workers' Compensation</button>
        </div>

        <div class="tab-content active" id="personal-injury">
            <div class="service-details">
                <h3>Personal Injury Demand Packages</h3>
                <p>Our comprehensive personal injury demand packages include:</p>
                <ul class="service-features">
                    <li><i class="fas fa-check-circle"></i> Detailed liability analysis</li>
                    <li><i class="fas fa-check-circle"></i> Medical record chronology</li>
                    <li><i class="fas fa-check-circle"></i> Economic damage calculations</li>
                    <li><i class="fas fa-check-circle"></i> Non-economic damage evaluation</li>
                    <li><i class="fas fa-check-circle"></i> Settlement value range assessment</li>
                </ul>
                
                <div class="process-steps">
                    <h4>Our Process:</h4>
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h5>Document Collection</h5>
                            <p>We guide you through our <a href="/client-upload.php">document checklist</a> to ensure all necessary materials are included.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h5>Comprehensive Review</h5>
                            <p>Our team analyzes every medical record, bill, and supporting document.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h5>Demand Package Preparation</h5>
                            <p>We craft a persuasive demand letter with supporting exhibits.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h5>Delivery & Follow-up</h5>
                            <p>We provide the complete package in your preferred format with settlement authority.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="medical-malpractice">
            <!-- Similar structure for medical malpractice content -->
        </div>

        <div class="tab-content" id="workers-comp">
            <!-- Similar structure for workers comp content -->
        </div>
    </section>

    <section class="service-testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-slider">
            <div class="testimonial">
                <blockquote>
                    "ClaimWrit's demand package resulted in a settlement 40% higher than the insurance company's initial offer. Their attention to detail made all the difference."
                </blockquote>
                <div class="client-info">
                    <div class="client-name">Sarah Johnson</div>
                    <div class="client-title">Personal Injury Attorney</div>
                </div>
            </div>
            <!-- Additional testimonials -->
        </div>
    </section>

    <section class="service-cta">
        <div class="cta-card">
            <h3>Request a Sample</h3>
            <p>See the quality of our work before committing</p>
            <a href="/sample-request.php" class="cta-button">Get Sample</a>
        </div>
        <div class="cta-card" style="background-color: var(--pastel-blue);">
            <h3>Start Your Package</h3>
            <p>Begin the process with our easy document upload</p>
            <a href="/client-upload.php" class="cta-button">Upload Documents</a>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>