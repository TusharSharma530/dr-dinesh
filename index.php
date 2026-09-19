<?php
include 'includes/header.php';
?>

<section class="banner-section">
    <img src="assets/images/dr dinesh banner.png" alt="Banner" class="banner-img">
</section>

<section class="about-section">
    <div class="container about-content">
       

        <div class="about-text">
            <span class="about-tag">ABOUT US</span>

            <h2>Dr. Dinesh Singh</h2>

            <p class="about-degree">MCh - Neuro Surgery, MBBS, MS - General Surgery</p>

            <h3>Advanced Neurosurgery Care with Accurate Diagnosis & Personalized Treatment</h3>

            <p>
                Dr. Dinesh Singh is a highly qualified Neurosurgeon with 9 years of experience, practising at Brain And Spine Clinic. He specializes in diagnosing and treating a wide range of neurological disorders. With training from reputed institutions and a patient-focused approach, he ensures precise evaluation and evidence-based treatment for every patient. His goal is to provide compassionate care and improve long-term neurological health and quality of life.
            </p>

            <a href="about.php" class="read-more-btn">Read More <i class="bi bi-arrow-right"></i></a>

        </div>

        <div class="about-image">
            <img src="assets/images/dr dinesh image.png" alt="Dr. Dinesh">
        </div>

    </div>
</section>

   <section class="services-section">
    <div class="container">

        <div class="services-header">
            <span class="services-tag">OUR SERVICES</span>
            <h2>Comprehensive Neurology Care</h2>
        </div>

        <div class="services-cards">

            <a href="stroke-management.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/stroke management.png" alt="Stroke Management">
                </div>
                <div class="service-card-body">
                    <h3>Stroke Management</h3>
                </div>
            </a>

            <a href="migraine-treatment.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/maigraine.png" alt="Migraine Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Migraine Treatment</h3>
                </div>
            </a>
            <a href="neuromuscular-treatment.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/neuromascular.png" alt="Neuromuscular Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Neuromuscular Treatment</h3>
                </div>
            </a>
            <a href="paralysis-treatment.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/paalysis1.png" alt="Paralysis Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Paralysis Treatment</h3>
                </div>
            </a>
            <a href="epilepsy-treatment.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/epilepsy treatment.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Epilepsy Treatment</h3>
                </div>
            </a>
            <a href="sleep-disorder.php" class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/sleep disopder.png" alt="Sleep Disorder">
                </div>
                <div class="service-card-body">
                    <h3>Sleep Disorder</h3>
                </div>
            </a>

        </div>

    </div>
    </section>

    <section class="consultation-section">
    <div class="container consultation-content">

        <div class="consultation-image">
            <img src="assets/images/dr dinesh image.png" alt="Book Consultation">
        </div>

       <div class="consultation-form">
    <h2>Book Consultation</h2>
    <h3>Schedule Your Neurology Appointment</h3>

    <form class="consultation-form-box">
        <!-- First Row: Full Name and Email Address -->
        <div class="form-row">
            <input type="text" placeholder="Full Name" required>
            <input type="email" placeholder="Email Address" required>
        </div>

        <!-- Second Row: Phone Number and Date -->
        <div class="form-row">
            <input type="tel" placeholder="Phone Number" required>
            <input type="date" required>
        </div>

        <!-- Third Row: Time and Services -->
        <div class="form-row">
            <input type="time" required>
            <select required>
                <option value="" disabled selected>Select Services</option>
                <option value="stroke">Stroke Management</option>
                <option value="migraine">Migraine Treatment</option>
                <option value="neuromuscular">Neuromuscular Treatment</option>
                <option value="paralysis">Paralysis Treatment</option>
                <option value="epilepsy">Epilepsy Treatment</option>
                <option value="sleep">Sleep Disorder</option>
            </select>
        </div>

        <!-- Message -->
        <div class="form-row">
            <textarea placeholder="Your Message" rows="4" required></textarea>
        </div>

        <!-- Book Button -->
        <div class="form-row">
            <button type="submit" class="book-btn">Book Appointment</button>
        </div>
    </form>
       </div>

      </div>
   </section>

