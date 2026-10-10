<?php
$pageTitle = 'Gallery';
$pageBreadcrumb = 'Gallery';
include 'includes/header.php';

$query = "SELECT file FROM gallery_imgs";
$result = mysqli_query($con, $query);
?>

<?php include 'includes/page-banner.php'; ?>

<section class="services-section gallery-page">
    <div class="container">

        <div class="services-cards">

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="service-card">
                    <div class="service-card-img">
                        <img src="<?php echo htmlspecialchars($row['file']); ?>" alt="Gallery Image" class="lightbox-trigger">
                    </div>
                </div>
            <?php endwhile; ?>

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