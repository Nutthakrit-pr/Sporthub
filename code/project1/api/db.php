<?php
    // header('Content-Type: application/json');
   
    
    try {
    $db = new PDO("mysql:host=10.1.3.40;dbname=66102010186", "66102010186", "66102010186");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    }


//     function checkAuth()
// {
//     session_start();
//     if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//         header("Location: login.php");
//         exit;
//     }
// }
?>
