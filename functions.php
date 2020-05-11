<?php
// show generate data
function showGenerateKey($key) {
    global $task;
    printf(" value = '%s' ", $key);
}

// data encoding
function scrambleData($originalData,$key){
    $originalKey = "abcdfghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $originalDataLength = strlen($originalData);
    for($i=0; $i<$originalDataLength; $i++){
        $currentChar = $originalData[$i];
        $position = strpos($originalKey,$currentChar);
        if($position !== false){
            $data .= $key[$position];
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}