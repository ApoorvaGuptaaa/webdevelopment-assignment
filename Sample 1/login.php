<?php
// Include the MySQL connection file
require 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the auth table to check if the username and password match
    $query = "SELECT * FROM auth WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    // Check if the query returned a row
    if (mysqli_num_rows($result) == 1) {
        // Username and password are correct
        // Start the session and store the logged-in username
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to the appropriate page
        header('Location: customer_form.php');
        exit();
    } else {
        // Invalid username or password
        $error = 'Invalid username or password';
    }
}
?>

<!-- HTML login form -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
