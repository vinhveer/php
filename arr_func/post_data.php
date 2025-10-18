<?php
function checkPost($field) {
    if (isset($_POST[$field]) && trim($_POST[$field]) != "")
        return true;

    return false;
}

function getPostValue($field, $name = "", ...$checkFunc) {
    if (checkPost($field)) {
        $data = $_POST[$field];

        foreach ($checkFunc as $check) {
            if (!$check($data, $name)) {
                return;
            }
        }

        return $data;
    }
        
    else
        echo "$name không được để trống. Vui lòng kiểm tra lại.<br />";
}

function checkIsset(...$fields) {
    foreach ($fields as $field) {
        if (!isset($field)) {
            return false;
        }
    }

    return true;
}