<?php
include('./api/db.php');

try {
    // Add the user_id column
    
    // Add the foreign key constraint
    $db->exec("
        ALTER TABLE sp_transaction
        ADD CONSTRAINT fk_username
        FOREIGN KEY (username) REFERENCES username(username)
        ON DELETE CASCADE ON UPDATE CASCADE
    ");

    echo "Column and foreign key added successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>