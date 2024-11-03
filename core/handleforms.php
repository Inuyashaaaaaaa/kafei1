<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertcategorybtn'])) {
    $query = insertcategory($pdo, $_POST['category_name'], $_POST['description']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editcategorybtn'])) {
    $query = updatecategory($pdo, $_POST['category_name'], $_POST['description'], $_GET['category_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Edit failed";
    }
}

if (isset($_POST['deletecategorybtn'])) {
    $query = deletecategory($pdo, $_GET['category_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['insertvariantbtn'])) {
    $query = insertvariant($pdo, $_POST['variant_name'], $_POST['description'], $_POST['price'], $_GET['category_id']);
    if ($query) {
        header("Location: ../view_variants.php?category_id=" . $_GET['category_id']);
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['deletevariantbtn'])) {
    $variant_id = $_GET['variant_id'];
    $category_id = $_GET['category_id'];
    $query = deletevariant($pdo, $variant_id);
    if ($query) {
        header("Location: ../view_variants.php?category_id=" . $category_id); // Redirect back to variants page
    } else {
        echo "Variant deletion failed";
    }
}

if (isset($_POST['editvariantbtn'])) {
    $variant_id = $_GET['variant_id'];
    $category_id = $_GET['category_id'];
    $query = updatevariant($pdo, $_POST['variant_name'], $_POST['description'], $_POST['price'], $variant_id);
    if ($query) {
        header("Location: ../view_variants.php?category_id=" . $category_id); // Redirect back to variants page
    } else {
        echo "Variant update failed";
    }
}


?>


