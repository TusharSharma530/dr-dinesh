<?php
require_once __DIR__ . '/../manager/database/db.php';
require_once __DIR__ . '/recaptcha.php';

header('Content-Type: application/json; charset=utf-8');

function apptRespond($ok, $message)
{
    echo json_encode(['ok' => (bool)$ok, 'message' => $message]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    apptRespond(false, 'Invalid request.');
}

$appt = [
    'name'    => trim((string)($_POST['name'] ?? '')),
    'email'   => trim((string)($_POST['email'] ?? '')),
    'phone'   => trim((string)($_POST['phone'] ?? '')),
    'date'    => trim((string)($_POST['date'] ?? '')),
    'time'    => trim((string)($_POST['time'] ?? '')),
    'service' => trim((string)($_POST['service'] ?? '')),
    'message' => trim((string)($_POST['message'] ?? '')),
];

$serviceName = trim((string)($_POST['service_name'] ?? ''));
if ($serviceName === '') {
    $serviceName = $appt['service'];
}

$emailOk = filter_var($appt['email'], FILTER_VALIDATE_EMAIL) !== false;

if ($appt['name'] === '' || !$emailOk || $appt['phone'] === '' || $appt['date'] === '' || $appt['time'] === '' || $appt['service'] === '') {
    apptRespond(false, 'Please fill all the fields with a valid email address.');
}

if (!recaptchaVerify($_POST['g-recaptcha-response'] ?? '')) {
    apptRespond(false, 'Please complete the reCAPTCHA verification and try again.');
}

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
      . '<h2 style="margin:0 0 12px;color:#0d6efd;">New Appointment Request</h2>'
      . '<table cellpadding="6" cellspacing="0" style="border-collapse:collapse;">'
      . '<tr><td><strong>Name</strong></td><td>' . $esc($appt['name']) . '</td></tr>'
      . '<tr><td><strong>Email</strong></td><td>' . $esc($appt['email']) . '</td></tr>'
      . '<tr><td><strong>Phone</strong></td><td>' . $esc($appt['phone']) . '</td></tr>'
      . '<tr><td><strong>Date</strong></td><td>' . $esc($appt['date']) . '</td></tr>'
      . '<tr><td><strong>Time</strong></td><td>' . $esc($appt['time']) . '</td></tr>'
      . '<tr><td><strong>Service</strong></td><td>' . $esc($serviceName) . '</td></tr>'
      . '</table>';

if ($appt['message'] !== '') {
    $body .= '<p style="margin:14px 0 4px;"><strong>Message:</strong></p>'
           . '<p style="margin:0;white-space:pre-line;">' . $esc($appt['message']) . '</p>';
}

$body .= '</div>';

$subjectLine = 'New Appointment Request: ' . $appt['name'];

$sent = SendEmailer($toEmail, $subjectLine, $body);

if ($sent) {
    apptRespond(true, 'Thank you! Your appointment request has been sent. We will contact you shortly to confirm.');
}

apptRespond(false, 'Sorry, your appointment request could not be sent right now. Please try again.');
