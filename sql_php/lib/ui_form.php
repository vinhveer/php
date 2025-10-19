<?php
function generateTitle($title) {
    echo "
    <tr>
        <td colspan='2' class='title'>
            <h3>$title</h3>
        </td>
    </tr>
    ";
}

function generateInput($title, $name, $type, $sticky_value, $inner = '', $note = '') {
    if (isset($sticky_value)) {
        $echoValue = "value='$sticky_value'";
    }

    echo "
    <tr>
        <td>
            $title
        </td>
        <td>
            <input type='$type' name='$name' $echoValue $inner /> $note
        </td>
    </tr>
    ";
}

function generateSubmit($name, $value) {
    echo "
    <tr>
        <td colspan='2' class='center'>
            <input type='submit' name='$name' value='$value' />
        </td>
    </tr>
    ";
}

function generateRadioChoice($title, $name, $options, $checked_value = null) {
    echo "
    <tr>
        <td>$title</td>
        <td>";
    foreach ($options as $value => $label) {
        $checked = ($value == $checked_value) ? "checked" : "";
        echo "
        <input type='radio' name='$name' value='$value' $checked /> $label
        ";
    }
    echo "
        </td>
    </tr>";
}

function generateTd($col1, $col2) {
    echo "
    <tr>
        <td>
            $col1
        </td>
        <td>
            $col2
        </td>
    </tr>
    ";
}

function generateTdColspan($colspan, $content) {
    echo "
    <tr>
        <td colspan='$colspan'>
            $content
        </td>
    </tr>
    ";
}