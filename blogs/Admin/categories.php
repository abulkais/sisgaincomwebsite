<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$error = '';
$success = '';

// === Helper functions ===
function generateSlug($str) {
    // normalize to ASCII (optional)
    $str = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
    $str = strtolower($str);
    $str = preg_replace('/[^a-z0-9]+/', '-', $str);
    $str = trim($str, '-');
    //  if (!preg_match('/-articles$/', $str)) {
    //     $str .= '-articles';
    // }
    return $str !== '' ? $str : 'n-a';
}

function ensureUniqueSlug(PDO $conn, string $slug, ?int $excludeId = null): string {
    $base = $slug;
    $i = 1;
    while (true) {
        if ($excludeId) {
            $stmt = $conn->prepare("SELECT 1 FROM categories WHERE slug = :slug AND id != :id LIMIT 1");
            $stmt->execute([':slug' => $slug, ':id' => $excludeId]);
        } else {
            $stmt = $conn->prepare("SELECT 1 FROM categories WHERE slug = :slug LIMIT 1");
            $stmt->execute([':slug' => $slug]);
        }
        if ($stmt->rowCount() === 0) return $slug;
        $slug = $base . '-' . $i++;
    }
}

// === Handle form ===
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'update') {
        // Update
        $id = (int)$_POST['id'];
        $name = trim($_POST['name']);
        $slug = generateSlug($name);
        $slug = ensureUniqueSlug($conn, $slug, $id);

        // Check duplicate name
        $checkStmt = $conn->prepare("SELECT 1 FROM categories WHERE name = :name AND id != :id");
        $checkStmt->execute([':name' => $name, ':id' => $id]);
        if ($checkStmt->rowCount() > 0) {
            $error = "Category name already exists.";
        } else {
            try {
                $stmt = $conn->prepare("UPDATE categories SET name = :name, slug = :slug WHERE id = :id");
                $stmt->execute([':name' => $name, ':slug' => $slug, ':id' => $id]);
                $success = "Category updated successfully.";
            } catch (PDOException $e) {
                $error = "Error updating category: " . $e->getMessage();
            }
        }

    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        // Delete
        $id = (int)$_POST['id'];
        $postCheckStmt = $conn->prepare("SELECT COUNT(*) FROM posts WHERE category_id = :id");
        $postCheckStmt->execute([':id' => $id]);
        $postCount = $postCheckStmt->fetchColumn();

        if ($postCount > 0) {
            $error = "Cannot delete category because it has $postCount associated post(s).";
        } else {
            try {
                $stmt = $conn->prepare("DELETE FROM categories WHERE id = :id");
                $stmt->execute([':id' => $id]);
                $success = "Category deleted successfully.";
            } catch (PDOException $e) {
                $error = "Error deleting category: " . $e->getMessage();
            }
        }

    } else {
        // Add new
        $name = trim($_POST['name']);
        if ($name === '') {
            $error = "Category name is required.";
        } else {
            $slug = generateSlug($name);
            $slug = ensureUniqueSlug($conn, $slug, null);

            // Optional: also check duplicate name
            $checkStmt = $conn->prepare("SELECT 1 FROM categories WHERE name = :name LIMIT 1");
            $checkStmt->execute([':name' => $name]);

            if ($checkStmt->rowCount() > 0) {
                $error = "Category name already exists.";
            } else {
                try {
                    $stmt = $conn->prepare("INSERT INTO categories (name, slug) VALUES (:name, :slug)");
                    $stmt->execute([':name' => $name, ':slug' => $slug]);
                    $success = "Category added successfully.";
                } catch (PDOException $e) {
                    $error = "Error adding category: " . $e->getMessage();
                }
            }
        }
    }
}

// === Fetch categories and posts ===
$catStmt = $conn->prepare("SELECT * FROM categories");
$catStmt->execute();
$categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);

