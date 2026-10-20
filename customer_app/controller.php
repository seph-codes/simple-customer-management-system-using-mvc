<?php
// controller.php
include 'model.php';

// if form submitted to add or edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        add_customer($_POST['name'], $_POST['email'], 
$_POST['phone']);
        header('Location: index.php');
        exit;
    }
}

// determine which view to show
$action = $_GET['action'] ?? 'list';

if ($action === 'new') {
    include 'views/form.php';
} elseif ($action === 'edit' && isset($_GET['id'])) {
    $customer = fetch_customer($_GET['id']);
    include 'views/form.php';
} else {
    $customers = fetch_all_customers();
    include 'views/list.php';
}