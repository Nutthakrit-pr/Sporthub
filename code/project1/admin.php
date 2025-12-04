<?php
session_start();
include('./api/db.php');



// ดึงข้อมูลนักเรียนจากตาราง student
try {
    $data = $db->query("SELECT * FROM sp_transaction");
    $table = $data->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<nav style="width: 100%;
            height: 7vw;
            display: flex;
            align-items: center;
            background-color: rgb(0, 0, 0); 
            padding: 0 20px;">
    <div style="display: flex; align-items: center;">
        <!-- Admin Text -->
        <h1 style="font-size: 2vw; color: white; margin-bottom: 9px; font-weight: bold">ADMIN</h1>
        <!-- sportHUB Logo -->
        <a href="home.php">
            <img src="img/sporthub.png" 
                alt="sportHUB Logo" 
                style="height: 11vw; margin-left: -45px; ; border-radius: 5px;">
        </a>
    </div>
</nav>

            
        </div>
    </nav>
    
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <table id="studentsTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            transid
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            orderlist
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            amount
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            shipping
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            netamount
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            operation
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            updated
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            username
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($table as $u): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['id']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['transid']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php
                                                                    // Assuming $u['orderlist'] contains the JSON string
                                                                    $orderlist = $u['orderlist']; // JSON string from the database

                                                                    // Decode the JSON string into an associative array
                                                                    $orderItems = json_decode($orderlist, true);

                                                                    // Check if decoding was successful and display the desired values
                                                                    if (is_array($orderItems)) {
                                                                        foreach ($orderItems as $item) {
                                                                            echo "Name: " . htmlspecialchars($item['name']) . "<br>";
                                                                            echo "Count: " . htmlspecialchars($item['count']) . "<br>";
                                                                        }
                                                                    } else {
                                                                        echo "Invalid order list format.";
                                                                    }
                                                                    ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['amount']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['shipping']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['netamount']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <select class="operation-select" data-id="<?php echo $u['id']; ?>">
                                                        <option value="PENDING" <?php echo $u['operation'] === 'PENDING' ? 'selected' : ''; ?>>PENDING</option>
                                                        <option value="SHIPPED" <?php echo $u['operation'] === 'SHIPPED' ? 'selected' : ''; ?>>SHIPPED</option>
                                                    </select>
                                                </td>
                                                
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['updated_at']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($u['username']); ?></td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900 edit-btn"
                                        data-id="<?php echo $u['transid']; ?>"
                                        data-fname="<?php echo $u['orderlist']; ?>"
                                        data-lname="<?php echo $u['amount']; ?>"
                                        data-major="<?php echo $u['shipping']; ?>"
                                        data-dob="<?php echo $u['netamount']; ?>"
                                        data-email="<?php echo $u['operation']; ?>"
                                        data-phone="<?php echo $u['updated_at']; ?>"
                                        data-username="<?php echo $u['username']; ?>">


                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 delete-btn"
                                        data-id="<?php echo $u['id']; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="logout-bar">
                    <a style="flex:1;
                                display:flex;
                                position: fixed;
                                bottom: 0;
                                width: 3vw;
                                padding: 10px;
                                color: black;
                                transition: 0.3s;
                                cursor: pointer;
                                border-radius: 5px;
                                font-weight: bold;"
                            
                                
                    href="logout.php"class='logoutbtn ' img="img/exit.png">logout
                        <img class="imgexit"src="img/exit.png" alt=""></a>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.querySelectorAll('.delete-btn').forEach(button => {
                            button.addEventListener('click', function () {
                                const row = this.closest('tr');
                                const id = this.getAttribute('data-id'); // Get the row ID

                                if (confirm("Are you sure you want to delete this record?")) {
                                    // Make AJAX request to delete the record
                                    fetch('delete_transaction.php', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                        body: new URLSearchParams({ id })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Record deleted successfully.');
                                            row.remove(); // Remove the row from the DOM
                                        } else {
                                            alert('Error deleting record: ' + data.error);
                                        }
                                    })
                                    .catch(error => {
                                        alert('An error occurred: ' + error.message);
                                    });
                                }
                            });
                        });
                    });
                </script>
                <script>
                document.addEventListener('DOMContentLoaded', () => {
    // Existing delete button code...

    // Add event listener for operation select change
                    document.querySelectorAll('.operation-select').forEach(select => {
                        select.addEventListener('change', function () {
                            const id = this.getAttribute('data-id'); // Get the row ID
                            const operation = this.value; // Get the selected value

                            // Send the update request via AJAX
                            fetch('update_operation.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: new URLSearchParams({ id, operation })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Operation updated successfully.');
                                } else {
                                    alert('Error updating operation: ' + data.error);
                                }
                            })
                            .catch(error => {
                                alert('An error occurred: ' + error.message);
                            });
                        });
                    });
                });

                </script>

            
</body>
</html>