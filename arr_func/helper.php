<?php
function getTimeArray($timeString) {
    $timeParts = explode(":", $timeString);

    if (count($timeParts) != 2) {
        return false;
    }

    return [
        'hour' => (int)$timeParts[0],
        'minute' => (int)$timeParts[1]
    ];
}

function processNumberArray($data) {
    $mang_so = explode(",", $data);
    $mang_hop_le = [];
    
    foreach ($mang_so as $phan_tu) {
        $phan_tu = trim($phan_tu);
        if (is_numeric($phan_tu)) {
            $mang_hop_le[] = (float)$phan_tu;
        }
    }
    
    return $mang_hop_le;
}

function generateRandomArray($size) {
    $mang = [];
    for ($i = 0; $i < $size; $i++) {
        $mang[] = rand(0, 20);
    }
    return $mang;
}

function arrayToString($array) {
    return "[" . implode(", ", $array) . "]";
}

function findMaxInArray($array) {
    return empty($array) ? 0 : max($array);
}

function findMinInArray($array) {
    return empty($array) ? 0 : min($array);
}

function sumArray($array) {
    return array_sum($array);
}

function searchInArray($array, $value) {
    $positions = [];
    foreach ($array as $index => $element) {
        if ($element == $value) {
            $positions[] = $index;
        }
    }
    return $positions;
}

function replaceInArray($array, $old_value, $new_value) {
    $new_array = [];
    foreach ($array as $element) {
        if ($element == $old_value) {
            $new_array[] = $new_value;
        } else {
            $new_array[] = $element;
        }
    }
    return $new_array;
}

function sortArrayAsc($array) {
    $sorted_array = $array;
    sort($sorted_array);
    return $sorted_array;
}

function sortArrayDesc($array) {
    $sorted_array = $array;
    rsort($sorted_array);
    return $sorted_array;
}

function calculateLunarYear($year) {
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.gif", "ran.jpg", "ngo.jpg", "mui.jpg", "than.gif", "dau.jpg", "tuat.jpg");
    
    $nam = $year - 3;
    $can = $nam % 10;
    $chi = $nam % 12;
    
    $nam_al = $mang_can[$can];
    $nam_al = $nam_al . " " . $mang_chi[$chi];
    $hinh = $mang_hinh[$chi];
    $hinh_anh = "<img src='img/$hinh'>";
    
    return array(
        'nam_am_lich' => $nam_al,
        'hinh_anh' => $hinh_anh
    );
}