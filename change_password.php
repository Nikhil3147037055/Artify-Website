<?php
include("header1.php");
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost"; // your server
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "dism_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$logged_in_user = $_SESSION['name'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $sql = "SELECT password FROM register WHERE name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $logged_in_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Directly compare the old password with the stored password
        if ($old_password === $row['password']) {
            // Update the new password in plain text
            $update_sql = "UPDATE register SET password=? WHERE name=?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $new_password, $logged_in_user);
            
            if ($update_stmt->execute()) {
                $message = "Password changed successfully.";
            } else {
                $message = "Error changing password.";
            }
        } else {
            $message = "Old password is incorrect.";
        }
    } else {
        $message = "User not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <script>
    // Show alert if the password change was successful
    window.onload = function() {
        var message = "<?php echo $message; ?>";
        if (message === "Password changed successfully.") {
            alert(message); // Show an alert box
        }
    }
  </script>
</head>
<body>

<div style="margin-top:10%;" class="container">
  <div class="form-container border rounded p-4 bg-light shadow-sm">
    <h2>Password Change Form</h2>
    
    <!-- Display the message below the form -->
    <?php if (!empty($message)) { ?>
      <div class="alert alert-info">
        <?php echo $message; ?>
      </div>
    <?php } ?>
    
    <form action="change_password.php" method="post">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="old_password" class="form-label">Old Password</label>
          <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Enter Your Old Password" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="new_password" class="form-label">New Password:</label>
          <input type="password" id="new_password" name="new_password" required class="form-control" placeholder="Enter Your New password" required>
        </div>
      </div>
      
      <div class="d-flex justify-content-center">
        <input type="submit" value="Change Password" name="alert" class="btn btn-success">
      </div>
    </form>
  </div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
