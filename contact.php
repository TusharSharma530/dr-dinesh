<?php
$pageTitle = 'Contact Us';
$pageBreadcrumb = 'Contact Us';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.5!2d77.7806!3d28.9845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sLokpriya+Hospital+Meerut!5e0!3m2!1sen!2sin!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section class="contact-section">
    <div class="container contact-content">

        <div class="contact-left">
            <h2>Get In Touch</h2>

            <div class="contact-info-item">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h4>Phone Number</h4>
                    <p>+91 7982156581s</p>
                </div>
            </div>

            <div class="contact-info-item">
                <i class="bi bi-geo-alt-fill"></i>
                <div>
                    <h4>Our Location</h4>
                    <p>Shri Ram plaza, ( in front of Ambedkar college), Tejgarhi road Meerut ,250004s</p>
                </div>
            </div>

            <div class="contact-info-item">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h4>Email Address</h4>
                    <p>brainspine24@gmail.com</p>
                </div>
            </div>

            <div class="contact-social">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

        <div class="contact-right">
            <h2>Contact Us</h2>
            <p class="contact-subtitle">Feel Free to Contact us any time. We will get back to you as soon as we can!</p>

            <form class="contact-form">
                <div class="form-row-2">
                    <input type="text" placeholder="Name" required>
                    <input type="email" placeholder="Email" required>
                </div>

                <div class="form-row-2">
                    <input type="tel" placeholder="Phone" required>
                    <input type="text" placeholder="Subject" required>
                </div>

                <textarea placeholder="Message" rows="5" required></textarea>

                <div class="captcha-box">
                    <label>Solve: 8 + 3 = ?</label>
                    <input type="text" placeholder="Your Answer" required>
                </div>

                <button type="submit" class="send-btn">SEND MESSAGE</button>
            </form>
        </div>

    </div>
</section>

<?php
include 'includes/footer.php';
?>