<section class="testimonial-section">
    <img src="assets/images/testinomial.png" alt="Testimonial" class="testimonial-bg">

    <div class="testimonial-overlay">
        <div class="container testimonial-content">

            <div class="testimonial-left">
                <!-- <span class="testimonial-tag">TESTIMONIALS</span> -->
                <h2>What Our Patients Say</h2>
            </div>

            <div class="testimonial-right">
                <div class="testimonial-slider">

                    <div class="testimonial-slide active">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p>"Excellent care and professional treatment. Dr. Dinesh truly listens to his patients and provides the best neurological care. Highly recommended!"</p>
                            <div class="testimonial-author">
                                <span class="author-name">- Rajesh Kumar</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p>"Very thorough and caring doctor. After struggling with migraines for years, I finally found relief under Dr. Dinesh treatment. Thank you!"</p>
                            <div class="testimonial-author">
                                <span class="author-name">- Priya Sharma</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p>"Dr. Dinesh expertise in stroke management is remarkable. His quick diagnosis and treatment helped my father recover significantly. Grateful for his care."</p>
                            <div class="testimonial-author">
                                <span class="author-name">- Amit Verma</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="testimonial-nav">
                    <button class="testimonial-btn prev-btn" onclick="changeSlide(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="testimonial-btn next-btn" onclick="changeSlide(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
let currentSlide = 0;
let isAnimating = false;
const slides = document.querySelectorAll('.testimonial-slide');

function changeSlide(direction) {
    if (isAnimating) return;
    isAnimating = true;

    const current = slides[currentSlide];
    current.classList.add('exit-left');

    currentSlide = (currentSlide + direction + slides.length) % slides.length;

    setTimeout(() => {
        current.classList.remove('active', 'exit-left');
        slides[currentSlide].classList.add('active');
        isAnimating = false;
    }, 500);
}

setInterval(() => {
    changeSlide(1);
}, 4000);
</script>

<section class="gallery-section">
    <div class="container">

        <div class="gallery-header">
            <span class="gallery-tag">GALLERY</span>
            <h2>Our Clinic Gallery</h2>
        </div>

        <div class="gallery-cards">
            <div class="gallery-card">
                <div class="gallery-card-img">
                    <img src="assets/images/stroke management.png" alt="Stroke Management" class="lightbox-trigger">
                </div>
            </div>
        </div>

    </div>
</section>

<div id="imageLightbox" class="lightbox-modal" style="display:none;">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightboxImg" alt="Enlarged Image">
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("imageLightbox");
    const modalImg = document.getElementById("lightboxImg");
    const closeBtn = document.querySelector(".lightbox-close");

    document.querySelectorAll(".lightbox-trigger").forEach(img => {
        img.addEventListener("click", function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        });
    });

    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    modal.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            modal.style.display = "none";
        }
    });
});
</script>

<section class="services-section">
    <div class="container">

        <div class="services-header">
            <span class="services-tag">BLOGS</span>
            <h2>Latest Blogs</h2>
        </div>

        <div class="blog-cards">

            <a href="blog-paralysis.php" class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/paralysis.png" alt="Paralysis">
                    <div class="blog-date">
                        <span class="date-day">19</span>
                        <span class="date-month">MAY</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Paralysis: Causes, Symptoms, Treatment & Recovery</h3>
                    <span class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </span>
                </div>
            </a>

            <a href="summer-heat.php" class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/summer heat.png" alt="Summer Heat">
                    <div class="blog-date">
                        <span class="date-day">19</span>
                        <span class="date-month">JUN</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Summer Heat and Neurological Health: Protect Your Brain This Summer</h3>
                    <span class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </span>
                </div>
            </a>

            <a href="blog-migraine.php" class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/maigraine.png" alt="Migraine Treatment">
                    <div class="blog-date">
                        <span class="date-day">10</span>
                        <span class="date-month">JUL</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Migraine Treatment: Recurring Headaches Should Not Be Ignored</h3>
                    <span class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </span>
                </div>
            </a>

        </div>

    </div>
</section>

<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.536!2d77.7371805!3d28.9651322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c65f6c7b0f123%3A0x78a5f6619a39ab3a!2sBrain%20And%20Spine%20Clinic!5e0!3m2!1sen!2sin!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>


<?php include 'includes/footer.php'; ?>


