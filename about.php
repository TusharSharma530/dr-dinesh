<?php
$pageTitle = 'About';
$pageBreadcrumb = 'About';
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


$desc = trim((string)($aboutData['c_desc'] ?? ''));
$imgAlt = $aboutData['c_name'] ?? 'About Us';
?>

<section class="about-section">
    <div class="container about-content">

        <div class="about-text">
            <span class="about-tag">ABOUT US</span>

            <?php if ($desc !== '') { ?>
                <div class="about-desc">
                    <?= $desc ?>
                </div>
            <?php } ?>

            <?php
       
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
                    continue; 
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

        </div>

        <div class="about-image">
            <img src="<?= htmlspecialchars($aboutData['featured_img'] ?? '', ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($imgAlt, ENT_QUOTES, 'UTF-8') ?>">
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>