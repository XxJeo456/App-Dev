<?php

function countCharacters($text) {
    return strlen($text);
}

function upperFirstCharacter($text) {
    return ucfirst($text);
}

function replaceVowels($text) {
    return str_ireplace(
        ['a','e','i','o','u'],
        '@',
        $text
    );
}

function findLetterA($text) {
    return stripos($text, 'a');
}

function reverseName($text) {
    return strrev($text);
}

?>