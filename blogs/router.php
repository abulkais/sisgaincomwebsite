<?php
session_start();
include 'db_connect.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

// 1) Try CATEGORY first
$stmt = $conn->prepare("SELECT id FROM categories WHERE slug = :slug LIMIT 1");
$stmt->execute([':slug' => $slug]);
$cat = $stmt->fetch(PDO::FETCH_ASSOC);
if ($cat) {
  $_GET['slug'] = $slug;
  include 'blog-category.php';
  exit;
}

// 2) Then try POST
$stmt = $conn->prepare("SELECT id FROM posts WHERE slug = :slug LIMIT 1");
$stmt->execute([':slug' => $slug]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if ($post) {
  $_GET['slug'] = $slug;
  include 'blog.php';
  exit;
}

// 3) 404 if neither
http_response_code(404);
echo 'Not Found';
