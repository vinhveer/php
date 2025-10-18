<?php 
function isNumber($data, $name) {
    if (is_numeric($data)) {
        return true;
    } else {
        echo "$name phải là số <br />";
        return false;
    }
}

function isGrade($data, $name) {
    if (is_numeric($data)) {
        if ($data < 0 || $data > 10) {
            echo "Giá trị của $name phải nằm trong khoảng từ 0 đến 10 <br />";
            return false;
        } else {
            return true;
        }
    } else {
        echo "$name phải là số <br />";
        return false;
    }
}

function isDiemChuan($data, $name) {
    if (is_numeric($data)) {
        if ($data < 0 || $data > 30) {
            echo "Giá trị của $name phải nằm trong khoảng từ 0 đến 30 <br />";
            return false;
        } else {
            return true;
        }
    } else {
        echo "$name phải là số <br />";
        return false;
    }
}

function isValidTime($data, $name) {
    $arr_time = getTimeArray($data);

    $hour = $arr_time[0];
    $minute = $arr_time[1];
    $second = $arr_time[2];

    if ($hour < 0 || $hour > 23) {
        echo "Giờ trong $name phải từ 0 đến 23 <br />";
        return false;
    }

    if ($hour = 0 || $hour > 10) {
        echo "Giờ trong $name phải từ 10h đến 0h ngày hôm sau <br />";
        return false;
    }

    if ($minute < 0 || $minute > 59) {
        echo "Phút trong $name phải từ 0 đến 59 <br />";
        return false;
    }

    if ($second < 0 || $second > 59) {
        echo "Giây trong $name phải từ 0 đến 59 <br />";
        return false;
    }

    return true;
}

function isPositiveInteger($data, $name) {
    if (is_numeric($data)) {
        $num = (int)$data;
        if ($num > 0 && $num == $data) {
            return true;
        } else {
            echo "$name phải là số nguyên dương <br />";
            return false;
        }
    } else {
        echo "$name phải là số <br />";
        return false;
    }
}

function isNumberArray($data, $name) {
    $mang_so = explode(",", $data);
    
    foreach ($mang_so as $phan_tu) {
        $phan_tu = trim($phan_tu);
        if (!is_numeric($phan_tu) && $phan_tu !== "") {
            echo "Phần tử '$phan_tu' trong $name không phải là số hợp lệ<br />";
            return false;
        }
    }
    
    return true;
}

function isArraySize($data, $name) {
    if (is_numeric($data)) {
        $num = (int)$data;
        if ($num >= 0 && $num <= 20 && $num == $data) {
            return true;
        } else {
            echo "$name phải là số từ 0 đến 20<br />";
            return false;
        }
    } else {
        echo "$name phải là số<br />";
        return false;
    }
}

function isYear($data, $name) {
    if (is_numeric($data)) {
        $year = (int)$data;
        if ($year > 0 && $year == $data) {
            return true;
        } else {
            echo "$name phải là năm hợp lệ<br />";
            return false;
        }
    } else {
        echo "$name phải là số<br />";
        return false;
    }
}