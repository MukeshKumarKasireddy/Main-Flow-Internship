<?php
require_once 'includes/config.php';
require_once 'includes/auth_functions.php';

redirect_if_logged_in();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    
    if (empty($errors)) {
        $user_id = register_user($pdo, $username, $email, $password);
        
        if ($user_id) {
            $_SESSION['message'] = "Registration successful! Please login.";
            $_SESSION['message_type'] = 'success';
            header('Location: login.php');
            exit();
        } else {
            $errors[] = "Username or Email already exists";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Sign Up</h2>

<?php if (!empty($errors)): ?>
    <div class="message error">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="signup.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email ?? ''); ?>">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    
    <button type="submit">Sign Up</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>

<?php include 'includes/footer.php'; ?>