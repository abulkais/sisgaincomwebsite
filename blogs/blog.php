<?php
// /public_html/blogs/blog.php  — Single Post page + category slug fallback
session_start();
include 'db_connect.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Throwable $e) { /* ignore if already set */ }

// --- Helpers ---
function go404() {
    // Use a local file/route; remote include is often disabled and causes blank page
    header("Location: /404.php", true, 302);
    exit;
}

$slug = $_GET['slug'] ?? '';
$slug = trim($slug);
if ($slug === '') { go404(); }

// === 1) If slug matches a CATEGORY, render the category page ===
try {
    $cstmt = $conn->prepare("SELECT id FROM categories WHERE slug = :slug LIMIT 1");
    $cstmt->execute([':slug' => $slug]);
    $cat = $cstmt->fetch(PDO::FETCH_ASSOC);
    if ($cat) {
        // Let blog-category.php read the same ?slug=
        include 'blog-category.php';
        exit;
    }
} catch (Throwable $e) {
    // If DB error, fail gracefully
    go404();
}

// === 2) Otherwise, treat as a POST slug ===
try {
    $postStmt = $conn->prepare("
        SELECT p.*, c.name AS category_name, c.slug AS category_slug, c.id AS category_id
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.slug = :slug AND p.status = 'enabled'
        LIMIT 1
    ");
    $postStmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    $postStmt->execute();
    $post = $postStmt->fetch(PDO::FETCH_ASSOC);
    if (!$post) { go404(); }
} catch (Throwable $e) {
    go404();
}

// === 3) Related posts (after we know $category_id) ===
$category_id = $post['category_id'] ?? null;

try {
    if (!empty($category_id)) {
        $relatedStmt = $conn->prepare("
            SELECT p.slug, p.title, p.banner_image, p.createdDate, c.name AS category_name
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.status = 'enabled'
              AND p.slug <> :slug
              AND (p.category_id = :category_id OR p.category_id IS NULL)
            ORDER BY p.createdDate DESC
            LIMIT 10
        ");
        $relatedStmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $relatedStmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    } else {
        $relatedStmt = $conn->prepare("
            SELECT p.slug, p.title, p.banner_image, p.createdDate, c.name AS category_name
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.status = 'enabled'
              AND p.slug <> :slug
            ORDER BY p.createdDate DESC
            LIMIT 10
        ");
        $relatedStmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    }
    $relatedStmt->execute();
    $relatedPosts = $relatedStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $relatedPosts = [];
}

// === 4) Categories (with slug for pretty URLs) ===
try {
    $catStmt = $conn->prepare("
      SELECT c.id, c.name, c.slug, COUNT(p.id) AS post_count
      FROM categories c
      LEFT JOIN posts p ON p.category_id = c.id AND p.status = 'enabled'
      GROUP BY c.id, c.name, c.slug
      ORDER BY c.name
    ");
    $catStmt->execute();
    $categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
    $categories = [];
}

// === 5) Meta helpers ===
$canonical = 'https://sisgain.com/blogs/' . urlencode($post['slug'] ?? '');
$ogImage   = 'https://sisgain.com/blogs/Admin/' . ($post['banner_image'] ?? 'default.jpg');

$ldBlogPosting = [
  "@context" => "https://schema.org",
  "@type" => "BlogPosting",
  "mainEntityOfPage" => [
    "@type" => "WebPage",
    "@id" => $canonical
  ],
  "headline" => $post['title'] ?? '',
  "description" => $post['description'] ?? '',
  "image" => $ogImage,
  "author" => [
    "@type" => "Person",
    "name" => $post['authorName'] ?? 'SISGAIN'
  ]
];

$ldWebsite = [
  "@context" => "https://schema.org/",
  "@type" => "WebSite",
  "name" => "SISGAIN",
  "url"  => "https://sisgain.com",
  "potentialAction" => [
    "@type" => "SearchAction",
    "target" => "https://sisgain.com/blogs/{search_term_string}",
    "query-input" => "required name=search_term_string"
  ]
];

$ldBreadcrumb = [
  "@context" => "https://schema.org/",
  "@type" => "BreadcrumbList",
  "itemListElement" => [
    ["@type" => "ListItem", "position" => 1, "name" => "Home",  "item" => "https://sisgain.com/"],
    ["@type" => "ListItem", "position" => 2, "name" => "Blogs", "item" => "https://sisgain.com/blogs/"],
    ["@type" => "ListItem", "position" => 3, "name" => ($post['title'] ?? ''), "item" => $canonical]
  ]
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= htmlspecialchars($post['title'] ?? 'Blog') ?></title>
  <meta name="description" content="<?= htmlspecialchars($post['description'] ?? '') ?>">
  <meta name="keywords" content="<?= htmlspecialchars($post['keywords'] ?? '') ?>">
  <meta name="user-interest" content="<?= htmlspecialchars($post['keywords'] ?? '') ?>">
  <link rel="icon" href="https://sisgain.com/assets/images/favicon.ico" type="image/x-icon">
  <link rel="canonical" href="<?= $canonical ?>">
  <meta name="author" content="<?= htmlspecialchars($post['authorName'] ?? 'SISGAIN') ?>">
  <meta property="og:title" content="<?= htmlspecialchars($post['title'] ?? '') ?>">
  <meta property="og:type" content="article">
  <meta property="og:description" content="<?= htmlspecialchars($post['description'] ?? '') ?>">
  <meta property="og:image" content="<?= $ogImage ?>">
  <meta property="og:url" content="<?= $canonical ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="SISGAIN">
  <meta name="distribution" content="global">
  <meta name="subject" content="Blogs">
  <meta name="rating" content="General">
  <meta name="owner" content="hello@sisgain.com">
  <meta name="googlebot-Image" content="all">

  <script type="application/ld+json"><?= json_encode($ldBlogPosting, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?></script>
  <script type="application/ld+json"><?= json_encode($ldWebsite, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?></script>
  <script type="application/ld+json"><?= json_encode($ldBreadcrumb, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?></script>
  <?php
$ldFaq = [
  "@context" => "https://schema.org",
  "@type" => "FAQPage",
  "mainEntity" => []
];

if (!empty($post['faqs'])) {
    $faqs = json_decode($post['faqs'], true);

    if (is_array($faqs)) {
        foreach ($faqs as $faq) {
            if (!empty($faq['question']) && !empty($faq['answer'])) {
                $ldFaq['mainEntity'][] = [
                    "@type" => "Question",
                    "name" => strip_tags($faq['question']),
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => strip_tags($faq['answer'])
                    ]
                ];
            }
        }
    }
}

// ✅ Only print if FAQ exists
if (!empty($ldFaq['mainEntity'])):
?>
<script type="application/ld+json">
<?= json_encode($ldFaq, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
</script>
<?php endif; ?>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://sisgain.com/blogs/css/blogPage.css">
  <?php include "assets/includes-new/header.php"; ?>
</head>
<body>
<?php 
  $url = "home";
  include("../assets/includes-new/navbar.php");
?>

<section class="blog-hero">
  <div class="blog-hero-overlay">
    <h1 class="blog-hero-title"><?= htmlspecialchars($post['title'] ?? 'Blog') ?></h1>
    <p class="blog-hero-breadcrumb">
      <a href="https://sisgain.com/"> <i class="fa fa-home fa-lg"></i></a>
      / <a href="https://sisgain.com/blogs">Blogs </a> / 
      <a href="<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a>
    </p>
  </div>
</section>

<div class="slug_blog_sec">
  <div class="container">
    <div class="row">

      <div class="col-lg-3">
        <?php
          $scheme     = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
          $baseUrl    = $scheme . '://' . $_SERVER['HTTP_HOST'];
          $articleUrl = $baseUrl . '/blogs/' . ltrim($post['slug'], '/');
        ?>
        <div class="toc-container">
          <div class="toc-header">
            <div class="toc-title">Table of Contents</div>
            <button class="toc-toggle"><i class="fas fa-list"></i></button>
          </div>
          <ul class="toc-list" id="tocList"></ul>

          <div class="social-sharing">
            <span>Share article on :- </span>
            <div class="social-sharing-inner">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $articleUrl ?>" target="_blank" rel="nofollow" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/intent/tweet?url=<?= urlencode($articleUrl) ?>" target="_blank" rel="nofollow" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
              <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($articleUrl) ?>" target="_blank" rel="nofollow" class="social-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="blog-content">
          <?php if (!empty($post['banner_image'])): ?>
            <img src="https://sisgain.com/blogs/Admin/<?= htmlspecialchars($post['banner_image']) ?>" class="img-fluid mb-2" alt="<?= htmlspecialchars($post['title']) ?>">
          <?php endif; ?>

          <div class="blog-meta">
            <span><i class="far fa-user"></i> <?= htmlspecialchars($post['authorName'] ?? 'SISGAIN') ?></span> |
            <span><i class="far fa-calendar"></i> <?= date("M d, Y", strtotime($post['createdDate'])) ?></span> |
            <span><i class="far fa-folder"></i>
              <?php if (!empty($post['category_slug'])): ?>
                <a href="<?= htmlspecialchars($post['category_slug']) ?>"><?= htmlspecialchars($post['category_name'] ?? 'Uncategorized') ?></a>
              <?php else: ?>
                <?= htmlspecialchars($post['category_name'] ?? 'Uncategorized') ?>
              <?php endif; ?>
            </span>
          </div>

          <div class="content"><?= $post['content'] ?></div>

<?php if (!empty($post['faqs'])):
    $faqs = json_decode($post['faqs'], true) ?: [];
    if ($faqs): ?>
  <div class="faq-container">
    <h4 class="faq-head">Frequently Asked Questions (FAQs)</h4>

    <?php foreach ($faqs as $i => $faq): ?>
      <div class="faq-item">
        <!-- hidden checkbox controls toggle -->
        <input type="checkbox" id="faq<?= $i ?>" class="faq-toggle" <?= $i === 0 ? 'checked' : '' ?>>

        <label class="faq-question" for="faq<?= $i ?>">
          <span><?= htmlspecialchars($faq['question']) ?></span>
          <i class="icon"></i>
        </label>

        <div class="faq-answer">
          <?= nl2br(htmlspecialchars($faq['answer'])) ?>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
<?php endif; endif; ?>
<style>
  table {
    width: 100%!important;
    border-collapse: collapse;
    /* margin: 20px 0; */
  }
.faq-container {
  max-width: 600px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}

.faq-head {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

/* Hide checkbox */
.faq-toggle {
  display: none;
}

.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  padding: 12px 16px;
  background: #f5f5f5;
  border: 1px solid #ddd;
  margin-top: 8px;
  font-weight: bold;
}

.faq-question .icon::before {
  content: "+";
  font-size: 1.2rem;
  transition: transform 0.2s ease;
}

.faq-toggle:checked + .faq-question .icon::before {
  content: "-";
}

.faq-answer {
  display: none;
  padding: 12px 16px;
  border: 1px solid #ddd;
  border-top: none;
  background: #fff;
}

/* show answer when checked */
.faq-toggle:checked ~ .faq-answer {
  display: block;
}

/* responsive recaptcha */
.g-recaptcha {
  transform: scale(0.90);
  -webkit-transform: scale(0.90);
  transform-origin: 0 0;
  -webkit-transform-origin: 0 0;
}

/* tablet */
@media (max-width: 768px) {
  .g-recaptcha {
    transform: scale(0.80);
    -webkit-transform: scale(0.80);
  }
}

/* mobile */
@media (max-width: 480px) {
  .g-recaptcha {
    transform: scale(0.70);
    -webkit-transform: scale(0.70);
  }
}

  .blogpleaseWaitBtn {
    background-color: #0a78be7a;
    display: none;
    cursor: not-allowed;
    margin-bottom: 0;

  }
</style>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="right_panel">
          <div class="cta-container">
            <h3 class="cta-title">Let's Build Your Dream Web and App!</h3>
             <form action="mail.php" method="post" onsubmit="return blogform();">
              <input type="hidden" name="preventfromrobo">
             
<input type="hidden" name="comingfrom" value="<?php 
$slug = str_replace('-', ' ', $post['slug']);
echo 'blog / ' . ucwords($slug);
?>">
              <div class="form-group"><input type="text" placeholder="Name"name="name" class="form-control"></div>
              <div class="form-group"><input type="email" placeholder="Email" name="email" class="form-control"></div>
              <div class="form-group"><input type="tel" placeholder="Mobile" name="number" class="form-control"></div>
              <div class="form-group"><textarea placeholder="Query" name="message" class="form-control"></textarea></div>
              
              <div class="form-group">
    <div class="g-recaptcha" 
        data-sitekey="6LeaMZspAAAAAOn6uJBw3j8TKSXFnfwtslQOwycH"
        data-callback="verifyCaptcha">
    </div>
    <p class="blogcaptchaRequired"></p>
</div>
               <button type="submit" class="blogbuttonhide btn btn-primary" name="blog_form">Submit</button>
              <button type="submit" class="blogbuttonshow blogpleaseWaitBtn btn btn-primary w-50" disabled>Please Wait</button>
            </form>
          </div>


<script>
    var recaptcha_response = '';

    function blogform() {
        if (recaptcha_response.length == 0) {
            var captchaElements = document.getElementsByClassName("blogcaptchaRequired");
            for (var i = 0; i < captchaElements.length; i++) {
                captchaElements[i].innerHTML = "Captcha is mandatory";
            }
            return false;
        } else {
            $('.blogbuttonhide').hide();
            $('.blogbuttonshow').show();
            return true;
        }
    }

    function verifyCaptcha(token) {
        recaptcha_response = token;
        document.getElementById('g-recaptcha-error').innerHTML = '';
    }
</script>

          <div class="related_posts">
            <h3>Related Posts</h3>
            <?php if (!empty($relatedPosts)): ?>
              <?php foreach ($relatedPosts as $p): ?>
                <div class="all-post-item d-flex align-items-start mb-3 align-items-center">
                  <a href="<?= htmlspecialchars($p['slug']) ?>" class="thumb mr-2">
                    <img src="https://sisgain.com/blogs/Admin/<?= htmlspecialchars($p['banner_image'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                  </a>
                  <div class="meta flex-grow-1" style="padding:10px 0;">
                    <div class="d-flex justify-content-between">
                      <span class="small"><?= date("j M Y", strtotime($p['createdDate'])) ?></span>
                    </div>
                    <a href="<?= htmlspecialchars($p['slug']) ?>" class="post-title-link"><?= htmlspecialchars($p['title']) ?></a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-muted">No related posts found.</p>
            <?php endif; ?>
          </div>

          <aside class="categories-widget">
            <div class="cat-header"><h3>Categories</h3></div>
            <ul class="cat-list">
              <?php foreach ($categories as $cat): ?>
                <li>
                  <a href="<?= htmlspecialchars($cat['slug']) ?>"><?= htmlspecialchars($cat['name']) ?></a>
                  <span class="count">(<?= (int)$cat['post_count'] ?>)</span>
                </li>
              <?php endforeach; ?>
            </ul>
          </aside>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include("../assets/includes-new/footer.php"); ?>

<script>
(function () {
  const tocList = document.getElementById('tocList');
  if (!tocList) return;

  const article = document.querySelector('.blog-content .content');
  if (!article) return;

  const headings = article.querySelectorAll('h1,h2,h3,h4,h5,h6');
  if (!headings.length) return;

  const used = new Map();
  function slugify(text) {
    let s = text.toLowerCase().replace(/[\s\W]+/g,'-').replace(/^-+|-+$/g,'').substring(0,80);
    const n = used.get(s) || 0; used.set(s,n+1); return n ? s+'-'+n : s;
  }

  headings.forEach(h => { if(!h.id) h.id = slugify(h.textContent.trim() || 'section'); });

  const frag = document.createDocumentFragment();
  headings.forEach(h => {
    const lv = parseInt(h.tagName.substring(1),10);
    const li = document.createElement('li'); li.className = 'toc-h'+lv;
    const a = document.createElement('a'); a.href = '#'+h.id; a.textContent = h.textContent.trim();
    li.appendChild(a); frag.appendChild(li);
  });
  tocList.appendChild(frag);

  tocList.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      const t = document.querySelector(a.getAttribute('href')); if (!t) return;
      const y = t.getBoundingClientRect().top + window.pageYOffset - 20;
      window.scrollTo({ top: y, behavior: 'smooth' });
    });
  });
})();
</script>
</body>
</html>
