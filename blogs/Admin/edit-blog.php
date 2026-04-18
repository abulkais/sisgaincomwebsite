<?php
// admin/edit-blog.php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

// --------------- Load post by slug ---------------
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') {
    header("Location: blogs.php");
    exit;
}

$postStmt = $conn->prepare("SELECT * FROM posts WHERE slug = :slug LIMIT 1");
$postStmt->bindParam(':slug', $slug);
$postStmt->execute();
$post = $postStmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("Location: blogs.php");
    exit;
}

// --------------- Load categories ---------------
$categoriesStmt = $conn->prepare("SELECT * FROM categories");
$categoriesStmt->execute();
$categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);

$error = '';
$success = '';

// --------------- Handle update ---------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = isset($_POST['title']) ? trim($_POST['title']) : '';
    $url         = isset($_POST['url']) ? trim($_POST['url']) : '';
    $keywords    = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $content     = isset($_POST['content']) ? $_POST['content'] : '';
    $authorName  = isset($_POST['authorName']) ? trim($_POST['authorName']) : '';
$category_id = isset($_POST['category']) && $_POST['category'] !== ''
    ? (int) $_POST['category']
    : null;

    // FAQs
    $faqs = [];
    if (!empty($_POST['faq_question']) && !empty($_POST['faq_answer'])) {
        $questions = $_POST['faq_question'];
        $answers   = $_POST['faq_answer'];
        $count     = min(count($questions), count($answers));
        for ($i = 0; $i < $count; $i++) {
            $q = trim((string)$questions[$i]);
            $a = trim((string)$answers[$i]);
            if ($q !== '' && $a !== '') {
                $faqs[] = ['question' => $q, 'answer' => $a];
            }
        }
    }
    $faqs_json = json_encode($faqs);

    // Validate
        if ($title === '' || $url === '' || $authorName === '' || $description==='' || $keywords==='' ||$content==='' ) {
        $error = "Title, URL, Author Name, description, keywords, content   are required.";
    } 
   

    // Keep existing images unless new valid files are uploaded
    $bannerImage = $post['banner_image'];
    $authorImg   = $post['authorImg'];

    // Banner image (WebP, <200KB)
    if (empty($error) && isset($_FILES['bannerImage']) && is_array($_FILES['bannerImage']) && $_FILES['bannerImage']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['bannerImage']['size'] > 200 * 1024) {
            $error = "Banner image must be less than 200 KB.";
        }  else {
            $uploadDir = 'uploads/banners/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($_FILES['bannerImage']['name']));
            $newPath = $uploadDir . uniqid('bnr_', true) . '_' . $safeName;
            if (move_uploaded_file($_FILES['bannerImage']['tmp_name'], $newPath)) {
                $bannerImage = $newPath;
            } else {
                $error = "Failed to upload banner image.";
            }
        }
    }

    // Author image (WebP, <100KB)
    if (empty($error) && isset($_FILES['authorImg']) && is_array($_FILES['authorImg']) && $_FILES['authorImg']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['authorImg']['size'] > 100 * 1024) {
            $error = "Author image must be less than 100 KB.";
        }  else {
            $uploadDir = 'uploads/authors/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($_FILES['authorImg']['name']));
            $newPath = $uploadDir . uniqid('auth_', true) . '_' . $safeName;
            if (move_uploaded_file($_FILES['authorImg']['tmp_name'], $newPath)) {
                $authorImg = $newPath;
            } else {
                $error = "Failed to upload author image.";
            }
        }
    }

    // Update row
    if (empty($error)) {
        try {
            // keep slug in sync with URL (per your “exact as typed” rule)
            $newSlug = $url;

            $stmt = $conn->prepare("
                UPDATE posts
                   SET title=:title,
                       slug=:slug,
                       url=:url,
                       keywords=:keywords,
                       description=:description,
                       content=:content,
                       banner_image=:banner,
                       authorName=:author,
                       authorImg=:authorImg,
                       category_id=:cat,
                       faqs=:faqs
                 WHERE slug=:oldslug
                 LIMIT 1
            ");

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':slug', $newSlug);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':keywords', $keywords);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':banner', $bannerImage);
            $stmt->bindParam(':author', $authorName);
            $stmt->bindParam(':authorImg', $authorImg);
            $stmt->bindParam(':cat', $category_id);
            $stmt->bindParam(':faqs', $faqs_json);
            $stmt->bindParam(':oldslug', $slug);

            $stmt->execute();

            // If slug changed, future edits will use the new slug
            header("Location: blogs.php");
            exit;
        } catch (PDOException $e) {
            $error = "Error updating post: " . $e->getMessage();
        }
    }

    // If error, keep $post values as the user's latest attempted input so the form stays filled
    if (!empty($error)) {
        $post['title']        = $title;
        $post['url']          = $url;
        $post['keywords']     = $keywords;
        $post['description']  = $description;
        $post['content']      = $content;
        $post['authorName']   = $authorName;

        $post['banner_image'] = $bannerImage;
        $post['authorImg']    = $authorImg;
        $post['faqs']         = $faqs_json;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Jodit -->
    <link rel="stylesheet" href="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.js"></script>

   

    <script>
    // FAQ handling
    function addFaq(question = '', answer = '') {
        const faqContainer = document.getElementById('faq-container');
        const faqCount = faqContainer.querySelectorAll('.faq-item').length;
        const faqDiv = document.createElement('div');
        faqDiv.className = 'faq-item';
        faqDiv.innerHTML = `
            <div class="form-group">
                <label>FAQ Question ${faqCount + 1}</label>
                <input type="text" name="faq_question[]" class="form-control" value="${question.replaceAll('"','&quot;')}">
            </div>
            <div class="form-group">
                <label>FAQ Answer ${faqCount + 1}</label>
                <textarea name="faq_answer[]" class="form-control">${answer.replaceAll('<','&lt;').replaceAll('>','&gt;')}</textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">Remove FAQ</button>
        `;
        faqContainer.appendChild(faqDiv);
    }

    // Pre-fill FAQs on load
    document.addEventListener('DOMContentLoaded', function() {
        const faqs = <?php echo $post['faqs'] ? json_encode(json_decode($post['faqs'], true)) : '[]'; ?>;
        faqs.forEach(faq => addFaq(faq.question || '', faq.answer || ''));
    });
    </script>

    <script>
    // Jodit init – IMPORTANT: do NOT overwrite the field with a placeholder
    document.addEventListener('DOMContentLoaded', () => {
        Jodit.make('#editor', {
            height: 400,
            uploader: { url: '../body_images.php?action=fileUpload' },
            filebrowser: { ajax: { url: '../body_images.php' } },
            toolbarAdaptive: false,
            toolbarSticky: true,
            toolbarButtonSize: 'large',
            buttons: [
                'source','|','undo','redo','|',
                'cut','copy','paste','selectall','find','|',
                'bold','italic','underline','strikethrough','superscript','subscript','eraser','|',
                'font','fontsize','brush','paragraph','|',
                'align','indent','outdent','|',
                'ul','ol','hr','|',
                'link','image','video','file','table','|',
                'copyformat','fullsize','preview','print','about','|','insertDate'
            ],
            image: { openOnDblClick:true, editTitle:true, useImageEditor:false },
            table: { allowCellSelection:true },
            controls: {
                insertDate: {
                    name:'insertDate',
                    iconURL:'https://xdsoft.net/jodit/logo.png',
                    exec:(editor)=>{ editor.s.insertHTML(new Date().toDateString()); editor.synchronizeValues(); }
                }
            }
        });
    });
    </script>
    <style>
    .edit_blog{
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        padding:1rem;
        background: white;
        border-radius: 10px;
    }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="content-wrapper">
        <div class="container edit_blog">
            <h4 class="mb-3">Edit Blog</h4>

            <?php if (!empty($error)): ?>
                <p class="error-message"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <p class="success-message"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control"
                           value="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="url" class="form-control"
                           value="<?php echo htmlspecialchars($post['url'], ENT_QUOTES, 'UTF-8'); ?>" readonly required>
                </div>

                <div class="form-group">
                    <label>Keywords</label>
                    <input type="text" name="keywords" class="form-control"
                           value="<?php echo htmlspecialchars($post['keywords'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"><?php
                        echo htmlspecialchars($post['description'], ENT_QUOTES, 'UTF-8');
                    ?></textarea>
                </div>

                <div class="form-group">
                    <label>Banner Image (WebP, under 100KB)</label>
                    <input type="file" name="bannerImage" class="form-control" accept="image/webp">
                    <?php if (!empty($post['banner_image'])): ?>
                        <small>Current: <a href="<?php echo htmlspecialchars($post['banner_image'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank">View Image</a></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="authorName" class="form-control"
                           value="<?php echo htmlspecialchars($post['authorName'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group">
                    <label>Author Image (WebP, under 100KB)</label>
                    <input type="file" name="authorImg" class="form-control" accept="image/webp">
                    <?php if (!empty($post['authorImg'])): ?>
                        <small>Current: <a href="<?php echo htmlspecialchars($post['authorImg'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank">View Image</a></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" >
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo (int)$cat['id']; ?>"
                                <?php echo ((int)$cat['id'] === (int)$post['category_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <!-- IMPORTANT: for WYSIWYG, give raw HTML so Jodit loads it -->
                    <textarea id="editor" name="content" class="form-control"><?php
                        echo $post['content']; // do not escape here so editor loads HTML
                    ?></textarea>
                </div>

                <div class="faq-section">
                    <h4>FAQs (Optional)</h4>
                    <button type="button" class="btn btn-primary add-faq-btn" onclick="addFaq()">Add FAQ</button>
                    <div id="faq-container"></div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Update Post</button>
            </form>
        </div>
    </div>
</body>
</html>
