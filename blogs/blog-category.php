<?php
// blog-category.php - Category Blog List with Slug URLs
session_start();
include 'db_connect.php';

// Get the category slug from the URL
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') {
    die('Invalid category.');
}

// Fetch category details by slug
$categoryStmt = $conn->prepare("SELECT * FROM categories WHERE slug = :slug");
$categoryStmt->bindParam(':slug', $slug, PDO::PARAM_STR);
$categoryStmt->execute();
$category = $categoryStmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    die("Category not found.");
}

// Get category_id for posts query
$category_id = (int)$category['id'];

// Fetch posts for this category (include category_slug for links)
$postsStmt = $conn->prepare("
  SELECT p.*, c.name AS category_name, c.id AS category_id, c.slug AS category_slug
  FROM posts p
  JOIN categories c ON p.category_id = c.id
  WHERE p.status = 'enabled' AND p.category_id = :category_id
  ORDER BY p.createdDate DESC
");
$postsStmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$postsStmt->execute();
$posts = $postsStmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all posts for the sidebar (include category_slug)
$allStmt = $conn->prepare("
  SELECT p.slug, p.title, p.banner_image, p.createdDate,
         c.name AS category_name, c.id AS category_id, c.slug AS category_slug
  FROM posts p
  LEFT JOIN categories c ON p.category_id = c.id
  WHERE p.status = 'enabled'
  ORDER BY p.createdDate DESC
");
$allStmt->execute();
$allPosts = $allStmt->fetchAll(PDO::FETCH_ASSOC);

// Function to truncate HTML safely
function truncate_html($html)
{
    $doc = new DOMDocument();
    @$doc->loadHTML('<?xml encoding="UTF-8">' . $html);
    $text = $doc->textContent;
    return substr($text, 0);
}
// Get category_id for posts query
$category_id = (int)$category['id'];

// Set canonical URL for this category page
$canonical = "https://sisgain.com/blogs/categories/" . htmlspecialchars($category['slug']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title><?= htmlspecialchars($category['name']) ?> Articles</title>
    <meta name="description" content="Your One-Stop Repository To Know All About <?= htmlspecialchars($category['name']) ?>">
    <link rel="stylesheet" href="https://sisgain.com/blogs/css/blogcategory.css">
      <link href="https://sisgain.com/assets/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
      <link rel="canonical" href="<?= $canonical ?>">
    <?php include "assets/includes-new/header.php"; ?>
    <link rel="stylesheet" href="https://sisgain.com/blogs/css/Bloghome.css">
</head>
<body>
<?php 
    $url = "home";
    include("../assets/includes-new/navbar.php");
?>

<div class="blog_hero_section">
    <div class="container">
        <h1>Your One-Stop Repository To Know All About 
            <span style="color:navy"><?= htmlspecialchars($category['name']) ?></span>
        </h1>
    </div>
</div>

<div class="container">
    <div class="blog-main-page">
        <div class="pc-blog-list">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-intro">
                        <h2>Recent Posts</h2>
                    </div>

                    <?php foreach ($posts as $post): ?>
                        <div class="row blogListBox">
                            <div class="col-lg-5">
                                <a href="https://sisgain.com/blogs/<?= htmlspecialchars($post['slug']) ?>">
                                    <div class="banner_img">
                                        <img src="https://sisgain.com/blogs/Admin/<?= htmlspecialchars($post['banner_image'] ?? 'default.jpg') ?>" 
                                             alt="<?= htmlspecialchars($post['title']) ?>">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-7 pl-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <?php if (!empty($post['category_slug'])): ?>
                                        <a class="date_category_div" style="background:#0000001c"
                                           href="<?= htmlspecialchars($post['category_slug']) ?>">
                                           <?= htmlspecialchars($post['category_name']) ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="date_category_div" style="background:#0000001c">
                                        <?= date("j M Y", strtotime($post['createdDate'])) ?>
                                    </div>
                                </div>
                                <a href="https://sisgain.com/blogs/<?= htmlspecialchars($post['slug']) ?>">
                                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                                    <p><?= truncate_html($post['content']) ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($posts)): ?>
                        <div class="col-12">
                            <p>No posts found in this category.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4">
                    <div class="related_posts">
                        <h2 class="mb-3 featured_text">Featured Posts</h2>

                        <?php if (!empty($allPosts)): ?>
                            <?php foreach ($allPosts as $p): ?>
                                <div class="all-post-item d-flex align-items-start mb-3 align-items-center">
                                    <a href="https://sisgain.com/blogs/<?= htmlspecialchars($p['slug']) ?>" class="thumb mr-2">
                                        <img src="https://sisgain.com/blogs/Admin/<?= htmlspecialchars($p['banner_image'] ?? 'default.jpg') ?>" 
                                             alt="<?= htmlspecialchars($p['title']) ?>">
                                    </a>
                                    <div class="meta flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <a class="small" href="<?= htmlspecialchars($p['category_slug']) ?>">
                                                <?= htmlspecialchars($p['category_name']) ?>
                                            </a>
                                            <span class="small"><?= date("j M", strtotime($p['createdDate'])) ?></span>
                                        </div>
                                        <a href="https://sisgain.com/blogs/<?= htmlspecialchars($p['slug']) ?>" class="post-title-link"> 
                                            <?= htmlspecialchars($p['title']) ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">No posts found.</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("../assets/includes-new/footer.php"); ?>
</body>
</html>
