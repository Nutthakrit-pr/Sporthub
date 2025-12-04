<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $conn = new mysqli('10.1.3.40', '66102010186', '66102010186', '66102010186');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare('INSERT INTO username (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: Username might already exist.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin:0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
}

/* Header */
h1 {
    color: #444;
}

/* Forms */
form {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 300px;
    width: 100%;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background: rgba(254, 103, 2, 0.762);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: rgb(209, 16, 16);
}

/* Links */
a {
    text-decoration: none;
    color: rgba(254, 103, 2, 0.762);
}

a:hover {
    text-decoration: underline;
}

/* Logout Button */
a.logout {
    margin-top: 20px;
    display: inline-block;
    background: #f44336;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-align: center;
}

a.logout:hover {
    background: #d32f2f;
}
    </style>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>
