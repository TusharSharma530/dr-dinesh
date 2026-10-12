<?php

if (!defined('RECAPTCHA_SITE_KEY')) {
    define('RECAPTCHA_SITE_KEY', '6LfBGs4tAAAAABAa8yv-Y4QEm7PR9QJFJUl8zlyn');
}
if (!defined('RECAPTCHA_SECRET_KEY')) {
    define('RECAPTCHA_SECRET_KEY', '6LfBGs4tAAAAAKQuFneYW7UDK1y6XSD2wNrVb2BD');
}

/**
 * Verify the token posted by the reCAPTCHA widget.
 * Returns true when Google says the challenge was solved.
 */
function recaptchaVerify($token)
{
    $token = trim((string)$token);
    if ($token === '') {
        return false;
    }

    $payload = http_build_query([
        'secret'   => RECAPTCHA_SECRET_KEY,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ]);

    $url     = 'https://www.google.com/recaptcha/api/siteverify';
    $rawData = false;

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
        ]);
        $rawData = curl_exec($ch);
        curl_close($ch);
    } else {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $payload,
                'timeout' => 10,
            ],
        ]);
        $rawData = @file_get_contents($url, false, $context);
    }

    if ($rawData === false || $rawData === '') {
        return false;
    }

    $result = json_decode($rawData, true);

    return is_array($result) && !empty($result['success']);
}
