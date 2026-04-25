<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

// Fetch posts
$postsStmt = $conn->prepare("SELECT p.*, c.name AS category_name FROM posts p LEFT JOIN categories c ON p.category_id = c.id ORDER BY createdDate DESC");
$postsStmt->execute();
$posts = $postsStmt->fetchAll(PDO::FETCH_ASSOC);

// Handle delete
if (isset($_GET['delete'])) {
    $slug = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM posts WHERE slug = :slug");
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    header("Location: blogs.php");
    exit;
}

// Handle status toggle
if (isset($_GET['toggle'])) {
    $slug = $_GET['toggle'];
    $post = $conn->prepare("SELECT status FROM posts WHERE slug = :slug");
    $post->bindParam(':slug', $slug);
    $post->execute();
    $current = $post->fetchColumn();
    $newStatus = $current == 'enabled' ? 'disabled' : 'enabled';
    $update = $conn->prepare("UPDATE posts SET status = :status WHERE slug = :slug");
    $update->bindParam(':status', $newStatus);
    $update->bindParam(':slug', $slug);
    $update->execute();
    header("Location: blogs.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog Management</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="d-flex align-items-center mb-3 justify-content-between">
                <h3>Blog Management</h3>
                <a href="add-blog.php" class="btn btn-success">Add Blog</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post['authorName']; ?></td>
                                <td><?php echo $post['category_name']; ?></td>
                                <td>
                                    <!-- Normal View -->
                                    <span id="date-text-<?php echo $post['slug']; ?>">
                                        <?php echo date('d M Y', strtotime($post['createdDate'])); ?>
                                    </span>

                                    <!-- Hidden Edit Form -->
                                    <form method="POST" action="blogs.php"
                                        id="date-form-<?php echo $post['slug']; ?>"
                                        style="display:none; margin-top:5px;">

                                        <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">

                                        <input type="date" name="new_date"
                                            value="<?php echo date('Y-m-d', strtotime($post['createdDate'])); ?>"
                                            class="form-control form-control-sm mb-1">

                                        <button type="submit" name="update_date" class="btn btn-sm btn-primary">
                                            Save
                                        </button>
                                    </form>


                                </td>


                                <td>
                                    <style>
                                        .post-action-menu {
                                            position: relative;
                                            display: inline-block;
                                        }

                                        .post-action-btn {
                                            background: none;
                                            border: none;
                                            cursor: pointer;
                                            font-size: 18px;
                                        }

                                        .post-dropdown {
                                            padding: 10px;
                                            display: none;
                                            position: absolute;
                                            right: 0;
                                            top: 25px;
                                            background: #fff;
                                            border: 1px solid #ddd;
                                            border-radius: 6px;
                                            min-width: 50px;
                                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                            z-index: 500;
                                        }

                                        .post-dropdown a {
                                            display: flex;
                                            align-items: center;
                                            gap: 8px;
                                            padding: 8px 12px;
                                            margin: 10px 0 0 0;
                                            font-size: 14px;
                                            text-decoration: none;
                                        }

                                        .post-dropdown a:hover {
                                            background: #f5f5f5;
                                        }

                                        .post-action-menu:focus-within .post-dropdown {
                                            display: block;
                                        }
                                    </style>

                                    <div class="post-action-menu" tabindex="0">
                                        <button type="button" class="post-action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        <div class="post-dropdown">
                                            <!-- Toggle -->
                                            <a href="blogs.php?toggle=<?php echo $post['slug']; ?>">
                                                <i class="fa <?= $post['status'] == 'enabled' ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger'; ?> fa-xl"></i>

                                            </a>

                                            <!-- Edit -->
                                            <a href="edit-blog.php?slug=<?php echo urlencode($post['slug']); ?>" class="fa-xl">
                                                <i class="fa fa-edit text-primary fa-lg"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="blogs.php?delete=<?php echo $post['slug']; ?>" onclick="return confirm('Are you sure?');">
                                                <i class="fa fa-trash text-danger fa-lg"></i>

                                            </a>

                                            <!-- View -->
                                            <a href="../<?php echo $post['slug']; ?>" target="_blank">
                                                <i class="fa fa-eye text-success fa-lg"></i>

                                            </a>

                                            <a href="javascript:void(0);" onclick="toggleDateEdit('<?php echo $post['slug']; ?>')">
                                                <i class="fa fa-calendar text-primary fa-lg"></i>
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function toggleDateEdit(slug) {

            document.querySelectorAll('[id^="date-form-"]').forEach(f => f.style.display = 'none');
            document.querySelectorAll('[id^="date-text-"]').forEach(t => t.style.display = 'inline');

            document.getElementById('date-text-' + slug).style.display = 'none';
            document.getElementById('date-form-' + slug).style.display = 'block';
        }
    </script>

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000"
        };

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'date_updated') { ?>
            toastr.success("Date updated successfully!");
        <?php } ?>
    </script>
</body>

</html>