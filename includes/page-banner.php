<?php
$pageTitle = $pageTitle ?? 'Page';
$pageBreadcrumb = $pageBreadcrumb ?? 'Home';
?>

<section class="page-banner-section">
    <img src="assets/images/banner2.png" alt="Banner" class="page-banner-bg">
    <div class="page-banner-overlay">
        <div class="container">
            <h1><?php echo $pageTitle; ?></h1>
            <div class="page-breadcrumb">
                <span>NEUROLOGY</span>
                <i class="bi bi-chevron-right"></i>
                <span><?php echo strtoupper($pageBreadcrumb); ?></span>
            </div>
        </div>
    </div>
</section>
 