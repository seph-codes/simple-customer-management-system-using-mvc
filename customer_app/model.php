<?php
// model.php[cite: 1, 2]

function db_connect() {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'customer_db'
    ) or die('DB connect error '.mysqli_connect_error());
    return $conn;
}

function fetch_all_customers() {
    $c = db_connect();
    $sql = 'SELECT * FROM customers ORDER BY created_at DESC';
    $res = mysqli_query($c, $sql);
    $rows = [];
    while ($r = mysqli_fetch_assoc($res)) {
        $rows[] = $r;
    }
    mysqli_close($c);
    return $rows;
}

function fetch_customer($id) {
    $c = db_connect();
    $id_safe = (int)$id;
    $sql = "SELECT * FROM customers WHERE id=$id_safe";
    $res = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($res);
    mysqli_close($c);
    return $row;
}

function add_customer($name, $email, $phone) {
    $c = db_connect();
    $n = mysqli_real_escape_string($c, $name);
    $e = mysqli_real_escape_string($c, $email);
    $p = mysqli_real_escape_string($c, $phone);
    if ($n === '' || $e === '') {
        mysqli_close($c);
        return false;
    }
    $sql = "INSERT INTO customers (name,email,phone)
            VALUES ('$n','$e','$p')";
    $ok = mysqli_query($c, $sql);
    mysqli_close($c);
    return $ok;
}
