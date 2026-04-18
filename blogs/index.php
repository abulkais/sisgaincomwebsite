<?php
// blogs/index.php – Blog Home Page
session_start();
include 'db_connect.php';

// Enable PDO error reporting for debugging
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Column for ordering posts
$correctDateColumn = 'createdDate';

// === Queries ===
$query = "SELECT p.*, c.name AS category_name, c.id AS category_id, c.slug AS category_slug
          FROM posts p
          LEFT JOIN categories c ON p.category_id = c.id
          WHERE p.status = 'enabled'
          ORDER BY p.$correctDateColumn DESC
          LIMIT 4 OFFSET 1";

$query2 = "SELECT p.*, c.name AS category_name, c.id AS category_id, c.slug AS category_slug
           FROM posts p
           LEFT JOIN categories c ON p.category_id = c.id
           WHERE p.status = 'enabled'
           ORDER BY p.$correctDateColumn DESC
           LIMIT 1";

$query3 = "SELECT p.*, c.name AS category_name, c.id AS category_id, c.slug AS category_slug
           FROM posts p
           LEFT JOIN categories c ON p.category_id = c.id
           WHERE p.status = 'enabled'
           ORDER BY p.$correctDateColumn DESC
           LIMIT 50 OFFSET 5";

// Execute queries
$result = $conn->prepare($query);
$result->execute();
$popularPosts = $result->fetchAll(PDO::FETCH_ASSOC);

$result2 = $conn->prepare($query2);
$result2->execute();
$featuredPost = $result2->fetch(PDO::FETCH_ASSOC);

$result3 = $conn->prepare($query3);
$result3->execute();
$latestPosts = $result3->fetchAll(PDO::FETCH_ASSOC);

// Categories with slugs for URLs
$categoriesQuery = "SELECT id, name, slug FROM categories";
$categoriesResult = $conn->prepare($categoriesQuery);
$categoriesResult->execute();
$categories = $categoriesResult->fetchAll(PDO::FETCH_ASSOC);

