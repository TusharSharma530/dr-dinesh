<?php
$pageTitle = 'Blogs';
$pageBreadcrumb = 'Blogs';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<section class="services-section">
    <div class="container">

        <div class="blog-cards">

            <div class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/paralysis.png" alt="Paralysis">
                    <div class="blog-date">
                        <span class="date-day">19</span>
                        <span class="date-month">MAY</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Paralysis: Causes, Symptoms, Treatment & Recovery</h3>
                    <a href="blog-paralysis.php" class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </a>
                </div>
            </div>

            <div class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/summer heat.png" alt="Summer Heat">
                    <div class="blog-date">
                        <span class="date-day">19</span>
                        <span class="date-month">JUN</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Summer Heat and Neurological Health: Protect Your Brain This Summer</h3>
                    <a href="summer-heat.php" class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </a>
                </div>
            </div>

            <div class="blog-card">
                <div class="blog-card-img">
                    <img src="assets/images/maigraine.png" alt="Migraine Treatment">
                    <div class="blog-date">
                        <span class="date-day">10</span>
                        <span class="date-month">JUL</span>
                    </div>
                </div>
                <div class="blog-card-body">
                    <h3>Migraine Treatment: Recurring Headaches Should Not Be Ignored</h3>
                    <a href="blog-migraine.php" class="blog-read-more">
                        <span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>
                        Read More
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<?php
include 'includes/footer.php';
?>
