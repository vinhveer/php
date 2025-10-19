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

function generateList($data, $title = "")
{
    $html = "<table>";
    if (!empty($title)) {
        $html .= "<tr><th colspan='2' class='title'><h2>" . htmlspecialchars($title) . "</h2></th></tr>";
    }

    foreach ($data as $item) {
        $html .= "<tr>";
        $html .= "<td class='image'><img src='Hinh_sua/" . htmlspecialchars($item['Hinh']) . "' /></td>";
        $html .= "<td>
        <p><strong>" . htmlspecialchars($item['Ten_sua']) . "</strong></p>

        <p>Nhà sản xuất: " . htmlspecialchars($item['Ten_hang_sua']) . "</p>
        <p>Trọng lượng: " . htmlspecialchars($item['Trong_luong']) . " gr - Đơn giá: " . number_format($item['Don_gia'], 0, ',', '.') . " VNĐ</p>
        </td>
        </tr>";
    }
    $html .= "</table>";
    echo $html;
}

function generateGrid($data, $itemsPerRow = 3, $enableLinks = "", $title = "")
{
    $html = "<table>";
    $count = 0;

    if (!empty($title)) {
        $html .= "<tr><th colspan='{$itemsPerRow}' class='title'><h2>" . htmlspecialchars($title) . "</h2></th></tr>";
    }

    foreach ($data as $item) {
        if ($count % $itemsPerRow == 0) {
            if ($count > 0) {
                $html .= "</tr>";
            }
            $html .= "<tr>";
        }

        $title = htmlspecialchars($item['Ten_sua']);
        if (!empty($enableLinks)) {
            $link = $enableLinks . urlencode($item['Ma_sua']);
            $title = "<a href='{$link}'><strong>{$title}</strong></a>";
        } else {
            $title = "<strong>{$title}</strong>";
        }

        $title .= "<p>" . htmlspecialchars($item['Trong_luong']) . " gr - " . 
            number_format($item['Don_gia'], 0, ',', '.') . " VNĐ</p>";

        $html .= "<td>
            {$title}<br/>
            <img src='Hinh_sua/" . htmlspecialchars($item['Hinh']) . "' 
                 alt='" . htmlspecialchars($item['Ten_sua']) . "' />
        </td>";

        $count++;
    }

    if ($count > 0) {
        $html .= "</tr>";
    }
    $html .= "</table>";

    echo $html;
}

function generateDetails($data, $return = "")
{

    $html = "
    <tr>
        <td colspan='2' class='details-title'>
            <h2>" . htmlspecialchars($data['Ten_sua']) . " - " . htmlspecialchars($data['Ten_hang_sua']) . "</h2>
        </td>
    </tr>

    <tr>
        <td>
            <img src='Hinh_sua/" . htmlspecialchars($data['Hinh']) . "'
                 alt='" . htmlspecialchars($data['Ten_sua']) . "' />
        </td>
        <td>
            <p><strong><i>Thành phần dinh dưỡng:</i></strong><br>"
                . nl2br(htmlspecialchars($data['TP_dinh_duong'])) . "</p>

            <p><strong><i>Lợi ích:</i></strong><br>"
                . nl2br(htmlspecialchars($data['Loi_ich'])) . "</p>

            <p><strong>Trọng lượng:</strong> "
                . htmlspecialchars($data['Trong_luong']) . " gr - <strong>Đơn giá:</strong> "
                . number_format((int)$data['Don_gia'], 0, ',', '.') . " VNĐ</p>
        </td>
    </tr>";

    if (!empty($return)) {
        $html .= "
        <tr>
            <td colspan='2'>
                <a href='" . htmlspecialchars($return) . "'>Quay về</a>
            </td>
        </tr>";
    }

    echo $html;
}

function generateMoreDetails($data) {
    echo "<table>";
    foreach ($data as $item) {
        generateDetails($item);
    }
    echo "</table>";
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