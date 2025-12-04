<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // เชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli('10.1.3.40', '66102010186', '66102010186', '66102010186');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // ค้นหา username ในฐานข้อมูล
    $stmt = $conn->prepare('SELECT password FROM username WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    

    // $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username; // สร้าง session
         

            
            // ตรวจสอบว่า username เป็น admin หรือไม่
            if ($username === 'admin') {
                header('Location: admin.php'); // เปลี่ยนเส้นทางไป admin.php
            } else {
                header('Location: home.php'); // เปลี่ยนเส้นทางไป home.html
            }
            exit;
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        h1 {
            color: #444;
        }

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

        a {
            text-decoration: none;
            color: rgba(254, 103, 2, 0.762);
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>
