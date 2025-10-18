<?php
function displayTable($result) {
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<div class='no-results'>No results found</div>";
        return;
    }
    
    // Get field information
    $fields = mysqli_fetch_fields($result);
    
    echo "<div class='table-container'>";
    echo "<table class='data-table'>";
    echo "<thead>";
    echo "<tr>";
    
    // Display column headers with full field names
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr>";
    echo "</thead>";
    
    echo "<tbody>";
    
    // Reset result pointer
    mysqli_data_seek($result, 0);
    
    // Display data rows
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

function displayTableWithCount($result) {
    if (!$result) {
        echo "<div class='error'>Query failed</div>";
        return;
    }
    
    $rowCount = mysqli_num_rows($result);
    
    if ($rowCount == 0) {
        echo "<div class='no-results'>No results found</div>";
        return;
    }
    
    // Get field information
    $fields = mysqli_fetch_fields($result);
    
    echo "<div class='table-container'>";
    echo "<div class='row-count'>$rowCount rows</div>";
    echo "<table class='data-table'>";
    echo "<thead>";
    echo "<tr>";
    
    // Display column headers
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr>";
    echo "</thead>";
    
    echo "<tbody>";
    
    // Reset result pointer
    mysqli_data_seek($result, 0);
    
    // Display data rows
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
?>