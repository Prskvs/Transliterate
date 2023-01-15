# Transliterate

Transliterate greek letters to latin

## Features

- Greek to greeklish (latin letters)
- Greek to url slug
- Non-latin letter detection in any string

## Usage

```php
use Transliterate\Transliterate;

// Detect non lattin letters
if (Transliterate::hasNonLatin($text)) {
    // Greek to greeklish
    $content = Transliterate::greeklish($text);
}

// Greek to url slug
$filename = Transliterate::slug($filename) . '.jpg';
```

Greeklish format example:

```php
$new_text = Transliterate::greeklish($text);
// $text = "Αύριο θα πάμε κρυφά στο σινεμά!"
// $new_text = "Aurio tha pame kryfa sto sinema!"
```

Slug format example:

```php
$new_filename = Transliterate::slug($filename) . '.jpg';
// $filename = "Η εικόνα μου - (22 01 2023)_copy"
// $new_filename = "i-eikona-mou-22-01-2023-copy.jpg"
```
