<?php
include 'includes/header.php';
?>

    <?php
$bannerQuery = mysqli_query($con, "SELECT c_name, featured_img FROM category WHERE id = 68 LIMIT 1");
$bannerData = mysqli_fetch_assoc($bannerQuery);
?>

<section class="banner-section">
    <?php if (!empty($bannerData['featured_img'])) { ?>
        <img src="<?= htmlspecialchars($bannerData['featured_img']) ?>"
            alt="<?= htmlspecialchars($bannerData['c_name']) ?>"
            class="banner-img">
    <?php } ?>
</section>

<?php
$aboutQuery = mysqli_query($con, "
    SELECT c_name, sdesc, featured_img
    FROM category
    WHERE id = 76
    LIMIT 1
");

$aboutData = mysqli_fetch_assoc($aboutQuery);
?>

<section class="about-section">
    <div class="container about-content">
       

        <div class="about-text">
            <span class="about-tag">ABOUT US</span>

            <h2><?= htmlspecialchars($aboutData['c_name']) ?></h2>

            <div class="about-degree">
                <?= $aboutData['sdesc'] ?>
            </div>

            <a href="about.php" class="read-more-btn">Read More <i class="bi bi-arrow-right"></i></a>

        </div>

        <div class="about-image">
            <img src="<?= htmlspecialchars($aboutData['featured_img']) ?>" 
                 alt="<?= htmlspecialchars($aboutData['c_name']) ?>">
        </div>

    </div>
</section>

 <section class="services-section">
    <div class="container">

        <div class="services-header">
            <span class="services-tag">OUR SERVICES</span>
            <h2>Comprehensive Neurosurgical Care</h2>
        </div>

        <div class="services-cards">

            <?php
            $services = mysqli_query( $con, "SELECT id, title, url, file  FROM services   ORDER BY `order` ASC, id ASC" );

            if ($services && mysqli_num_rows($services) > 0) {
                while ($service = mysqli_fetch_assoc($services)) {

                    $serviceTitle = htmlspecialchars($service['title']);
                    $serviceUrl   = htmlspecialchars($service['url']);
                    $serviceFile  = htmlspecialchars($service['file']);
            ?>

                    <a href="services.php?service=<?php echo $serviceUrl; ?>"
                       class="service-card">

                        <div class="service-card-img">
                            <img src="<?php echo $serviceFile; ?>"
                                 alt="<?php echo $serviceTitle; ?>">
                        </div>

                        <div class="service-card-body">
                            <h3><?php echo $serviceTitle; ?></h3>
                        </div>

                    </a>

            <?php
                }
            }
            ?>

        </div>

    </div>
</section>

<?php
$consultationQuery = mysqli_query($con, "
    SELECT c_name, sdesc, featured_img
    FROM category
    WHERE id = 93
    LIMIT 1
");

$consultationData = mysqli_fetch_assoc($consultationQuery);
?>

<section class="consultation-section">
    <div class="container consultation-content">

        <div class="consultation-image">
            <img src="<?= htmlspecialchars($consultationData['featured_img']) ?>" 
                 alt="<?= htmlspecialchars($consultationData['c_name']) ?>">
        </div>

        <div class="consultation-form">
            <h2><?= htmlspecialchars($consultationData['c_name']) ?></h2>
            <h3><?= $consultationData['sdesc'] ?></h3>

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
                        <option value="brain-tumor">Brain Tumor Surgery</option>
                        <option value="spine-surgery">Spine Surgery</option>
                        <option value="aneurysm">Aneurysm Clipping</option>
                        <option value="dbs">Deep Brain Stimulation</option>
                        <option value="trauma">Neurotrauma Surgery</option>
                        <option value="pediatric">Pediatric Neurosurgery</option>
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

<?php
$testimonialCategoryQuery = mysqli_query($con, "
    SELECT c_name, featured_img
    FROM category
    WHERE id = 94
    LIMIT 1
");

$testimonialCategory = mysqli_fetch_assoc($testimonialCategoryQuery);

$testimonialQuery = mysqli_query($con, "
    SELECT title, `desc`
    FROM testimonials
    ORDER BY `order` ASC, id ASC
    LIMIT 3
");

$testimonials = [];

if ($testimonialQuery) {
    while ($row = mysqli_fetch_assoc($testimonialQuery)) {
        $testimonials[] = $row;
    }
}
?>

<section class="testimonial-section">
    <img src="<?= htmlspecialchars($testimonialCategory['featured_img']) ?>"
         alt="<?= htmlspecialchars($testimonialCategory['c_name']) ?>"
         class="testimonial-bg">

    <div class="testimonial-overlay">
        <div class="container testimonial-content">

            <div class="testimonial-left">
                <!-- <span class="testimonial-tag">TESTIMONIALS</span> -->
                <h2><?= htmlspecialchars($testimonialCategory['c_name']) ?></h2>
            </div>

            <div class="testimonial-right">
                <div class="testimonial-slider">

                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p><?= isset($testimonials[0]) ? $testimonials[0]['desc'] : '' ?></p>
                            <div class="testimonial-author">
                                <span class="author-name">
                                    <?= isset($testimonials[0]) ? '- ' . htmlspecialchars($testimonials[0]['title']) : '' ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p><?= isset($testimonials[1]) ? $testimonials[1]['desc'] : '' ?></p>
                            <div class="testimonial-author">
                                <span class="author-name">
                                    <?= isset($testimonials[1]) ? '- ' . htmlspecialchars($testimonials[1]['title']) : '' ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <i class="bi bi-quote quote-icon"></i>
                            <p><?= isset($testimonials[2]) ? $testimonials[2]['desc'] : '' ?></p>
                            <div class="testimonial-author">
                                <span class="author-name">
                                    <?= isset($testimonials[2]) ? '- ' . htmlspecialchars($testimonials[2]['title']) : '' ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<?php
$sqlgallery = mysqli_query($con, "
    SELECT file
    FROM gallery_imgs
    WHERE status = 1
    ORDER BY ordering ASC, id ASC
");
?>

<section class="gallery-section">
    <div class="container">

        <div class="gallery-header">
            <span class="gallery-tag">GALLERY</span>
            <h2>Our Clinic Gallery</h2>
        </div>

        <div class="gallery-cards">

            <?php
            if ($sqlgallery && mysqli_num_rows($sqlgallery) > 0) {
                while ($rwgallery = mysqli_fetch_assoc($sqlgallery)) {
            ?>

                <div class="gallery-card">
                    <div class="gallery-card-img">
                        <img src="<?= $path . $rwgallery['file']; ?>"
                             alt="Gallery Image"
                             class="lightbox-trigger">
                    </div>
                </div>

            <?php
                }
            }
            ?>

        </div>

    </div>
</section>

<div id="imageLightbox" class="lightbox-modal" style="display:none;">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightboxImg" alt="Enlarged Image">
</div>

<section class="services-section">
    <div class="container">

        <div class="services-header">
            <span class="services-tag">BLOGS</span>
            <h2>Latest Blogs</h2>
        </div>

        <div class="blog-cards">

            <a href="blogs.php?blog=paralysis" class="blog-card">
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

            <a href="blogs.php?blog=summer" class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/summer heat.png" alt="Summer Heat">
                    <div class="blog-date">
                        <span class="date-day">19</span>
                        <span class="date-month">JUN</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Summer Heat and Neurosurgical Care: Protect Your Brain This Summer</h3>
                    <span class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </span>
                </div>
            </a>

            <a href="blogs.php?blog=migraine" class="blog-card">
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="slick/slick.js"></script>
<script>
    (function () {
        var jq = window.jQuery;
        if (!jq || typeof jq.fn.slick !== 'function') return;

        var common = { infinite: false, autoplay: false, arrows: true, dots: false, swipe: true };

        var perView = [
            { breakpoint: 1199, settings: { slidesToShow: 3 } },
            { breakpoint: 991, settings: { slidesToShow: 2 } }
        ];

        var sliders = [
            ['.services-cards', { slidesToShow: 4, responsive: perView }],
            ['.gallery-cards', { slidesToShow: 4, responsive: perView }],
            ['.blog-cards', {
                slidesToShow: 3,
                responsive: [
                    { breakpoint: 991, settings: { slidesToShow: 2 } },
                    { breakpoint: 767, settings: { slidesToShow: 1 } }
                ]
            }],
            ['.testimonial-slider', {
                slidesToShow: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 4000,
                speed: 500
            }]
        ];

        sliders.forEach(function (item) {
            var $el = jq(item[0]);
            if (!$el.length || $el.hasClass('slick-initialized')) return;

            $el.slick(jq.extend({}, common, item[1]));
        });
    })();
</script>

<?php include 'includes/footer.php'; ?>


