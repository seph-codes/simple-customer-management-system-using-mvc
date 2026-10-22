<?php
// controller.php
include 'model.php';

// if form submitted to add or edit
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
    } elseif (isset($_POST['delete'])) {
        $ok = delete_customer($_POST['id'] ?? 0);
    } elseif (isset($_POST['reset'])) {
        $ok = reset_customers();
    }

    if ($ok) {
        header('Location: index.php');
        exit;
    }

    $error = 'The requested customer operation could not be completed.';
}

// determine which view to show
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