// Helper to strip HTML
function truncate_html($html) {
    if ($html === null) return '';
    $doc = new DOMDocument();
    @$doc->loadHTML('<?xml encoding="UTF-8">' . $html);
    $text = $doc->textContent ?? '';
    return $text;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Latest Blog on Custom Web & Mobile Development | SISGAIN</title>
  <meta name="description" content="Stay ahead in digital transformation, web & mobile tech! Explore SISGAIN latest blog for insights, trends, and innovation. Read now!" />
  <link rel="canonical" href="https://sisgain.com/blogs/" />
  <link href="https://sisgain.com/assets/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= '/blogs/css/Bloghome.css' ?>">
  
  <?php include "assets/includes-new/header.php"; ?>
  <style>.category_name1{display:none;}</style>
</head>
<body>
<?php 
  $url = "home";
  include("../assets/includes-new/navbar.php");
?>

<div class="container">
  <div class="top_content_sec">
    <h1>Join Community of Tech Innovators</h1>
  </div>

  <!-- Browse Categories -->
  <section class="trending_sec">
    <div class="browse_categroies">
      <div class="browsecategorywidget">
        <?php foreach ($categories as $category): ?>
          <a class="category-link" href="categories/<?= htmlspecialchars($category['slug']) ?>">
            <?= htmlspecialchars($category['name']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Popular Posts -->
  <div class="blog-main-page">
    <div class="pc-blog-list">
      <div class="main-intro"><h2>Popular Posts</h2></div>
      <div class="row">
        <?php if ($featuredPost): ?>
          <div class="col-lg-6">
          
              <div class="blog-post">
                    <a href="<?= htmlspecialchars($featuredPost['slug']) ?>">
                <img src="Admin/<?= htmlspecialchars($featuredPost['banner_image'] ?? 'default.jpg') ?>"  alt="<?= htmlspecialchars($featuredPost['title']) ?>">
                </a>
                     
                <div class="blog-content">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="date_category_div">
                      <?= date("j M Y", strtotime($featuredPost['createdDate'])) ?>
                    </div>
                    <a class="date_category_div" href="categories/<?= htmlspecialchars($featuredPost['category_slug']) ?>">
                      <?= htmlspecialchars($featuredPost['category_name'] ?? 'Uncategorized') ?>
                    </a>
                  </div>
                 <a href="<?= htmlspecialchars($featuredPost['slug']) ?>">
                  <h2><?= htmlspecialchars($featuredPost['title']) ?></h2>
                  <p><?= truncate_html($featuredPost['content']) ?>...</p>
                   </a>
                  <div class="auth-wrap">
                    <div class="author-img">
                      <img src="Admin/<?= htmlspecialchars($featuredPost['authorImg'] ?? 'default-avatar.jpg') ?>" 
                           alt="<?= htmlspecialchars($featuredPost['authorName'] ?? 'Author') ?>">
                    </div>
                    <div class="entry-meta">
                      <?= htmlspecialchars($featuredPost['authorName'] ?? 'Unknown') ?>
                    </div>
                  </div>
                </div>
              </div>
           
          </div>
        <?php endif; ?>

        <div class="col-lg-6">
          <div class="row">
            <?php foreach ($popularPosts as $post): ?>
              <div class="col-lg-6">
             
                  <div class="blog-post-col">
                         <a href="<?= htmlspecialchars($post['slug']) ?>">
                    <img src="Admin/<?= htmlspecialchars($post['banner_image'] ?? 'default.jpg') ?>" 
                         alt="<?= htmlspecialchars($post['title']) ?>">
                         </a>
                    <div class="blog-post-padding">
                      <div class="mt-3 mb-2">
                        <?php if (!empty($post['category_slug'])): ?>
                          <a class="date_category_div" href="categories/<?= htmlspecialchars($post['category_slug']) ?>">
                            <?= htmlspecialchars($post['category_name']) ?>
                          </a>
                        <?php endif; ?>
                      </div>
                         <a href="<?= htmlspecialchars($post['slug']) ?>">
                      <h3><?= htmlspecialchars($post['title']) ?></h3>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="auth-wrap">
                          <div class="author-img">
                            <img src="Admin/<?= htmlspecialchars($post['authorImg'] ?? 'default-avatar.jpg') ?>" 
                                 alt="<?= htmlspecialchars($post['authorName'] ?? 'Author') ?>">
                          </div>
                          <div class="entry-meta">
                            <?= htmlspecialchars($post['authorName'] ?? 'Unknown') ?>
                          </div>
                        </div>
                        <div class="date_category_div mb-0">
                          <?= date("j M Y", strtotime($post['createdDate'])) ?>
                        </div>
                      </div>
                      </>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Latest/Featured Posts -->
  <div class="latest-blog">
    <h3>Featured Posts</h3>
    <div class="row">
      <?php foreach ($latestPosts as $post): ?>
        <div class="col-lg-6">
          <div class="inner-latest-blog">
            <div class="row align-items-center">
              <div class="col-lg-5">
                <a href="<?= htmlspecialchars($post['slug']) ?>">
                  <img src="Admin/<?= htmlspecialchars($post['banner_image'] ?? 'default.jpg') ?>" 
                       alt="<?= htmlspecialchars($post['title']) ?>">
                </a>
              </div>
              <div class="col-lg-7 pl-0">
                <?php if (!empty($post['category_slug'])): ?>
                  <a href="categories/<?= htmlspecialchars($post['category_slug']) ?>" class="category_name">
                    <?= htmlspecialchars($post['category_name']) ?>
                  </a>
                <?php else: ?>
                  <span class="category_name1"></span>
                <?php endif; ?>
                <a href="<?= htmlspecialchars($post['slug']) ?>">
                  <h4><?= htmlspecialchars($post['title']) ?></h4>
                </a>
                <div class="auth-wrap" style="justify-content: space-between;">
                  <div class="author-img entry-meta d-flex" style="gap:10px; align-items:center;">
                    <img src="Admin/<?= htmlspecialchars($post['authorImg'] ?? 'default-avatar.jpg') ?>" 
                         alt="<?= htmlspecialchars($post['authorName'] ?? 'Author') ?>">
                    <?= htmlspecialchars($post['authorName'] ?? 'Unknown') ?>
                  </div>
                  <div style="font-size:14px;">
                    <?= date("d M Y", strtotime($post['createdDate'])) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php include("../assets/includes-new/footer.php"); ?>
</body>
</html>
