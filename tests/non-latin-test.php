<?php

require __DIR__ . '/../Transliterate.php';

use Prskvs\Transliterate;

$str = 'Hello κόσμε!';

if (($has = Transliterate::hasNonLatin($str))) {
    echo "-- Test successful --\n";
}
else {
    echo "-- Test Failed! --\n";
}

echo " - Test 1 (has non-latin):\n";
echo "Expect: " . true . "\n";
echo "Result: " . $has . "\n";