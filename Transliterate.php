<?php

namespace Prskvs;

class Transliterate {

    const EL_GR = ['α' => 'a', 'ά' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd',
        'ε' => 'e', 'έ' => 'e', 'ζ' => 'z', 'η' => 'i', 'ή' => 'i', 'θ' => 'th',
        'ι' => 'i', 'ί' => 'i', 'ϊ' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm',
        'ν' => 'n', 'ξ' => 'ks', 'ο' => 'o', 'ό' => 'o', 'π' => 'p', 'ρ' => 'r',
        'σ' => 's', 'ς' => 's', 'τ' => 't', 'υ' => 'y', 'ύ' => 'y', 'ϋ' => 'y',
        'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'o', 'ώ' => 'o', 'Α' => 'A',
        'Ά' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Έ' => 'E',
        'Ζ' => 'Z', 'Η' => 'I', 'Θ' => 'TH', 'Ι' => 'I', 'Ί' => 'I', 'Ϊ' => 'I',
        'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => 'KS', 'Ο' => 'O',
        'Ό' => 'O', 'Π' => 'P', 'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y',
        'Ύ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'O', 'Ώ' => 'O'];

    const GR_SPECIALS = ['ay' => 'au', 'ey' => 'eu', 'oy' => 'ou',
        'Ay' => 'Au', 'Ey' => 'Eu', 'Oy' => 'Ou',
        'AY' => 'AU', 'EY' => 'EU', 'OY' => 'OU'];

    /**
     * @param string $str
     * @return string
     */
    public static function greeklish($str) {
        $str = str_replace(array_keys(static::EL_GR), array_values(static::EL_GR), $str);
        // Handle letter combinations
        $str = str_replace(array_keys(static::GR_SPECIALS), array_values(static::GR_SPECIALS), $str);
        return $str;
    }

    /**
     * @param string $str
     * @return string
     */
    public static function slug($str) {
        $str = mb_strtolower(static::greeklish($str));
        // Whitespace to dash
        $str = preg_replace("/[ \s\t\n]+/", '-', $str);
        // Strip non valid characters
        $str = preg_replace("/[^0-9a-zA-Z_\-]/", '', $str);
        // Single dashes only. No underscores
        $str = preg_replace('/[-_]+/', '-', $str);

        return $str;
    }

    /**
     * @param $str
     * @return bool
     */
    public static function hasNonLatin($str) {
        preg_match('/(?=\pL)(?![a-zA-Z])/s', $str, $matches);
        if (!empty($matches)) {
            return true;
        }

        return false;
    }

}
?>