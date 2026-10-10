<?php
$pageTitle = 'Services';
$pageBreadcrumb = 'Services';
include 'includes/header.php';

$service = isset($_GET['service']) ? $_GET['service'] : '';

$query = "SELECT * FROM services";
$result = mysqli_query($con, $query);

$services = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $key = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $row['title']), '-'));

        $services[$key] = [
            'title' => $row['title'],
            'image' => $row['file'],
            'alt'   => $row['title'],
            'desc'  => $row['desc'],
            'file'  => $key . '.php'
        ];
    }
}

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
    echo '<div class="blog-detail-img"><img src="' . htmlspecialchars($s['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($s['alt'], ENT_QUOTES, 'UTF-8') . '"></div>';
    echo '<div class="blog-detail-content">';
    echo '<h1>' . htmlspecialchars($s['title'], ENT_QUOTES, 'UTF-8') . '</h1>';
    echo '<p class="blog-author">By Dr. Dinesh Singh – Neurosurgeon in Meerut</p>';
    echo '<div class="service-description">' . $s['desc'] . '</div>';
    echo '</div></div></section>';

} else {
    echo '<section class="services-section services-page"><div class="container">';
    echo '<div class="services-header"><span class="services-tag">OUR SERVICES</span><h2>Comprehensive Neurosurgical Care</h2></div>';
    echo '<div class="services-cards">';

    foreach ($services as $key => $s) {
        echo '<a href="services.php?service=' . urlencode($key) . '" class="service-card">';
        echo '<div class="service-card-img"><img src="' . htmlspecialchars($s['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($s['alt'], ENT_QUOTES, 'UTF-8') . '"></div>';
        echo '<div class="service-card-body"><h3>' . htmlspecialchars($s['alt'], ENT_QUOTES, 'UTF-8') . '</h3></div>';
        echo '</a>';
    }

    echo '</div></div></section>';
}

include 'includes/footer.php';
?>