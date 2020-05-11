<?php
// show generate data
function showGenerateKey($key) {
    global $task;
    printf(" value = '%s' ", $key);
}

// data encoding
function scrambleData($originalData, $key) {
    $originalKey        = "abcdfghijklmnopqrstuvwxyz1234567890";
    $data               = '';
    $originalDataLength = strlen($originalData);
    for ($i = 0; $i < $originalDataLength; $i++) {
        $currentChar = $originalData[$i];
        $position    = strpos($originalKey, $currentChar);
        if ($position !== false) {
            $data .= $key[$position];
        } else {
            $data .= $currentChar;
        }
    }
    return $data;
}

// decode data
function decodeData($encodeData, $key) {
    $originalKey      = "abcdfghijklmnopqrstuvwxyz1234567890";
    $data             = '';
    $encodeDataLenght = strlen($encodeData);
    for ($i = 0; $i < $encodeDataLenght; $i++) {
        $currentChar = $encodeData[$i];
        $position    = strpos($key, $currentChar);
        if ($position !== false) {
            $data .= $originalKey[$position];
        } else {
            $data .= $currentChar;
        }
    }

    return $data;
}