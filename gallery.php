<?php
$pageTitle = 'Gallery';
$pageBreadcrumb = 'Gallery';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<section class="services-section">
    <div class="container">

        <div class="services-cards">

            <div class="service-card">
                <div class="service-card-img">
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

<?php
include 'includes/footer.php';
?>