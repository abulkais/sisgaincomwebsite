<?php
// admin/add-blog.php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include '../db_connect.php';

// Fetch categories
$categoriesStmt = $conn->prepare("SELECT * FROM categories");
$categoriesStmt->execute();
$categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);

$error = '';
$success = '';

// Simple fallback slugify used only if URL field is empty
function slugify($text)
{
    $text = trim((string)$text);
    $text = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $text));
    $text = trim($text, '-');
    return $text ?: ('post-' . uniqid());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic fields
    $title       = isset($_POST['title']) ? trim($_POST['title']) : '';
    $url_input   = isset($_POST['url']) ? trim($_POST['url']) : '';
    $keywords    = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $content     = isset($_POST['content']) ? $_POST['content'] : '';
    $authorName  = isset($_POST['authorName']) ? trim($_POST['authorName']) : '';
   $category_id = isset($_POST['category']) && $_POST['category'] !== ''
    ? (int) $_POST['category']
    : null;

    // Final URL/Slug decision:
    // If URL field is empty, generate from Title; else keep EXACT user input (no changes)
    $final_url = ($url_input === '') ? slugify($title) : $url_input;
    $slug = $final_url; // slug must match URL exactly per requirement

    // Handle FAQs
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

    // Validate (URL not required because we autogenerate if blank)
    if ($title === '' || $authorName === '' || $description==='' || $keywords==='' ||$content==='' ) {
        $error = "Title, Author Name, description, keywords, content   are required.";
    } 

    // Upload banner image (optional)
    $bannerImage = '';
    if (empty($error) && isset($_FILES['bannerImage']) && is_array($_FILES['bannerImage']) && $_FILES['bannerImage']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['bannerImage']['size'] > 200 * 1024) {
            $error = "Banner image must be less than 200 KB.";
        }  else {
            $uploadDir = 'uploads/banners/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($_FILES['bannerImage']['name']));
            $bannerImage = $uploadDir . uniqid('bnr_', true) . '_' . $safeName;
            if (!move_uploaded_file($_FILES['bannerImage']['tmp_name'], $bannerImage)) {
                $error = "Failed to upload banner image.";
            }
        }
    }

    // Upload author image (optional)
    $authorImg = '';
    if (empty($error) && isset($_FILES['authorImg']) && is_array($_FILES['authorImg']) && $_FILES['authorImg']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['authorImg']['size'] > 100 * 1024) {
            $error = "Author image must be less than 100 KB.";
        } else {
            $uploadDir = 'uploads/authors/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($_FILES['authorImg']['name']));
            $authorImg = $uploadDir . uniqid('auth_', true) . '_' . $safeName;
            if (!move_uploaded_file($_FILES['authorImg']['tmp_name'], $authorImg)) {
                $error = "Failed to upload author image.";
            }
        }
    }

    // Insert post
    if (empty($error)) {
        try {
            $stmt = $conn->prepare("
                INSERT INTO posts 
                    (title, slug, url, keywords, description, content, banner_image, authorName, authorImg, category_id, faqs) 
                VALUES 
                    (:title, :slug, :url, :keywords, :description, :content, :banner, :author, :authorImg, :cat, :faqs)
            ");

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':slug', $slug);
            $stmt->bindParam(':url', $final_url);
            $stmt->bindParam(':keywords', $keywords);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':banner', $bannerImage);
            $stmt->bindParam(':author', $authorName);
            $stmt->bindParam(':authorImg', $authorImg);
            $stmt->bindParam(':cat', $category_id);
            $stmt->bindParam(':faqs', $faqs_json);

            $stmt->execute();
            $success = "Blog post added successfully!";
            header("Location: blogs.php");
            exit;
        } catch (PDOException $e) {
            $error = "Error adding post: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Blog Post</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <!-- Jodit (CSS & JS) -->
    <link rel="stylesheet" href="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.js"></script>

    <link rel="stylesheet" href="../css/styles.css" />

    <style>

   

        .faq-section {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .faq-item {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }

        .error-message {
            color: #dc3545;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .success-message {
            color: #28a745;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .jodit-container {
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    
    .add_blog{
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        padding:1rem;
        background: white;
        border-radius: 10px;
    }
    </style>

    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            // Jodit init
            const editor = Jodit.make('#editor', {
                height: 400,
                uploader: {
                    url: '../body_images.php?action=fileUpload'
                },
                filebrowser: {
                    ajax: {
                        url: '../body_images.php'
                    }
                },
                toolbarAdaptive: false,
                toolbarSticky: true,
                toolbarButtonSize: 'large',
                buttons: [
                    'source', '|', 'undo', 'redo', '|', 'cut', 'copy', 'paste', 'selectall', 'find', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'eraser', '|',
                    'font', 'fontsize', 'brush', 'paragraph', '|', 'align', 'indent', 'outdent', '|',
                    'ul', 'ol', 'hr', '|', 'link', 'image', 'video', 'file', 'table', '|',
                    'copyformat', 'fullsize', 'preview', 'print', '|', 'insertDate'
                ],
                showCharsCounter: true,
                showWordsCounter: true,
                showXPathInStatusbar: true,
                enableDragAndDropFileToEditor: true,
                spellcheck: true,
                askBeforePasteHTML: true,
                askBeforePasteFromWord: true,
                image: {
                    openOnDblClick: true,
                    editTitle: true,
                    useImageEditor: false
                },
                table: {
                    allowCellSelection: true
                },
                controls: {
                    insertDate: {
                        name: 'insertDate',
                        iconURL: 'https://xdsoft.net/jodit/logo.png',
                        exec: (editor) => {
                            editor.s.insertHTML(new Date().toDateString());
                            editor.synchronizeValues();
                        }
                    }
                }
            });
            editor.value = '';

            // Title → URL auto-fill (until user edits URL)
            const titleEl = document.getElementById('title');
            const urlEl = document.getElementById('url');
            let urlDirty = false;

            urlEl.addEventListener('input', () => {
                urlDirty = true;
            });

            const slugify = (txt) => {
                return String(txt)
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9]+/gi, '-')
                    .replace(/^-+|-+$/g, '');
            };

            titleEl.addEventListener('input', () => {
                if (!urlDirty) {
                    urlEl.value = slugify(titleEl.value);
                }
            });
        });

        // FAQ handling
        function addFaq() {
            const faqContainer = document.getElementById('faq-container');
            const faqCount = faqContainer.querySelectorAll('.faq-item').length;
            const faqDiv = document.createElement('div');
            faqDiv.className = 'faq-item';
            faqDiv.innerHTML = `
            <div class="form-group">
                <label>FAQ Question ${faqCount + 1}</label>
                <input type="text" name="faq_question[]" class="form-control" placeholder="Enter question">
            </div>
            <div class="form-group">
                <label>FAQ Answer ${faqCount + 1}</label>
                <textarea name="faq_answer[]" class="form-control" placeholder="Enter answer"></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">Remove FAQ</button>
        `;
            faqContainer.appendChild(faqDiv);
        }
        window.addFaq = addFaq; // expose for inline onclick
    </script>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="content-wrapper">
        <div class="container add_blog">
            <h4>Add Blog</h4>

            <?php if (!empty($error)): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <p class="success-message"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" id="title" name="title" class="form-control"
                        value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <input type="text" id="url" name="url" class="form-control"
                        value="<?php echo isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''; ?>">

                </div>

                <div class="form-group">
                    <label>Keywords</label>
                    <input type="text" name="keywords" class="form-control"
                        value="<?php echo isset($_POST['keywords']) ? htmlspecialchars($_POST['keywords']) : ''; ?>">

                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"><?php
                                                                                echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>

                </div>

                <div class="form-group">
                    <label>Banner Image (WebP, &lt;200KB)</label>
                    <input type="file" name="bannerImage" class="form-control" accept="image/webp">
                </div>

                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="authorName" class="form-control"
                        value="<?php echo isset($_POST['authorName']) ? htmlspecialchars($_POST['authorName']) : ''; ?>" required>

                </div>

                <div class="form-group">
                    <label>Author Image (WebP, &lt;100KB)</label>
                    <input type="file" name="authorImg" class="form-control" accept="image/webp">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" >
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>"
                                <?php if (isset($_POST['category']) && $_POST['category'] == $cat['id']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="faq-section">
                    <h5>FAQs (Optional)</h5>
                  
                    <div id="faq-container"></div>
                      <button type="button" class="btn btn-primary add-faq-btn mt-2 btn-sm" onclick="addFaq()">Add FAQ</button>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea id="editor" name="content" class="form-control"><?php
                                                                                echo isset($_POST['content']) ? htmlspecialchars($_POST['content']) : ''; ?></textarea>

                </div>


                <button type="submit" class="btn btn-success mt-3">Add Post</button>
            </form>
        </div>
    </div>
</body>

</html>