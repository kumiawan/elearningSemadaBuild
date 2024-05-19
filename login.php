<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: layout.php');
        exit();
    } else {
        echo 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="dist/output.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 h-screen">
        <div class="container flex items-center h-full mx-auto p-4">
            <div class="flex mx-auto">
                <form method="post" class="md:w-[40rem] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-3xl font-bold mb-2">Login</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                        <input type="text" name="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="password">
                    </div>
                    <div class="flex flex-col gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <p>Don't have account ? <a class="text-primary" href="register.php">Sign up</a> </p> </div>
                </form>
            </div>
        </div>
    </body>
</html>
