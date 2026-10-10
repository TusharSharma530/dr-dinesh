<?php
$pageTitle = $pageTitle ?? 'Page';
$pageBreadcrumb = $pageBreadcrumb ?? 'Home';
?>

<?php
$bannerQuery = mysqli_query($con, "SELECT wb_img FROM web_banner LIMIT 1");
$bannerData = mysqli_fetch_assoc($bannerQuery);
?>

<section class="page-banner-section">
    <img src="<?= htmlspecialchars($bannerData['wb_img'], ENT_QUOTES, 'UTF-8') ?>" alt="Banner" class="page-banner-bg">
    <div class="page-banner-dark"></div>
    <div class="page-banner-overlay">
        <div class="container">
            <h1><?php echo $pageTitle; ?></h1>
            <div class="page-breadcrumb">
                <span>NEUROSURGICAL</span>
                <i class="bi bi-chevron-right"></i>
                <span><?php echo strtoupper($pageBreadcrumb); ?></span>
            </div>
        </div>
    </div>
</section>
