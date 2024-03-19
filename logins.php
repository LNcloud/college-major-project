<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
        }

        .li {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .lb {
            width: 100%;
            padding: 10px;
            background-color: #337ab7;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        .lb:hover {
            background-color: #286090;
        }

        .link, p {
            text-align: center;
            margin-top: 20px;
        }

        .link a {
            color: #337ab7;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
require('dbs.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT username, password FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $_SESSION['username'] = $username;
        // Redirect to another page
        header("Location: page2.html"); // Adjust the redirection page as needed
        exit();
    } else {
        echo "<div class='form'><h3>Incorrect username or password.</h3><a href='logins.php'>Login again</a></div>";
    }

    mysqli_stmt_close($stmt);
} else {
?>
    <form class="form" action="" method="post">
        <h1 class="lt">Login</h1>
        <input type="text" class="li" name="username" placeholder="Username" required>
        <input type="password" class="li" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="submit" class="lb">
        <p class="link">Don't have an account? <a href="registrations.php">Register now</a></p>
    </form>
<?php
}
?>
</body>
</html>

