<?php
$pageTitle = "Contact Us";
$currentPage = 'contact';
require_once __DIR__ . '/header.php';
?>

<main class="contact-page">
    <section class="page-hero" style="background-color: var(--pastel-blue);">
        <h1>Contact ClaimWrit</h1>
        <p>We're here to answer your questions and discuss how we can help</p>
    </section>

    <section class="contact-container">
        <div class="contact-info">
            <h2>Get In Touch</h2>
            
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h3>Our Office</h3>
                    <address>
                        ClaimWrit dba Envisage Companies LLC<br>
                        Fort Lauderdale, FL
                    </address>
                </div>
            </div>
            
            <div class="info-card">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h3>Phone</h3>
                    <p><a href="tel:+15551234567">(555) 123-4567</a></p>
                </div>
            </div>
            
            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <div>
                    <h3>Email</h3>
                    <p><a href="mailto:info@claimwrit.com">info@claimwrit.com</a></p>
                </div>
            </div>
            
            <div class="info-card">
                <i class="fas fa-clock"></i>
                <div>
                    <h3>Hours</h3>
                    <p>Monday-Friday: 9am-5pm EST</p>
                    <p>Weekends: Closed</p>
                </div>
            </div>
            
            <div class="social-links">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        
        <div class="contact-form-container">
            <h2>Send Us a Message</h2>
            <form action="/includes/contact-handler.php" method="post" class="contact-form">
                <div class="form-group">
                    <label for="contact-name">Your Name *</label>
                    <input type="text" id="contact-name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="contact-email">Email Address *</label>
                    <input type="email" id="contact-email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="contact-phone">Phone Number</label>
                    <input type="tel" id="contact-phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="contact-subject">Subject</label>
                    <select id="contact-subject" name="subject">
                        <option value="general">General Inquiry</option>
                        <option value="services">Services Information</option>
                        <option value="sample">Sample Request</option>
                        <option value="client">Existing Client</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="contact-message">Message *</label>
                    <textarea id="contact-message" name="message" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <input type="checkbox" id="contact-consent" name="consent" required>
                    <label for="contact-consent">I consent to ClaimWrit contacting me about my inquiry *</label>
                </div>
                
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>
    </section>
    
    <section class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114964.38943762267!2d-80.29949890273436!3d26.12234632693575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9013f3b9b3e3f%3A0x4b012015d5d3a292!2sFort%20Lauderdale%2C%20FL!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
        </iframe>
    </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>