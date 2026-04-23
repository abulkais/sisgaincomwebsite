<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

// Handle upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['bodyImages'])) {
$file = $_FILES['bodyImages'];

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if ($file['size'] > 2 * 1024 * 1024) {
    $error = "File size should be less than 2MB.";
} elseif ($ext !== 'webp') {
    $error = "Please upload only WebP image.";
} else {

    $uploadDir = __DIR__ . '/uploads/body_images/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!is_writable($uploadDir)) {
        $error = "Upload folder is not writable.";
    } else {

        $fileName = time() . '_' . basename($file['name']);
        $fullPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $fullPath)) {

            $dbPath = 'uploads/body_images/' . $fileName;

            $stmt = $conn->prepare("INSERT INTO body_images (image_path) VALUES (:path)");
            $stmt->bindParam(':path', $dbPath);
            $stmt->execute();

            $success = "Image uploaded successfully";

        } else {
            $error = "Upload failed (move_uploaded_file error)";
        }
    }
}

// Fetch images
$imgStmt = $conn->prepare("SELECT * FROM body_images ORDER BY created_at DESC");
$imgStmt->execute();
$images = $imgStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Body Images</title>
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
            --warning: #ffc107;
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

        .upload-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            background: white;
        }

        .upload-card-header {
            background-color: white;
            border-bottom: 1px solid #eef1f5;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
            color: #2c3e50;
            border-radius: 12px 12px 0 0 !important;
        }

        .upload-card-body {
            padding: 1rem;
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

        .custom-file-upload {
            display: block;
            padding: 1rem;
            border: 2px dashed #dce4ec;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fafbfc;
            margin-bottom: 20px;
        }

        .custom-file-upload:hover {
            border-color: var(--primary);
            background: rgba(7, 91, 217, 0.03);
        }

        .custom-file-upload i {
            font-size: 48px;
            color: #adb5bd;
            margin-bottom: 15px;
        }

        .custom-file-upload p {
            margin: 0;
            color: #6c757d;
        }

        .custom-file-upload span {
            color: var(--primary);
            font-weight: 500;
        }

        #file-input {
            display: none;
        }

        .file-preview {
            width: 100%;
            max-width: 200px;
            margin: 0 auto 20px;
            display: none;
        }

        .file-preview img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-upload {
            background: linear-gradient(to right, var(--primary), #1a6eff);
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 500;
            color: white;
            transition: all 0.3s;
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
        }

        .btn-upload:hover {
            background: linear-gradient(to right, #064ac1, #155ad8);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(7, 91, 217, 0.25);
        }

        .btn-upload:disabled {
            background: #adb5bd;
            cursor: not-allowed;
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 20px;
        }

        .image-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s;
            position: relative;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .image-preview {
            width: 100%;
            height: 100px;
            object-fit: cover;
            display: block;
        }

        .image-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .image-card:hover .image-actions {
            opacity: 1;
        }

        .btn-image-action {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-copy {
            background: var(--primary);
        }

        .btn-copy:hover {
            background: #064ac1;
            transform: scale(1.1);
        }

        .btn-delete {
            background: var(--danger);
        }

        .btn-delete:hover {
            background: #bd2130;
            transform: scale(1.1);
        }

        .image-path {
            padding: 12px;
            font-size: 12px;
            color: #6c757d;
            background: #f8f9fa;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .alert-message {
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: none;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.15);
            color: #1e7e34;
        }

        .alert-warning {
            background-color: rgba(255, 193, 7, 0.15);
            color: #856404;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: #c71c32;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
            grid-column: 1 / -1;
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

        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            z-index: 1050;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s;
        }

        .toast-notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast-notification i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="page-title">Manage Body Images</h1>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert-message alert-warning">
                    <i class="fas fa-exclamation-triangle mr-2"></i><?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert-message alert-success">
                    <i class="fas fa-check-circle mr-2"></i><?php echo $success; ?>
                </div>
            <?php endif; ?>

            <div class="upload-card">
                <div class="upload-card-header">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>Upload New Image
                </div>
                <div class="upload-card-body">
                    <form method="POST" enctype="multipart/form-data" id="uploadForm">
                        <div class="row">
                            <div class="col-lg-7">
                                <label for="file-input" class="custom-file-upload">
                                    <i class="fas fa-file-image"></i>
                                    <p>Click to browse or drag & drop</p>
                                    <span>WebP format only (Max 100KB)</span>
                                </label>
                                <button type="submit" class="btn-upload" id="uploadButton" disabled>
                                    <i class="fas fa-upload mr-2"></i>Upload Image
                                </button>
                            </div>
                            <div class="col-lg-5">
                                <div class="file-preview" id="filePreview"></div>
                                <input type="file" name="bodyImages" class="form-control" id="file-input" accept=".webp">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="upload-card">
                <div class="upload-card-header">
                    <i class="fas fa-images mr-2"></i>Uploaded Images
                    <span class="badge badge-primary ml-2"><?php echo count($images); ?></span>
                </div>
                <div class="upload-card-body">
                    <?php if (count($images) > 0): ?>
                        <div class="images-grid">
                            <?php foreach ($images as $image): ?>
                                <div class="image-card">
                                    <img src="<?php echo $image['image_path']; ?>" alt="Uploaded" class="image-preview">
                                    <div class="image-actions">
                                        <button class="btn-image-action btn-copy" onclick="copyToClipboard('https://sisgain.com/blogs/Admin/<?php echo $image['image_path']; ?>')">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                        <button class="btn-image-action btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="image-path" title="https://sisgain.com/blogs/Admin/<?php echo $image['image_path']; ?>">
                                        <?php echo $image['image_path']; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-image"></i>
                            <p>No images uploaded yet</p>
                            <p class="text-muted">Upload your first image using the form above</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-notification" id="toast">
        <i class="fas fa-check-circle"></i>
        <span>Image path copied to clipboard!</span>
    </div>

    <script>
        // File input preview
        document.getElementById('file-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('filePreview');
            const uploadButton = document.getElementById('uploadButton');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    preview.style.display = 'block';
                    uploadButton.disabled = false;
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.innerHTML = '';
                uploadButton.disabled = true;
            }
        });

        // Drag and drop functionality
        const dropArea = document.querySelector('.custom-file-upload');
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropArea.style.borderColor = '#075bd9';
            dropArea.style.backgroundColor = 'rgba(7, 91, 217, 0.05)';
        }

        function unhighlight() {
            dropArea.style.borderColor = '#dce4ec';
            dropArea.style.backgroundColor = '#fafbfc';
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            const input = document.getElementById('file-input');
            input.files = files;

            // Trigger change event
            const event = new Event('change');
            input.dispatchEvent(event);
        }

        // Copy to clipboard function
        function copyToClipboard(path) {
            navigator.clipboard.writeText(path).then(() => {
                showToast();
            });
        }

        // Show toast notification
        function showToast() {
            const toast = document.getElementById('toast');
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Add animation to alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-message');
            alerts.forEach(alert => {
                alert.style.opacity = 0;
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.style.transition = 'all 0.3s ease';
                    alert.style.opacity = 1;
                    alert.style.transform = 'translateY(0)';
                }, 100);
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(() => {
                alerts.forEach(alert => {
                    alert.style.opacity = 0;
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                });
            }, 5000);
        });
    </script>
</body>

</html>