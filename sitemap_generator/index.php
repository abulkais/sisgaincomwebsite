<?php 
include "session_check.php";
include "db.php"; // Ensure DB connection

function generateSitemap($conn) {
    $sitemapFile = "../sitemap.xml";
    $result = $conn->query("SELECT url, createdDate FROM sitemapurl ORDER BY createdDate DESC");

    $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

    while ($row = $result->fetch_assoc()) {
        $sitemapContent .= "    <url>\n";
        $sitemapContent .= "        <loc>" . htmlspecialchars($row['url']) . "</loc>\n";
        $sitemapContent .= "        <lastmod>" . date('Y-m-d', strtotime($row['createdDate'])) . "</lastmod>\n";
        $sitemapContent .= "        <changefreq>weekly</changefreq>\n";
        $sitemapContent .= "        <priority>1.0</priority>\n";
        $sitemapContent .= "    </url>\n";
    }

    $sitemapContent .= "</urlset>";
    file_put_contents($sitemapFile, $sitemapContent);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['url'])) {
    $url = trim($_POST['url']);
    $response = ["success" => false, "message" => ""];

    if (!empty($url)) {
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM sitemapurl WHERE url = ?");
        $checkStmt->bind_param("s", $url);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            $response["message"] = "URL already exists!";
        } else {
            $stmt = $conn->prepare("INSERT INTO sitemapurl (url, createdDate) VALUES (?, NOW())");
            $stmt->bind_param("s", $url);

            if ($stmt->execute()) {
                generateSitemap($conn);
                $response["success"] = true;
                $response["message"] = "URL added successfully!";
            } else {
                $response["message"] = "Failed to add URL!";
            }
            $stmt->close();
        }
    } else {
        $response["message"] = "URL field cannot be empty!";
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteId'])) {
    $deleteId = intval($_POST['deleteId']);
    $deleteStmt = $conn->prepare("DELETE FROM sitemapurl WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);

    $response = ["success" => false, "message" => ""];

    if ($deleteStmt->execute()) {
        generateSitemap($conn);
        $response["success"] = true;
        $response["message"] = "URL deleted successfully!";
    } else {
        $response["message"] = "Failed to delete URL!";
    }

    $deleteStmt->close();
    echo json_encode($response);
    exit;
}

$countResult = $conn->query("SELECT COUNT(*) as total FROM sitemapurl");
$countRow = $countResult->fetch_assoc();
$totalUrls = $countRow['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sitemap Generator Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --danger-color: #e74a3b;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-radius: 0.35rem 0.35rem 0 0 !important;
            padding: 1rem 1.35rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-info {
            background-color: #36b9cc;
            border-color: #36b9cc;
        }
        
        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: #000;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            background-color: var(--secondary-color);
            font-weight: 600;
            border-top: none;
        }
        
        .table-responsive {
            border-radius: 0.35rem;
            overflow: hidden;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .action-buttons .btn {
            padding: 0.375rem 0.75rem;
        }
        
        .url-cell {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .status-badge {
            font-size: 0.85rem;
            padding: 0.35em 0.65em;
            border-radius: 0.25rem;
        }
        
        .badge-success {
            background-color: var(--success-color);
        }
        
        .badge-warning {
            background-color: var(--warning-color);
            color: #000;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .navbar-brand {
            font-weight: 600;
            color: white !important;
        }
        
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-sitemap me-2"></i>Sitemap Generator
            </a>
            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark me-3">
                    <i class="fas fa-link me-1"></i> Total URLs: <?= $totalUrls ?>
                </span>
                <a href="logout.php" class="btn btn-warning logout-btn" onclick="return confirmLogout(event)">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle me-2"></i>Add New URL
                    </div>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    <input type="url" class="form-control" id="url" placeholder="https://sisgain.com/page" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="submitBtn" class="btn btn-primary w-100">
                                    <i class="fas fa-plus me-1"></i> Add URL
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list me-2"></i>URL List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="55%">URL</th>
                                        <th width="10%">Frequency</th>
                                        <th width="15%">Last Modified</th>
                                        <th width="5%">Priority</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $conn->query("SELECT id, url, createdDate FROM sitemapurl ORDER BY createdDate DESC");
                                    $index = 1;
                                    while ($row = $result->fetch_assoc()):
                                    ?>
                                    <tr id="row-<?= $row['id'] ?>">
                                        <td><?= $index++ ?></td>
                                        <td class="url-cell">
                                            <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank" title="<?= htmlspecialchars($row['url']) ?>">
                                                <?= htmlspecialchars($row['url']) ?>
                                            </a>
                                        </td>
                                        <td><span class="badge badge-warning">Weekly</span></td>
                                        <td><?= (new DateTime($row['createdDate']))->format('d-M-Y') ?></td>
                                        <td><span class="badge badge-success">1.0</span></td>
                                        <td class="action-buttons">
                                            <div class="d-flex gap-2">
                                                <a href="../sitemap.xml" target="_blank" class="btn btn-sm btn-info" title="View Sitemap">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger delete-post" data-id="<?= $row['id'] ?>" title="Delete URL">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function () {
            $("#submitBtn").click(function () {
                let url = $("#url").val().trim();

                if (url === "") {
                    showToast("URL field cannot be empty!", "error");
                    return;
                }

                $.ajax({
                    url: "index",
                    type: "POST",
                    data: { url: url },
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            showToast(response.message, "success");
                            $("#url").val("");
                            setTimeout(() => location.reload(), 1500);
                        } else {
                            showToast(response.message, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        showToast("Something went wrong!", "error");
                    }
                });
            });

            $(".delete-post").click(function () {
                let postId = $(this).data("id");
                if (confirm("Are you sure you want to delete this URL?")) {
                    $.post("index", { deleteId: postId }, function (response) {
                        showToast(response.message, response.success ? "success" : "error");
                        if (response.success) {
                            $("#row-" + postId).fadeOut();
                            setTimeout(() => location.reload(), 1500);
                        }
                    }, "json");
                }
            });

            function showToast(message, type) {
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: type === "success" ? "#1cc88a" : "#e74a3b",
                    stopOnFocus: true
                }).showToast();
            }
        });
        
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "logout.php";
            }
        }
    </script>
</body>
</html>