<?php
// category-redirect.php - Check if slug is a category and redirect
include 'db_connect.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if ($slug === '') {
    header("Location: https://sisgain.com/blogs/", true, 301);
    exit;
}

// Check if this slug exists as a category
$stmt = $conn->prepare("SELECT slug FROM categories WHERE slug = :slug LIMIT 1");
$stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
$stmt->execute();
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if ($category) {
    // It's a category slug, redirect to /categories/slug
    header("Location: https://sisgain.com/blogs/categories/" . urlencode($slug), true, 301);
    exit;
}

// Not a category, treat as a blog post slug
$_GET['slug'] = $slug;
include 'blog.php';
exit;