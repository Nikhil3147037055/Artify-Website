<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <!-- Your HTML content -->

    <?php
    // Your PHP logic
    include("connection.php");

    $id = $_GET['deleteid'];

    $query = "DELETE FROM card WHERE card_id = '$id'";

    if(mysqli_query($connection,$query))
    {
        echo "<script>
        Swal.fire({
            title: 'Deleted!',
            text: 'Your data has been deleted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'card_table.php';
            }
        });
        </script>";
    }
    else
    {
        echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Data could not be deleted.',
            icon: 'error',
            confirmButtonText: 'Try Again'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'veiw_categaries_tables.php';
            }
        });
        </script>";
    }

    ?>
</body>
</html>
