<?php
$pageTitle = 'Blogs';
$pageBreadcrumb = 'Blogs';
include 'includes/header.php';

$blog = isset($_GET['blog']) ? $_GET['blog'] : '';

$blogs = [
    'paralysis' => ['title' => 'Paralysis: Causes, Symptoms, Treatment & Recovery', 'image' => 'paralysis.png', 'alt' => 'Paralysis', 'day' => '19', 'month' => 'MAY'],
    'summer'    => ['title' => 'Summer Heat and Neurological Health: Protect Your Brain This Summer', 'image' => 'summer heat.png', 'alt' => 'Summer Heat', 'day' => '19', 'month' => 'JUN'],
    'migraine'  => ['title' => 'Migraine Treatment: Recurring Headaches Should Not Be Ignored', 'image' => 'maigraine.png', 'alt' => 'Migraine Treatment', 'day' => '10', 'month' => 'JUL'],
];

if ($blog && isset($blogs[$blog])) {
    $pageTitle = $blogs[$blog]['title'];
}

include 'includes/page-banner.php';

if ($blog && isset($blogs[$blog])) {
    $b = $blogs[$blog];
    echo '<section class="blog-detail-section">';
    echo '<div class="container blog-detail-container">';
    echo '<div class="blog-detail-img"><img src="assets/images/' . $b['image'] . '" alt="' . $b['alt'] . '"></div>';
    echo '<div class="blog-detail-content">';
    echo '<h1>' . $b['title'] . '</h1>';
    echo '<p class="blog-author">By Dr. Dinesh Singh – Neurosurgeon in Meerut</p>';
    include 'includes/blogs/' . $blog . '.php';
    echo '</div></div></section>';
} else {
    echo '<section class="services-section"><div class="container">';
    echo '<div class="services-header"><span class="services-tag">BLOGS</span><h2>Latest Blogs</h2></div>';
    echo '<div class="blog-cards">';
    foreach ($blogs as $key => $b) {
        echo '<a href="blogs.php?blog=' . $key . '" class="blog-card">';
        echo '<div class="blog-card-img">';
        echo '<img src="assets/images/' . $b['image'] . '" alt="' . $b['alt'] . '">';
        echo '<div class="blog-date"><span class="date-day">' . $b['day'] . '</span><span class="date-month">' . $b['month'] . '</span></div>';
        echo '</div>';
        echo '<div class="blog-card-body">';
        echo '<h3>' . $b['title'] . '</h3>';
        echo '<span class="blog-read-more"><span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>Read More</span>';
        echo '</div></a>';
    }
    echo '</div></div></section>';
}

include 'includes/footer.php';
?>