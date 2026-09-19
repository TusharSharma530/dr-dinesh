<?php
$pageTitle = 'Services';
$pageBreadcrumb = 'Services';
include 'includes/header.php';

$service = isset($_GET['service']) ? $_GET['service'] : '';

$services = [
    'stroke'       => ['title' => 'Stroke Management: Causes, Symptoms & Treatment', 'image' => 'stroke management.png', 'alt' => 'Stroke Management'],
    'migraine'     => ['title' => 'Migraine Treatment: Recurring Headaches Should Not Be Ignored', 'image' => 'maigraine.png', 'alt' => 'Migraine Treatment'],
    'neuromuscular'=> ['title' => 'Neuromuscular Treatment: Causes, Symptoms & Care', 'image' => 'neuromascular.png', 'alt' => 'Neuromuscular Treatment'],
    'paralysis'    => ['title' => 'Paralysis Treatment: Causes, Symptoms & Recovery', 'image' => 'paalysis1.png', 'alt' => 'Paralysis Treatment'],
    'epilepsy'     => ['title' => 'Epilepsy Treatment: Causes, Symptoms & Care', 'image' => 'epilepsy treatment.png', 'alt' => 'Epilepsy Treatment'],
    'sleep'        => ['title' => 'Sleep Disorder Treatment: Causes, Symptoms & Care', 'image' => 'sleep disopder.png', 'alt' => 'Sleep Disorder'],
];

if ($service && isset($services[$service])) {
    $pageTitle = $services[$service]['title'];
}

include 'includes/page-banner.php';

if ($service && isset($services[$service])) {
    $s = $services[$service];
    echo '<section class="blog-detail-section">';
    echo '<div class="container blog-detail-container">';
    echo '<div class="blog-detail-img"><img src="assets/images/' . $s['image'] . '" alt="' . $s['alt'] . '"></div>';
    echo '<div class="blog-detail-content">';
    echo '<h1>' . $s['title'] . '</h1>';
    echo '<p class="blog-author">By Dr. Dinesh Singh – Neurosurgeon in Meerut</p>';
    include 'includes/services/' . $service . '.php';
    echo '</div></div></section>';
} else {
    echo '<section class="services-section"><div class="container">';
    echo '<div class="services-header"><span class="services-tag">OUR SERVICES</span><h2>Comprehensive Neurology Care</h2></div>';
    echo '<div class="services-cards">';
    foreach ($services as $key => $s) {
        echo '<a href="services.php?service=' . $key . '" class="service-card">';
        echo '<div class="service-card-img"><img src="assets/images/' . $s['image'] . '" alt="' . $s['alt'] . '"></div>';
        echo '<div class="service-card-body"><h3>' . $s['alt'] . '</h3></div>';
        echo '</a>';
    }
    echo '</div></div></section>';
}

include 'includes/footer.php';
?>