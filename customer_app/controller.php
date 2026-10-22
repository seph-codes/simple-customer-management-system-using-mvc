<?php
// controller.php
include 'model.php';

$action = $_GET['action'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = false;

    if (isset($_POST['add'])) {
        $ok = add_customer(
            $_POST['name'] ?? '',
            $_POST['email'] ?? '',
            $_POST['phone'] ?? ''
        );
    } elseif (isset($_POST['update'])) {
        $ok = update_customer(
            $_POST['id'] ?? 0,
            $_POST['name'] ?? '',
            $_POST['email'] ?? '',
            $_POST['phone'] ?? ''
        );
    }

    if ($ok) {
        header('Location: index.php');
        exit;
    }

    $error = 'The requested customer operation could not be completed.';
}

if ($action === 'delete' && isset($_GET['id'])) {
    if (delete_customer($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $error = 'Customer could not be deleted.';
    $customers = fetch_all_customers();
    include 'views/list.php';
    exit;
}

if ($action === 'reset') {
    if (reset_customers()) {
        header('Location: index.php');
        exit;
    }

    $error = 'Customers could not be reset.';
    $customers = fetch_all_customers();
    include 'views/list.php';
    exit;
}

$action = $_GET['action'] ?? 'list';

if ($action === 'new') {
    include 'views/form.php';
} elseif ($action === 'edit' && isset($_GET['id'])) {
    $customer = fetch_customer($_GET['id']);
    if ($customer) {
        include 'views/form.php';
    } else {
        $error = 'Customer not found.';
        $customers = fetch_all_customers();
        include 'views/list.php';
    }
} else {
    $customers = fetch_all_customers();
    include 'views/list.php';
}