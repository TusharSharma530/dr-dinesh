<?php
require_once __DIR__ . '/../manager/database/db.php';

header('Content-Type: application/json; charset=utf-8');

function subRespond($ok, $message)
{
    echo json_encode(['ok' => (bool)$ok, 'message' => $message]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    subRespond(false, 'Invalid request.');
}

$email = strtolower(trim((string)($_POST['email'] ?? '')));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    subRespond(false, 'Please enter a valid email address.');
}

$ip = substr((string)($_SERVER['REMOTE_ADDR'] ?? ''), 0, 45);

$escEmail = mysqli_real_escape_string($con, $email);
$escIp    = mysqli_real_escape_string($con, $ip);

// Already subscribed?
$check = mysqli_query($con, "SELECT `id` FROM `subscribe` WHERE `email` = '" . $escEmail . "' LIMIT 1");
if ($check && mysqli_num_rows($check) > 0) {
    subRespond(true, 'This email is already subscribed. Thank you!');
}

$insert = mysqli_query($con, "INSERT INTO `subscribe` (`email`, `ip`) VALUES ('" . $escEmail . "', '" . $escIp . "')");

if ($insert) {
    subRespond(true, 'Thank you for subscribing! You will now receive our latest updates.');
}

subRespond(false, 'Sorry, something went wrong. Please try again.');
