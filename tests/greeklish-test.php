<?php

require __DIR__ . '/../Transliterate.php';

use Transliterate\Transliterate;

$str = 'Γειά σου κόσμε! Αυτό είναι ένα παράδειγμα ώστε να δοκιμάσουμε τα greeklish. Εν το μεταξύ, οι λέξεις είναι "ΑνΌμοΙΕς"!';
$expected_str = 'Geia sou kosme! Auto einai ena paradeigma oste na dokimasoume ta greeklish. En to metaksy, oi lekseis einai "AnOmoIEs"!';

$translited_str = Transliterate::greeklish($str);

if ($translited_str === $expected_str) {
    echo "-- Test successful --\n";
}
else {
    echo "-- Test Failed! --\n";
}

echo " - Test 1 (greeklish):\n";
echo "Expect: " . $expected_str . "\n";
echo "Result: " . $translited_str . "\n";