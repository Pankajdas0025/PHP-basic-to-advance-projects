<?php

// Session expiration time (1 hour = 3600 seconds)
$session_expiry = 3600;

if (isset($_SESSION['last_activity'])) {
    // Check inactivity time
    if (time() - $_SESSION['last_activity'] > $session_expiry) {
        // Session expired
        session_unset();
        session_destroy();
        header("Location: index.php?session_expired=true");
        exit();
    } else {
        // Update last activity time if active
        $_SESSION['last_activity'] = time();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
