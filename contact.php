<?php
$pageTitle = 'Contact Us';
$pageBreadcrumb = 'Contact Us';
include 'includes/header.php';
?>

<?php include 'includes/page-banner.php'; ?>

<section class="contact-section">
    <div class="container contact-content">

        <div class="contact-left">
            <h2>Get In Touch</h2>

            <div class="contact-info-item">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h4>Phone Number</h4>
                    <p>
                        <?php echo htmlspecialchars($contactno ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        <?php if (!empty($alternateno)): ?>
                            <br><?php echo htmlspecialchars($alternateno, ENT_QUOTES, 'UTF-8'); ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="contact-info-item">
                <i class="bi bi-geo-alt-fill"></i>
                <div>
                    <h4>Our Location</h4>
                    <p><?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>

            <div class="contact-info-item">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h4>Email Address</h4>
                    <p>
                        <?php
                        $contactEmail = !empty($emailid) ? $emailid : ($alternateemailid ?? '');
                        echo htmlspecialchars($contactEmail, ENT_QUOTES, 'UTF-8');
                        ?>
                    </p>
                </div>
            </div>

            <div class="contact-social">
                <a href="<?php echo htmlspecialchars($instagram ?? '#', ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo htmlspecialchars($facebook ?? '#', ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo htmlspecialchars($youtube ?? '#', ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <div class="contact-right">
            <h2>Contact Us</h2>
            <p class="contact-subtitle">Feel Free to Contact us any time. We will get back to you as soon as we can!</p>

            <form class="contact-form">
                <div class="form-row-2">
                    <input type="text" placeholder="Name" required>
                    <input type="email" placeholder="Email" required>
                </div>

                <div class="form-row-2">
                    <input type="tel" placeholder="Phone" required>
                    <input type="text" placeholder="Subject" required>
                </div>

                <textarea placeholder="Message" rows="5" required></textarea>

                <button type="submit" class="send-btn">SEND MESSAGE</button>
            </form>
        </div>

    </div>
</section>

<section class="map-section">
    <?php if (!empty($mapiframe)): ?>
        <?php if (stripos($mapiframe, '<iframe') !== false): ?>
            <?php echo $mapiframe; ?>
        <?php else: ?>
            <iframe
                src="<?php echo htmlspecialchars($mapiframe, ENT_QUOTES, 'UTF-8'); ?>"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php
include 'includes/footer.php';
?>