<?php
include '../db_connect.php';

$slug = $_GET['slug'] ?? '';

// Check if this slug exists in categories table
$stmt = $conn->prepare("SELECT id FROM categories WHERE slug = :slug LIMIT 1");
$stmt->execute([':slug' => $slug]);

if ($stmt->rowCount() > 0) {
    // It's a category - redirect to /blogs/categories/<slug>
    header("Location: /blogs/categories/" . urlencode($slug), true, 301);
    exit;
} else {
    // It's a post - continue to blog.php
    include '../blog.php';
}