$postStmt = $conn->prepare("SELECT * FROM posts WHERE status = 'enabled'");
$postStmt->execute();
$posts = $postStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #075bd9;
            --secondary: #f5a623;
            --light-bg: #f8f9fa;
            --dark-bg: #102338;
            --success: #28a745;
            --danger: #dc3545;
        }

        body {
            background-color: #f5f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-wrapper {
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        @media (max-width: 992px) {
            .content-wrapper {
                margin-left: 0;
                padding: 20px;
            }
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #eef1f5;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
            color: #2c3e50;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-body {
            padding: 25px;
        }

        .form-control {
            border: 1px solid #dce4ec;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(7, 91, 217, 0.15);
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-success {
            background: linear-gradient(to right, #28a745, #20c997);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(to right, #218838, #1aa179);
            transform: translateY(-2px);
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
            /* margin-top: 30px; */
        }

        .category-card {
            background: #62626224;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            border-left: 4px solid var(--primary);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s;
        }

        .category-card:hover::before {
            transform: scaleX(1);
        }

        .category-name {
            font-weight: 600;
            font-size: 14px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .post-count {
            display: inline-block;
            background: rgba(7, 91, 217, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 400;
        }

        .category-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .category-link:hover {
            text-decoration: none;
            color: inherit;
        }

        .alert {
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: none;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.15);
            color: #1e7e34;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: #c71c32;
        }

        .action-buttons {
            display: flex;
            float: right;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }


        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 60px;
            margin-bottom: 15px;
            color: #dee2e6;
        }

        .empty-state p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="page-title">Manage Categories</h1>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle mr-2"></i><?php echo $success; ?>
                </div>
            <?php endif; ?>



            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus-circle mr-2"></i>Add New Category
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" id="categoryName" name="name" placeholder="Enter category name" class="form-control" required style="text-transform: capitalize;">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-plus mr-2"></i>Add Category
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <style>
                .category-card {
                    position: relative;
                }

                .action-menu {
                    position: relative;
                    display: inline-block;
                }

                .action-btn {
                    background: none;
                    border: none;
                    cursor: pointer;
                    font-size: 15px;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    z-index: 1000;
                    right: 15px;
                    top: -20px;
                    background: #fff;
                    border: 1px solid #ddd;
                    border-radius: 6px;
                    min-width: 50px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

                }

                .dropdown-content button,
                .dropdown-content form button {
                    width: 100%;
                    border: none;
                    background: none;
                    padding: 8px 12px;
                    text-align: left;
                    cursor: pointer;
                    font-size: 14px;
                }

                .dropdown-content button:hover,
                .dropdown-content form button:hover {
                    background: #f5f5f5;
                }

                /* show dropdown when action-menu has focus */
                .action-menu:focus-within .dropdown-content {
                    display: block;
                }
            </style>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-layer-group mr-2"></i>All Categories
                    <span class="badge badge-primary ml-2"><?php echo count($categories); ?></span>
                </div>
                <div class="card-body">
                    <?php if (count($categories) > 0): ?>
                        <div class="category-grid">
                            <?php foreach ($categories as $category): ?>
                                <?php
                                $count = 0;
                                foreach ($posts as $post) {
                                    if ($post['category_id'] == $category['id']) $count++;
                                }
                                ?>
                                <div class="category-card">
                                   <a href="/blogs/<?php echo htmlspecialchars($category['slug']); ?>" target="_blank" class="category-link">
                                        <div class="category-name"><?php echo htmlspecialchars($category['name']); ?></div>

                                    </a>
                                    <div class="d-flex align-items-center justify-content-between">

                                        <div class="post-count">
                                            <i class="fas fa-file-alt mr-1"></i><?php echo $count; ?> Posts
                                        </div>
                                        <div class="action-buttons">
                                            <div class="action-menu" tabindex="0">
                                                <button type="button" class="action-btn">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-content">
                                                    <button
                                                        type="button"
                                                        class="btn-edit"
                                                        data-id="<?php echo $category['id']; ?>"
                                                        data-name="<?php echo htmlspecialchars($category['name']); ?>">
                                                        <i class="fas fa-edit text-primary mr-2"></i>
                                                    </button>

                                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                        <input type="hidden" name="action" value="delete">
                                                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                                        <button type="submit">
                                                            <i class="fas fa-trash text-danger mr-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No categories found</p>
                            <p class="text-muted">Add your first category using the form above</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <form method="POST" class="modal-content" style="border-radius: 20px;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="editCategoryId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editCategoryName">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="name" required style="text-transform: capitalize;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Edit button → open & fill modal
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    document.getElementById('editCategoryId').value = id;
                    document.getElementById('editCategoryName').value = name;
                    $('#editCategoryModal').modal('show');
                });
            });

            // Alert animation and auto-hide
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = 0;
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.style.transition = 'all 0.3s ease';
                    alert.style.opacity = 1;
                    alert.style.transform = 'translateY(0)';
                }, 100);
                setTimeout(() => {
                    alert.style.opacity = 0;
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }, 5000);
            });
        });
    </script>
</body>

</html>