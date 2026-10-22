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
    if (!is_string($name) || !is_string($email) || !is_string($phone)
        || $name === '' || $email === '') {
        return false;
    }

    $c = db_connect();
    $n = mysqli_real_escape_string($c, $name);
    $e = mysqli_real_escape_string($c, $email);
    $p = mysqli_real_escape_string($c, $phone);
    $sql = "INSERT INTO customers (name,email,phone)
            VALUES ('$n','$e','$p')";
    $ok = mysqli_query($c, $sql);
    mysqli_close($c);
    return $ok;
}

function update_customer($id, $name, $email, $phone) {
    $id_safe = filter_var($id, FILTER_VALIDATE_INT);
    if ($id_safe === false || $id_safe < 1
        || !is_string($name) || !is_string($email) || !is_string($phone)
        || $name === '' || $email === '') {
        return false;
    }

    $c = db_connect();
    $stmt = mysqli_prepare(
        $c,
        'UPDATE customers SET name = ?, email = ?, phone = ? WHERE id = ?'
    );
    if ($stmt === false) {
        mysqli_close($c);
        return false;
    }

    mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $phone, $id_safe);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($c);
    return $ok;
}

function delete_customer($id) {
    $id_safe = filter_var($id, FILTER_VALIDATE_INT);
    if ($id_safe === false || $id_safe < 1) {
        return false;
    }

    $c = db_connect();
    $stmt = mysqli_prepare($c, 'DELETE FROM customers WHERE id = ?');
    if ($stmt === false) {
        mysqli_close($c);
        return false;
    }

    mysqli_stmt_bind_param($stmt, 'i', $id_safe);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($c);
    return $ok;
}

function reset_customers() {
    $c = db_connect();
    $ok = mysqli_query($c, 'DELETE FROM customers');
    mysqli_close($c);
    return $ok;
}
