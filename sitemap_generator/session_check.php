<?php
session_start();

// Redirect to login if session is not set
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Define session timeouts
$inactive_timeout = 4 * 60 * 60; // 4 hours (14400 seconds)
$max_session_duration = 12 * 60 * 60; // 12 hours (43200 seconds)

// Set session start time if not already set
if (!isset($_SESSION["SESSION_START"])) {
    $_SESSION["SESSION_START"] = time(); // Absolute session start time
}

// Check if the user has been inactive for too long
if (isset($_SESSION["LAST_ACTIVITY"]) && (time() - $_SESSION["LAST_ACTIVITY"] > $inactive_timeout)) {
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to login after inactivity timeout
    exit();
}

// Check if the total session duration exceeds 12 hours
if (time() - $_SESSION["SESSION_START"] > $max_session_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to login after absolute timeout
    exit();
}

// Update last activity time to reset inactivity timer
$_SESSION["LAST_ACTIVITY"] = time();

// Debugging: Print session data
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
