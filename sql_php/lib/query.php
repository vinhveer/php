<?php
function error($message)
{
    $error = json_encode("Lỗi: " . $message, JSON_UNESCAPED_UNICODE);
    echo "<script>alert($error);</script>";
    exit;
}

function query($conn, $sql)
{

    try {
        $result = $conn->query($sql);
    } catch (mysqli_sql_exception $e) {
        error("Truy vấn thất bại: " . $e->getMessage());
    }

    $data = [];

    if ($result instanceof mysqli_result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
    }

    return $data;
}

function select($conn, $table, $fields, $condition = null, $pagination = null)
{
    $where = $condition ? " WHERE $condition" : "";

    if (!is_array($pagination)) {
        return query($conn, "SELECT $fields FROM $table $where");
    }

    $limit  = $pagination['count'] ?? 10;
    $offset = $pagination['start_at'] ?? 0;

    $countSql = "SELECT COUNT(*) AS total FROM $table $where";
    $total    = query($conn, $countSql)[0]['total'] ?? 0;

    $dataSql = "SELECT $fields FROM $table $where LIMIT $limit OFFSET $offset";
    $data    = query($conn, $dataSql);

    return [
        'data' => $data,
        'pagination' => [
            'count'    => $total,
            'start_at' => $offset,
        ],
    ];
}

function selectAll($conn, $table, $pagination = null)
{
    return select($conn, $table, '*', null, $pagination);
}

function selectWhere($conn, $table, $condition, $pagination = null)
{
    return select($conn, $table, '*', $condition, $pagination);
}

function selectJoin($conn, $baseTable, $joins = [], $where = null, $headers = null, $pagination = null)
{
    if (!empty($headers)) {
        $fields = '';
        foreach (array_keys($headers) as $key) {
            $fields .= ($fields === '' ? '' : ', ') . $key;
        }
    } else {
        $fields = '*';
    }

    $from = $baseTable;
    foreach ($joins as $table => $on) {
        $from .= " JOIN $table ON $on";
    }

    return select($conn, $from, $fields, $where, $pagination);
}
