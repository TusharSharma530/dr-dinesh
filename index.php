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

            <h2>Dr. Dinesh</h2>

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

            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/stroke management.png" alt="Stroke Management">
                </div>
                <div class="service-card-body">
                    <h3>Stroke Management</h3>
                </div>
            </div>

            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/maigraine.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Maigraine Treatment</h3>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/neuromascular.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>neuromascular Treatment</h3>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/paalysis1.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>pralysis Treatment</h3>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/epilepsy treatment.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Epilepsy Treatment</h3>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/sleep disopder.png" alt="Epilepsy Treatment">
                </div>
                <div class="service-card-body">
                    <h3>Sleep Disorder </h3>
                </div>
            </div>

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
        <!-- First Row: Full Name and Phone Number -->
        <div class="form-row">
            <input type="text" placeholder="Full Name" required>
            <input type="tel" placeholder="Phone Number" required>
        </div>

        <!-- Second Row: Date and Message -->
        <div class="form-row">
            <input type="date" required>
            <input type="text" placeholder="Your Message" required>
        </div>

        <!-- Third Row: Services Dropdown and Book Button -->
        <div class="form-row">
            <select required>
                <option value="" disabled selected>Select Service</option>
                <option value="stroke">Stroke Management</option>
                <option value="migraine">Migraine Treatment</option>
                <option value="neuromuscular">Neuromuscular Treatment</option>
                <option value="paralysis">Paralysis Treatment</option>
                <option value="epilepsy">Epilepsy Treatment</option>
                <option value="sleep">Sleep Disorder</option>
            </select>
            <button type="submit" class="book-btn">Book Appointment</button>
        </div>
    </form>

    <p class="consultation-address">
        <i class="bi bi-telephone-fill"></i> Call: 7982156581 | <i class="bi bi-geo-alt-fill"></i> Shri Ram plaza, (in front of Ambedkar college),<br>Tejgarhi road Meerut, 250004
    </p>
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
const slides = document.querySelectorAll('.testimonial-slide');

function changeSlide(direction) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + direction + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
}
</script>

<section class="expertise-section">
    <div class="container expertise-content">

        <div class="expertise-left">
            <span class="expertise-tag">OUR EXPERTISE</span>
            <h2>Advanced Neurology Care for Every Patient</h2>
            <p>We combine clinical expertise with advanced diagnostic techniques to provide accurate and effective neurological care. Dr. Dinesh focuses on identifying the root cause of neurological conditions and delivering personalized, evidence-based treatment for long-term health and recovery.</p>
            <h4>Dr. Dinesh</h4>
            <p class="expert-neuro-designation">Neurosurgeon</p>
        </div>

        <div class="expertise-right">
            <div class="faq-list">

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        <span class="faq-number">01</span>
                        <span class="faq-title">Do you need expert neurological consultation?</span>
                        <i class="bi bi-plus-lg faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>We provide detailed neurological evaluations to diagnose conditions like stroke, epilepsy, and migraines with accuracy and care.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        <span class="faq-number">02</span>
                        <span class="faq-title">Advanced diagnosis & treatment options</span>
                        <i class="bi bi-plus-lg faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Using modern diagnostic methods and clinical expertise, we ensure early detection and effective management of neurological disorders.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        <span class="faq-number">03</span>
                        <span class="faq-title">Personalized care for long-term neurological health</span>
                        <i class="bi bi-plus-lg faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Every patient receives individualized care tailored to their condition, lifestyle, and long-term health goals.</p>
                    </div>
                </div>

            </div>

            <p class="expertise-bottom-text">Every patient receives individualized care tailored to their condition, lifestyle, and long-term health goals.</p>
        </div>

    </div>
</section>

<script>
function toggleFaq(btn) {
    const faqItem = btn.closest('.faq-item');
    const icon = btn.querySelector('.faq-icon');

    document.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
            item.querySelector('.faq-icon').classList.remove('bi-dash-lg');
            item.querySelector('.faq-icon').classList.add('bi-plus-lg');
        }
    });

    faqItem.classList.toggle('active');

    if (faqItem.classList.contains('active')) {
        icon.classList.remove('bi-plus-lg');
        icon.classList.add('bi-dash-lg');
    } else {
        icon.classList.remove('bi-dash-lg');
        icon.classList.add('bi-plus-lg');
    }
}

</script>

<!-- Expert Neuro Section -->
<section class="expert-neuro-section">
    <div class="container expert-neuro-content">

        <div class="expert-neuro-left">
            <div class="expert-neuro-img">
                <img src="assets/images/expert neuro.jfif" alt="Dr. Dinesh">
            </div>
        </div>

        <div class="expert-neuro-right">
            <h2>Expert Neurology Care You Can Trust</h2>
            <p>We provide prompt and reliable neurological care with a focus on accurate diagnosis and effective treatment. Our approach ensures that every patient receives personalized attention and the best possible medical support.</p>

            <div class="expert-neuro-features">

                <div class="expert-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h4>Specialized Neurology Care</h4>
                        <p>Expert diagnosis and treatment for stroke, epilepsy, migraine, and other neurological disorders.</p>
                    </div>
                </div>

                <div class="expert-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h4>Experienced Consultant</h4>
                        <p>Treated at leading hospitals with extensive experience in managing complex neurological conditions.</p>
                    </div>
                </div>

                <div class="expert-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h4>Accurate Diagnosis</h4>
                    </div>
                </div>

            </div>

            <div class="expert-neuro-stat">
                <span class="stat-percent">95%</span>
                <span class="stat-text">Patient Satisfaction</span>
            </div>
        </div>

    </div>
</section>

<?php
include 'includes/footer.php';
?>


