<?php
require_once __DIR__ . '/manager/database/db.php';
require_once __DIR__ . '/includes/recaptcha.php';

$contactStatus  = '';
$contactMessage = '';
$contactOld     = ['name' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {

    $contactOld['name']    = trim((string)($_POST['name'] ?? ''));
    $contactOld['email']   = trim((string)($_POST['email'] ?? ''));
    $contactOld['phone']   = trim((string)($_POST['phone'] ?? ''));
    $contactOld['subject'] = trim((string)($_POST['subject'] ?? ''));
    $contactOld['message'] = trim((string)($_POST['message'] ?? ''));

    $validEmail = filter_var($contactOld['email'], FILTER_VALIDATE_EMAIL) !== false;
    $gRecaptcha = trim((string)($_POST['g-recaptcha-response'] ?? ''));

    if ($contactOld['name'] === '' || !$validEmail || $contactOld['phone'] === '' || $contactOld['message'] === '') {
        $contactStatus  = 'error';
        $contactMessage = 'Please fill all the fields with a valid email address.';
    } elseif (!recaptchaVerify($gRecaptcha)) {
        $contactStatus  = 'error';
        $contactMessage = 'Please complete the reCAPTCHA verification and try again.';
    } else {
        $toEmail = trim((string)($emailid ?? ''));
        if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
            $toEmail = trim((string)($alternateemailid ?? ''));
        }
        if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
            $toEmail = 'tusharsharma6868@gmail.com';
        }

        $esc = function ($value) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        };

        $body = '<div style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#222222;">'
              . '<h2 style="margin:0 0 12px;color:#0d6efd;">New Contact Us Message</h2>'
              . '<table cellpadding="6" cellspacing="0" style="border-collapse:collapse;">'
              . '<tr><td><strong>Name</strong></td><td>' . $esc($contactOld['name']) . '</td></tr>'
              . '<tr><td><strong>Email</strong></td><td>' . $esc($contactOld['email']) . '</td></tr>'
              . '<tr><td><strong>Phone</strong></td><td>' . $esc($contactOld['phone']) . '</td></tr>'
              . '<tr><td><strong>Subject</strong></td><td>' . $esc($contactOld['subject']) . '</td></tr>'
              . '</table>'
              . '<p style="margin:14px 0 4px;"><strong>Message:</strong></p>'
              . '<p style="margin:0;white-space:pre-line;">' . $esc($contactOld['message']) . '</p>'
              . '</div>';

        $subjectLine = 'Contact Us: ' . ($contactOld['subject'] !== '' ? $contactOld['subject'] : 'New Enquiry');

        $sent = SendEmailer($toEmail, $subjectLine, $body);

        if ($sent) {
            $contactStatus  = 'success';
            $contactMessage = 'Thank you! Your message has been sent. We will get back to you soon.';
            $contactOld     = ['name' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
        } else {
            $contactStatus  = 'error';
            $contactMessage = 'Sorry, your message could not be sent right now. Please try again or contact us directly by phone/email.';
        }
    }
}

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

            <?php if ($contactStatus !== '') { ?>
                <div class="form-msg <?= $contactStatus === 'success' ? 'msg-success' : 'msg-error' ?>">
                    <?= htmlspecialchars($contactMessage, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php } ?>

            <form class="contact-form" method="post" action="contact.php">
                <div class="form-row-2">
                    <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($contactOld['name'], ENT_QUOTES, 'UTF-8') ?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($contactOld['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="form-row-2">
                    <input type="tel" name="phone" placeholder="Phone" value="<?= htmlspecialchars($contactOld['phone'], ENT_QUOTES, 'UTF-8') ?>" required>
                    <input type="text" name="subject" placeholder="Subject" value="<?= htmlspecialchars($contactOld['subject'], ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <textarea name="message" placeholder="Message" rows="5" required><?= htmlspecialchars($contactOld['message'], ENT_QUOTES, 'UTF-8') ?></textarea>

                <div class="recaptcha-wrap">
                    <div class="g-recaptcha"
                         data-sitekey="<?= htmlspecialchars(RECAPTCHA_SITE_KEY, ENT_QUOTES, 'UTF-8') ?>"
                         data-theme="light"></div>
                </div>

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