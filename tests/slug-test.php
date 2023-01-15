<?php

require __DIR__ . '/../Transliterate.php';

use Prskvs\Transliterate;

$str = 'Αυτό το κείμενο @$& ___+
πρέπει να μην <περιέχει> ΚΑΝΕΝΑ ΚΕΦΑλαίο, κενό   ή π3ρ!εργ0χαρακτήρ@!.';
$expected_str = 'auto-to-keimeno-prepei-na-min-periexei-kanena-kefalaio-keno-i-p3rerg0xaraktir';

$translited_str = Transliterate::slug($str);

if ($translited_str === $expected_str) {
    echo "-- Test successful --\n";
} else {
    echo "-- Test Failed! --\n";
}

echo " - Test 1 (url slug):\n";
echo "Expect: " . $expected_str . "\n";
echo "Result: " . $translited_str . "\n";