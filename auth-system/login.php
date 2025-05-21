<?php
require_once 'includes/config.php';
require_once 'includes/auth_functions.php';

redirect_if_logged_in();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username_or_email = trim($_POST['username_or_email']);
    $password = $_POST['password'];
    
    if (empty($username_or_email) || empty($password)) {
        $errors[] = "All fields are required";
    }
    
    if (empty($errors)) {
        if (login_user($pdo, $username_or_email, $password)) {
            $_SESSION['message'] = "Login successful!";
            $_SESSION['message_type'] = 'success';
            header('Location: dashboard.php');
            exit();
        } else {
            $errors[] = "Incorrect username/email or password";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (!empty($errors)): ?>
    <div class="message error">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="login.php" method="post">
    <div class="form-group">
        <label for="username_or_email">Username or Email</label>
        <input type="text" id="username_or_email" name="username_or_email" required value="<?php echo htmlspecialchars($username_or_email ?? ''); ?>">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="signup.php">Sign up here</a></p>

<?php include 'includes/footer.php'; ?>