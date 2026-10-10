<?php
require_once __DIR__ . '/../manager/database/db.php';

$navbarTitles = [];

$navbarQuery = "SELECT c_name, c_url FROM category WHERE c_type = 1 AND status = 1";
$navbarResult = mysqli_query($con,$navbarQuery);

if ($navbarResult) {
    while ($navbarRow = mysqli_fetch_assoc($navbarResult)) {$navbarTitles[$navbarRow['c_url']] =$navbarRow['c_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') : ''; ?></title>
    <meta name="description" content="Professional neurosurgical care and consultation.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsiveness.css">
    <script src="js/script.js" defer></script>
</head>

<body>

<header class="main-header">

    <div class="container header-content">
            <a href="index.php" class="logo" aria-label="Neuro Care Home">
              <img src="<?= htmlspecialchars($logo ?? 'assets/icons/logo.png', ENT_QUOTES, 'UTF-8'); ?>"
                alt="Neuro Care Logo"
                class="logo-img">
            </a>

        <div class="header-right">

            <div class="top-bar">
                <div class="top-bar-content">

                    <div class="top-info">
                        <span>
                            You can request appointment in 24 hours
                        </span>
                    </div>

                    <div class="contact-info">
                        <span>
                            <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                            Email : <?php echo htmlspecialchars($emailid ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </span>

                        <span class="separator" aria-hidden="true"></span>

                        <span>
                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                            Phone : <?php echo htmlspecialchars($contactno ?? '', ENT_QUOTES, 'UTF-8'); ?><?php if (!empty($alternateno)) { echo ', ' . htmlspecialchars($alternateno, ENT_QUOTES, 'UTF-8'); } ?>
                        </span>

                        <span class="separator" aria-hidden="true">|</span>

                        <div class="social-icons">

                            <a href="<?php echo htmlspecialchars($facebook ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>

                            <a href="<?php echo htmlspecialchars($instagram ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>

                            <a href="<?php echo htmlspecialchars($youtube ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                               target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                <i class="bi bi-youtube" aria-hidden="true"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar">

                <nav class="nav-links" id="main-navigation" aria-label="Main Navigation">

                    <a href="index.php">
                        <?php echo htmlspecialchars($navbarTitles['home'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                    <a href="about.php">
                        <?php echo htmlspecialchars($navbarTitles['about-us'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                    <div class="nav-dropdown">
                        <a href="services.php" class="services-toggle"
                           aria-expanded="false" aria-haspopup="true">
                            <span>
                                <?php echo htmlspecialchars($navbarTitles['services'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <i class="bi bi-chevron-down" aria-hidden="true"></i>
                        </a>

                       <div class="dropdown-menu">
                            <?php
                            $subCategoryQuery = "
                                SELECT sc_name
                                FROM sub_cat
                                WHERE cat_id = 95
                                AND status = 1
                                ORDER BY `order` ASC
                            ";

                            $subCategoryResult = mysqli_query($con,$subCategoryQuery);

                            if ($subCategoryResult) {
                                while ($subcategory = mysqli_fetch_assoc($subCategoryResult)) {
                                    $key = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-',$subcategory['sc_name']), '-'));
                                    ?>
                                    <a href="services.php?service=<?php echo urlencode($key); ?>">
                                        <?php
                                        echo htmlspecialchars(
                                            $subcategory['sc_name'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                        ?>
                                    </a>
                                    <?php
                                }
                            } else {
                                error_log('Subcategory query failed: ' . mysqli_error($con));
                            }
                            ?>
                        </div>
                    </div>

                    <a href="gallery.php">
                        <?php echo htmlspecialchars($navbarTitles['gallery'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                    <a href="blogs.php">
                        <?php echo htmlspecialchars($navbarTitles['blogs'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                    <a href="contact.php">
                        <?php echo htmlspecialchars($navbarTitles['contact-us'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                </nav>

                <button class="appointment-btn" type="button" id="appointmentOpenBtn">
                    APPOINTMENT
                </button>

                <button class="menu-toggle" type="button"
                        aria-label="Toggle Navigation Menu"
                        aria-expanded="false"
                        aria-controls="main-navigation">
                    <i class="bi bi-list" aria-hidden="true"></i>
                </button>

            </div>
        </div>
    </div>
</header>

<!-- APPOINTMENT MODAL -->

<div id="appointmentModal" class="appointment-modal"
     role="dialog" aria-modal="true" aria-labelledby="appointmentTitle">

    <div class="appointment-modal-content">

        <button type="button" class="appointment-close"
                id="appointmentCloseBtn" aria-label="Close appointment modal">
            &times;
        </button>

        <h2 id="appointmentTitle">Book Appointment</h2>

        <p class="appointment-subtitle">
            Fill in the details below to book your appointment
        </p>

        <form class="appointment-form" id="appointmentForm">

            <div class="appointment-form-row">
                <input type="text" name="name" placeholder="Full Name"
                       autocomplete="name" required>

                <input type="email" name="email" placeholder="Email Address"
                       autocomplete="email" required>
            </div>

            <div class="appointment-form-row">
                <input type="tel" name="phone" placeholder="Phone Number"
                       autocomplete="tel" required>

                <input type="date" name="date" required>
            </div>

            <div class="appointment-form-row">
                <input type="time" name="time" required>

                <select name="service" required>
                    <option value="" disabled selected>Select Services</option>
                    <?php
                    $modalServicesResult = mysqli_query($con, "
                        SELECT sc_name 
                        FROM sub_cat 
                        WHERE cat_id = 95 
                        AND status = 1 
                        ORDER BY `order` ASC
                    ");

                    if ($modalServicesResult && mysqli_num_rows($modalServicesResult) > 0) {
                        while ($modalService = mysqli_fetch_assoc($modalServicesResult)) {
                            $mTitle = htmlspecialchars($modalService['sc_name'], ENT_QUOTES, 'UTF-8');
                            $mKey   = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-',$modalService['sc_name']), '-'));
                    ?>
                            <option value="<?= htmlspecialchars($mKey, ENT_QUOTES, 'UTF-8') ?>"><?= $mTitle ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <textarea name="message" placeholder="Your Message"
                      rows="4" required></textarea>

            <button type="submit" class="appointment-submit-btn">
                BOOK APPOINTMENT
            </button>

        </form>
    </div>
</div>

</body>
</html>