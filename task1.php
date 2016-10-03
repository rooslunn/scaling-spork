<?php

function parse_yandex_sms($sms) {
    $fields = [
        'code' => '/\b(?P<%s>\d{4})\b/',
        'account' => '/\b(?P<%s>\d{14})\b/',
        'sum' => '/(?P<%s>[\d]+\,[\d]+)/i',
    ];

    $result = [];

    foreach ($fields as $name => $pattern) {
        $pattern = sprintf($pattern, $name);
        $result[$name] = false;
        if (preg_match($pattern, $sms, $matches)) {
            $result[$name] = $matches[$name];
        }
    }

    return $result;
}

// Test function

$test_sms = [
    'Пароль: 0308 Спишется 395,97р. Перевод на счет 41001000000000',
    '',
    'sum   123456,89 for account 01234567892222  code 2389',
];

foreach ($test_sms as $sms) {
    print_r(parse_yandex_sms($sms));
}
