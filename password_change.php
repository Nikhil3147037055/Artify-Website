<?php
// Include your database connection
include('connection.php');

// Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables for displaying messages
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($new_password != $confirm_password) {
        $message = "New password and confirm password do not match!";
    } else {
        // Fetch the current password from the database
        $sql = "SELECT password FROM register WHERE id = ?";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Error preparing SQL statement: " . $connection->error);
        }

        $stmt->bind_param("s", $employee_id);
        if (!$stmt->execute()) {
            die("Error executing SQL statement: " . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify current password
            if (password_verify($current_password, $hashed_password)) {
                // Hash the new password
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update both password and New_password in the database
                $update_sql = "UPDATE register SET password = ?, New_password = ? WHERE id = ?";
                $update_stmt = $connection->prepare($update_sql);
                if (!$update_stmt) {
                    die("Error preparing UPDATE statement: " . $connection->error);
                }

                // Bind the new hashed password and employee ID
                $update_stmt->bind_param("sss", $new_hashed_password, $new_password, $employee_id);
                if ($update_stmt->execute()) {
                    $message = "Password changed successfully!";
                } else {
                    $message = "Error updating password: " . $update_stmt->error;
                }
            } else {
                $message = "Current password is incorrect!";
            }
        } else {
            $message = "Employee ID not found!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" required><br><br>

        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required><br><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="Change Password">
    </form>
</body>
</html>
