<?php
$pageTitle = 'Gallery';
$pageBreadcrumb = 'Gallery';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<section class="services-section gallery-page">
    <div class="container">

        <div class="services-cards">
          <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/stroke management.png" alt="Stroke Management" class="lightbox-trigger">
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/maigraine.png" alt="Stroke Management" class="lightbox-trigger">
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/neuromascular.png" alt="Stroke Management" class="lightbox-trigger">
                </div>
            </div>
            <div class="service-card">
                <div class="service-card-img">
                    <img src="assets/images/neuromascular.png" alt="Stroke Management" class="lightbox-trigger">
                </div>
            </div>
            
        </div>

    </div>
</section>

<div id="imageLightbox" class="lightbox-modal" style="display:none;">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightboxImg" alt="Enlarged Image">
</div>

<?php
include 'includes/footer.php';
?>