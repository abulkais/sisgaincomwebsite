<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background: linear-gradient(180deg, #102338 0%, #1a2d45 100%);
            padding-top: 20px;
            color: #fff;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: #075bd9;
            color: red;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            background: #f4f4f9;
        }

        .sidebar-header {
            text-align: center;
            padding: 0 0 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 10px;
        }

        .sidebar-header img {
            width: 180px;
            height: auto;
            transition: transform 0.3s;
        }

        .sidebar-header img:hover {
            transform: scale(1.05);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 0;
            margin: 8px 15px;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .sidebar ul li:hover {
            transform: translateX(5px);
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #e0e0e0;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s;
            border-radius: 8px;
        }

        .sidebar ul li a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .sidebar ul li.active {
            background: linear-gradient(90deg, #075bd9 0%, #1a6eff 100%);
            box-shadow: 0 4px 10px rgba(7, 91, 217, 0.3);
        }

        .sidebar ul li.active a {
            color: #fff;
            font-weight: 500;
        }

       

        .logout-link {
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
        }

        .logout-link a {
            color: #ff6b6b !important;
        }

        .logout-link a:hover {
            background: rgba(255, 107, 107, 0.1) !important;
        }

        /* Mobile responsiveness */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #075bd9;
            color: #fff;
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: 5px 0 25px rgba(0, 0, 0, 0.3);
            }

            .sidebar-toggle {
                display: block;
            }
        }

        /* Scrollbar styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>

</head>

<body>
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://sisgain.ae/assets/images/home/white-logo.webp" alt="websorbit Logo">
        </div>

        <ul>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <a target="_blank" href="index.php">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'active' : ''; ?>">
                <a target="_blank" href="categories.php">
                    <i class="fas fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'body_images.php' ? 'active' : ''; ?>">
                <a target="_blank" href="body_images.php">
                    <i class="fas fa-image"></i>
                    <span>Body Images</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'blogs.php' ? 'active' : ''; ?>">
                <a target="_blank" href="blogs.php">
                    <i class="fas fa-blog"></i>
                    <span>Blog Management</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'add-blog.php' ? 'active' : ''; ?>">
                <a target="_blank" href="add-blog.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add Blog</span>
                </a>
            </li>

            <li class="logout-link">
                <a  data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document" >
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-danger btn-sm">Yes, Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>