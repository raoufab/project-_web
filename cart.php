<?php
session_start();

// إنشاء السلة إذا ما كانتش موجودة
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// إضافة منتج
if (isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
    echo count($_SESSION['cart']); // نرجّع عدد المنتجات
    exit;
}

// عرض السلة
if (isset($_GET['action']) && $_GET['action'] === 'view') {
    if (empty($_SESSION['cart'])) {
        echo "🛒 Cart is empty";
    } else {
        echo "🛒 Your Cart:\n";
        foreach ($_SESSION['cart'] as $item) {
            echo "- " . $item . "\n";
        }
    }
}
