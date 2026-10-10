<?php
$pageTitle = 'Blogs';
$pageBreadcrumb = 'Blogs';
include 'includes/header.php';

$blog = isset($_GET['blog']) ? $_GET['blog'] : '';

$query = "SELECT * FROM blogs";
$result = mysqli_query($con, $query);

$blogs = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $key = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $row['title']), '-'));

        $blogs[$key] = [
            'title' => $row['title'],
            'image' => $row['file'],
            'alt'   => $row['title'],
            'desc'  => $row['desc'],
            'day'   => date('d', strtotime($row['date'])),
            'month' => strtoupper(date('M', strtotime($row['date'])))
        ];
    }
}

if ($blog && isset($blogs[$blog])) {
    $pageTitle = $blogs[$blog]['title'];
}

include 'includes/page-banner.php';

if ($blog && isset($blogs[$blog])) {
    $b = $blogs[$blog];

    echo '<section class="blog-detail-section">';
    echo '<div class="container blog-detail-container">';
    echo '<div class="blog-detail-img"><img src="' . htmlspecialchars($b['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($b['alt'], ENT_QUOTES, 'UTF-8') . '"></div>';
    echo '<div class="blog-detail-content">';
    echo '<h1>' . htmlspecialchars($b['title'], ENT_QUOTES, 'UTF-8') . '</h1>';
    echo '<p class="blog-author">By Dr. Dinesh Singh – Neurosurgeon in Meerut</p>';

    echo '<div class="blog-description">';
    echo $b['desc'];
    echo '</div>';

    echo '</div></div></section>';

} else {
    echo '<section class="services-section blog-page"><div class="container">';
    echo '<div class="services-header"><span class="services-tag">BLOGS</span><h2>Latest Blogs</h2></div>';
    echo '<div class="blog-cards">';

    foreach ($blogs as $key => $b) {
        echo '<a href="blogs.php?blog=' . urlencode($key) . '" class="blog-card">';
        echo '<div class="blog-card-img">';
        echo '<img src="' . htmlspecialchars($b['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($b['alt'], ENT_QUOTES, 'UTF-8') . '">';
        echo '<div class="blog-date"><span class="date-day">' . $b['day'] . '</span><span class="date-month">' . $b['month'] . '</span></div>';
        echo '</div>';
        echo '<div class="blog-card-body">';
        echo '<h3>' . htmlspecialchars($b['title'], ENT_QUOTES, 'UTF-8') . '</h3>';
        echo '<span class="blog-read-more"><span class="blog-read-icon"><i class="bi bi-chevron-right"></i></span>Read More</span>';
        echo '</div></a>';
    }

    echo '</div></div></section>';
}

include 'includes/footer.php';
?>