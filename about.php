<?php
$pageTitle = 'About Us';
$pageBreadcrumb = 'About Us';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<?php
$aboutQuery = mysqli_query($con, "
    SELECT c_name, c_desc, featured_img
    FROM category
    WHERE id = 76
    LIMIT 1
");

$aboutData = $aboutQuery ? mysqli_fetch_assoc($aboutQuery) : null;

$desc = $aboutData['c_desc'] ?? '';

// Extract the existing admin content without changing the page structure
preg_match('/<p\b[^>]*>(.*?)<\/p>/is', $desc, $degreeMatch);
preg_match('/<h3\b[^>]*>(.*?)<\/h3>/is', $desc, $headingMatch);
preg_match_all('/<p\b[^>]*>(.*?)<\/p>/is', $desc, $paragraphMatches);
preg_match('/<ul\b[^>]*>(.*?)<\/ul>/is', $desc, $listMatch);

// The patient count is the paragraph immediately before the UL
$statsText = '';
if (isset($paragraphMatches[1]) && count($paragraphMatches[1]) >= 3) {
    $statsText = trim(strip_tags($paragraphMatches[1][2]));
}
?>

<section class="about-section">
    <div class="container about-content">

        <div class="about-text">
            <span class="about-tag">ABOUT US</span>

            <h2><?= htmlspecialchars($aboutData['c_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></h2>

            <p class="about-degree"><?= $degreeMatch[1] ?? '' ?></p>

            <h3><?= $headingMatch[1] ?? '' ?></h3>

            <p><?= $paragraphMatches[1][1] ?? '' ?></p>

            <?php
            // Dynamic stats — sirf jo value DB se bhari ho wahi card dikhao
            $statItems = [
                ['surgeries',         'Surgeries'],
                ['no_of_experience',  'Years Exp.'],
                ['no_of_patients',    'Total Patients'],
                ['satisfied_patients','Satisfied Patients'],
            ];
            $renderedStats = '';
            foreach ($statItems as $statItem) {
                $statVal = trim((string)($GLOBALS[$statItem[0]] ?? ''));
                if ($statVal === '') {
                    continue; // khali value -> ye card mat dikhao
                }
                $renderedStats .= '<div class="stat-card">'
                    . '<span class="stat-card-num" data-count="' . htmlspecialchars($statVal, ENT_QUOTES, 'UTF-8') . '">'
                    . htmlspecialchars($statVal, ENT_QUOTES, 'UTF-8')
                    . '</span>'
                    . '<span class="stat-card-label">' . htmlspecialchars($statItem[1], ENT_QUOTES, 'UTF-8') . '</span>'
                    . '</div>';
            }
            if ($renderedStats !== '') {
                echo '<div class="about-stats-grid">' . $renderedStats . '</div>';
            }
            ?>

            <ul class="about-list">
                <?php
                if (!empty($listMatch[1])) {
                    preg_match_all('/<li\b[^>]*>(.*?)<\/li>/is', $listMatch[1], $items);

                    foreach ($items[1] as $item) {
                ?>
                    <li><i class="bi bi-check-circle-fill"></i> <?= trim(strip_tags($item)) ?></li>
                <?php
                    }
                }
                ?>
            </ul>

        </div>

        <div class="about-image">
            <img src="<?= htmlspecialchars($aboutData['featured_img'] ?? '', ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($aboutData['c_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>