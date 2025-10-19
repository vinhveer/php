<?php
function generateTitle($title) {
    echo "<div class='title'><h2>" . htmlspecialchars($title) . "</h2></div>";
}

function generateTable($data, $headers = [], $isSTT = false)
{
    if (empty($data)) {
        echo '<p>Không có dữ liệu.</p>';
        return;
    }

    // Xử lý headers
    $columns = [];
    $labels = [];
    $mappings = [];

    if (empty($headers)) {
        $columns = array_keys($data[0]);
        $labels = $columns;
    } else {
        foreach ($headers as $key => $val) {
            // Nếu key có dạng "table.column" thì chỉ lấy phần sau dấu chấm
            if (strpos($key, '.') !== false) {
                $key = explode('.', $key)[1];
            }

            $columns[] = $key;

            // Nếu có ánh xạ giá trị
            if (is_array($val)) {
                $labels[] = $val[0];
                $mappings[$key] = $val[1];
            } else {
                $labels[] = $val;
            }
        }
    }

    // Bắt đầu tạo bảng
    $html = '<table>';

    // Tiêu đề
    $html .= '<tr>';

    if ($isSTT) {
        $html .= '<th>STT</th>';
    }

    foreach ($labels as $label) {
        $html .= '<th>' . htmlspecialchars($label) . '</th>';
    }
    $html .= '</tr>';

    $stt = 1;
    foreach ($data as $row) {
        $html .= '<tr>';
        if ($isSTT) {
            $html .= '<td>' . $stt++ . '</td>';
        }   
        foreach ($columns as $col) {
            $value = isset($row[$col]) ? $row[$col] : '';
            if (isset($mappings[$col])) {
                $cell = $mappings[$col][$value] ?? htmlspecialchars($value);
            } else {
                $cell = htmlspecialchars($value);
            }
            $html .= '<td>' . $cell . '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</table>';
    echo $html;
}

function generateList($data)
{
    $html = "<table>";
    foreach ($data as $item) {
        $html .= "<tr>";
        $html .= "<td><img src='" . htmlspecialchars($item['Hinh']) . "' /></td>";
        $html .= "<td>
        <p><strong>" . htmlspecialchars($item['Ten_sua']) . "</strong></p>
        </td>
        </tr>";
    }
}

function generatePagination($totalItems, $pagination, $baseUrl)
{
    // $pagination = ['count' => itemsPerPage, 'start_at' => offset]
    $perPage  = $pagination['count'];
    $startAt  = $pagination['start_at'];

    if ($perPage <= 0 || $totalItems <= 0) return;

    // Tính tổng số trang
    $totalPages  = ceil($totalItems / $perPage);

    $currentPage = floor($startAt / $perPage) + 1;
    if ($currentPage < 1) $currentPage = 1;
    if ($currentPage > $totalPages) $currentPage = $totalPages;

    $sep = '?';

    echo '<div class="pagination">';

    // Previous
    if ($currentPage > 1) {
        echo '<a href="' . $baseUrl . $sep . 'page=' . ($currentPage - 1) . '">&laquo; Previous</a>';
    }

    // Pages
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo '<span class="current-page">' . $i . '</span>';
        } else {
            echo '<a href="' . $baseUrl . $sep . 'page=' . $i . '">' . $i . '</a>';
        }
    }

    // Next
    if ($currentPage < $totalPages) {
        echo '<a href="' . $baseUrl . $sep . 'page=' . ($currentPage + 1) . '">Next &raquo;</a>';
    }

    echo '</div>';
}
