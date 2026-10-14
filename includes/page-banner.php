<?php
$pageTitle = $pageTitle ?? 'Page';
$pageBreadcrumb = $pageBreadcrumb ?? 'Home';

$bannerQuery = mysqli_query($con, "SELECT wb_img FROM web_banner LIMIT 1");
$bannerData = $bannerQuery ? mysqli_fetch_assoc($bannerQuery) : null;
$bannerImage = $bannerData['wb_img'] ?? '';
$hasBanner = $bannerImage !== '';
?>

<section class="page-banner-section<?= $hasBanner ? '' : ' page-banner-solid' ?>">
    <?php if ($hasBanner): ?>
        <img src="<?= htmlspecialchars($bannerImage, ENT_QUOTES, 'UTF-8') ?>" alt="Banner" class="page-banner-bg">
        <div class="page-banner-dark"></div>
    <?php endif; ?>
    <div class="page-banner-overlay">
        <div class="container">
            <h1><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
            <div class="page-breadcrumb">
                <span>NEUROSURGICAL</span>
                <i class="bi bi-chevron-right"></i>
                <span><?php echo strtoupper(htmlspecialchars($pageBreadcrumb, ENT_QUOTES, 'UTF-8')); ?></span>
            </div>
        </div>
    </div>
</section>
