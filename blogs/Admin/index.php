<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

// Fetch data for charts
$postsStmt = $conn->prepare("SELECT * FROM posts");
$postsStmt->execute();
$posts = $postsStmt->fetchAll(PDO::FETCH_ASSOC);

$categoriesStmt = $conn->prepare("SELECT * FROM categories");
$categoriesStmt->execute();
$categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);

// Author counts
$authorCounts = [];
foreach ($posts as $post) {
    $author = $post['authorName'] ? trim($post['authorName']) : 'Unknown';
    $author = ucwords(strtolower($author));
    $authorCounts[$author] = ($authorCounts[$author] ?? 0) + 1;
}

// Category counts
$catCounts = [];
foreach ($categories as $cat) {
    $countStmt = $conn->prepare("SELECT COUNT(*) FROM posts WHERE category_id = :id");
    $countStmt->bindParam(':id', $cat['id']);
    $countStmt->execute();
    $catCounts[$cat['name']] = $countStmt->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="container mt-4">
            <h3 class="text-center mb-4">Dashboard Overview</h3>
            <div class="row">
                <!-- Pie Chart: Blogs by Author -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow p-3 h-100 rounded">
                        <h5 class="text-center">Blogs Distribution by Author</h5>
                        <canvas id="authorChart"></canvas>
                    </div>
                </div>

                <!-- Bar Chart: Blogs by Category -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow p-3 h-100">
                        <h5 class="text-center">Blogs Per Category</h5>
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Author Chart
        const authorCtx = document.getElementById('authorChart').getContext('2d');
        new Chart(authorCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode(array_keys($authorCounts)); ?>,
                datasets: [{
                    label: 'Blogs per Author',
                    data: <?php echo json_encode(array_values($authorCounts)); ?>,
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'] // Add more colors if needed
                }]
            }
        });

        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($catCounts)); ?>,
                datasets: [{
                    label: 'Blogs per Category',
                    data: <?php echo json_encode(array_values($catCounts)); ?>,
                    backgroundColor: '#42A5F5'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>