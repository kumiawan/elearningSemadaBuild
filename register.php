<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashPassword);

    if ($stmt->execute()) {
        echo 'Registration successful!';
    } else {
        echo 'Error: Could not register.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link href="dist/output.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 h-screen">
        <div class="container flex items-center h-full mx-auto p-4">
            <div class="flex mx-auto">
                <form method="post" class="md:w-[40rem] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-3xl font-bold mb-2">Register</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                        <input type="text" name="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Password">
                    </div>
                    <div class="flex flex-col gap-2">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <p >Already have account ? <a class="text-primary" href="login.php">sign in</a> </p> </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
