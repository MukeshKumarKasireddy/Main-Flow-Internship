<?php
require_once 'includes/config.php';
require_once 'includes/auth_functions.php';

redirect_if_not_logged_in();
?>

<?php include 'includes/header.php'; ?>

<div class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
    <p>This is your protected dashboard page.</p>
</div>

<?php include 'includes/footer.php'; ?>