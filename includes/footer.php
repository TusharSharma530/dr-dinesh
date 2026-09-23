<!-- Bottom Bar -->
<section class="bottom-bar">
    <div class="container bottom-bar-content">

        <div class="bottom-bar-left">
            <img src="assets/icons/logo.png" alt="Logo" class="bottom-logo">
            <div class="bottom-divider"></div>
            <div class="bottom-info">
                <div class="bottom-info-item">
                    <div class="info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    
                    <div class="info-text">
                        <strong>Our Clinic Address</strong>
                        <p>Shri Ram plaza,  opposite of Ambedkar college,<br> Tejgarhi road Meerut ,250004</p>
                    </div>
                    
                </div>
                <div class="bottom-info-item">
                    <div class="info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="info-text">
                        <strong>Phone Number</strong>
                        <p>+91 7982156581 </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-bar-right">
            <div class="social-links">
                <a href="https://www.facebook.com/p/NeuroDoctorMeerut"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/p/DcyMcyYhFZo/"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
  
    </div>
</section>

<footer class="footer">

    <div class="container footer-content">

        <div class="footer-column">
            <h3>Quick Links</h3>
            <div class="footer-links-grid">
                <a href="index.php"><i class="bi bi-chevron-right"></i> Home</a>
                <a href="about.php"><i class="bi bi-chevron-right"></i> About</a>
                <a href="services.php"><i class="bi bi-chevron-right"></i> Services</a>
                <a href="blogs.php"><i class="bi bi-chevron-right"></i> Blogs</a>
                <a href="contact.php"><i class="bi bi-chevron-right"></i> Contact</a>
            </div>
        </div>

        <div class="footer-column footer-newsletter">
            <h3>Stay Updated</h3>
            <p>Get health tips, neurosurgical care updates, and clinic information from Dr. Dinesh Singh, Neurosurgeon at Brain And Spine Clinic.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email" required>
                <button type="submit" class="subscribe-btn">SUBSCRIBE <i class="bi bi-send-fill"></i></button>
            </form>
        </div>

        <div class="footer-column">
            <h3>Clinic Hours</h3>
            <div class="clinic-hours">
                <div class="hours-row">
                    <span class="day">Monday – Saturday</span>
                    <span class="time">10:00 AM – 6:00 PM</span>
                </div>
                <div class="hours-row">
                    <span class="day">Sunday</span>
                    <span class="time closed">Closed</span>
                </div>
            </div>
        </div>

    </div>

</footer>

<div class="copyright-bar">
    <div class="container copyright-content">
        <p>Copyright &copy; 2026 Neuro Care – By Dr. Dinesh Singh, All Rights Reserved.</p>
        <p>Design and Developed by <a href="https://promotionparadise.in/" target="_blank">Promotion Paradise</a></p>
    </div>
</div>

<!-- Floating Icons -->
<div class="floating-icons">
    <a href="tel:+918679998864" class="floating-icon phone-icon">
        <i class="bi bi-telephone-fill"></i>
    </a>
    <a href="https://wa.me/918679998864" target="_blank" class="floating-icon whatsapp-icon">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>

<!-- Scroll to Top -->
<button id="scrollTopBtn" class="scroll-top-btn" onclick="scrollToTop()">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
window.addEventListener('scroll', function() {
    var btn = document.getElementById('scrollTopBtn');
    if (window.scrollY > 300) {
        btn.classList.add('show');
    } else {
        btn.classList.remove('show');
    }
});

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
