<?php
$pageTitle = 'Services';
$pageBreadcrumb = 'Services';
include 'includes/header.php';

$service = isset($_GET['service']) ? $_GET['service'] : '';

$services = [
    'brain-tumor' => ['title' => 'Brain Tumor Surgery: Causes, Symptoms & Treatment', 'image' => 'stroke management.png', 'alt' => 'Brain Tumor Surgery', 'file' => 'stroke.php'],
    'spine-surgery' => ['title' => 'Spine Surgery: Recurring Headaches Should Not Be Ignored', 'image' => 'maigraine.png', 'alt' => 'Spine Surgery', 'file' => 'migraine.php'],
    'aneurysm' => ['title' => 'Aneurysm Clipping: Causes, Symptoms & Care', 'image' => 'neuromascular.png', 'alt' => 'Aneurysm Clipping', 'file' => 'neuromuscular.php'],
    'dbs' => ['title' => 'Deep Brain Stimulation: Causes, Symptoms & Recovery', 'image' => 'paalysis1.png', 'alt' => 'Deep Brain Stimulation', 'file' => 'paralysis.php'],
    'trauma' => ['title' => 'Neurotrauma Surgery: Causes, Symptoms & Care', 'image' => 'epilepsy treatment.png', 'alt' => 'Neurotrauma Surgery', 'file' => 'epilepsy.php'],
    'pediatric' => ['title' => 'Pediatric Neurosurgery: Causes, Symptoms & Care', 'image' => 'sleep disopder.png', 'alt' => 'Pediatric Neurosurgery', 'file' => 'sleep.php'],
];

$serviceAliases = [
    'stroke' => 'brain-tumor',
    'migraine' => 'spine-surgery',
    'neuromuscular' => 'aneurysm',
    'paralysis' => 'dbs',
    'epilepsy' => 'trauma',
    'sleep' => 'pediatric',
];

if ($service && isset($serviceAliases[$service])) {
    $service = $serviceAliases[$service];
}

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
    include 'includes/services/' . $s['file'];
    echo '</div></div></section>';
} else {
    echo '<section class="services-section"><div class="container">';
    echo '<div class="services-header"><span class="services-tag">OUR SERVICES</span><h2>Comprehensive Neurosurgical Care</h2></div>';
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