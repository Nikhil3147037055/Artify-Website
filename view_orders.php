<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    include("header.php");
    include("connection.php");

    // Updated query to fetch required data from both products and orders tables
    $query = "SELECT *
              FROM products
              JOIN orders ON orders.product_id = products.p_id";
    
    $grandtotal = 0;
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="container">
            <h1 class="text-center my-5">ORDER VIEW</h1>
            <table class="table table-bordered text-center">
                <thead>
                    <td>ID</td>
                    <td>IMAGE</td>
                    <td>NAME</td>
                    <td>PRICE</td>
                    <td>QTY</td>
                    <td>TOTAL</td>
                    <td>Status</td>
                    <td colspan="2"></td>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    while ($rows = mysqli_fetch_assoc($result)) {
                        // Calculate the total for each product based on price and ordered quantity
                        $total = $rows['p_price'] * $rows['product_qty'];
                        $grandtotal += $total;
                    ?>
                        <tr>
                            <td><?php echo $rows['product_id']; ?></td>
                            <td>
                                <img style="width:150px; height:100px;" src="products/<?php echo $rows['p_img']; ?>" alt="">
                            </td>
                            <td><?php echo $rows['p_name']; ?></td>
                            <td><?php echo $rows['p_price']; ?></td>
                            <td><?php echo $rows['product_qty']; // Display the product quantity from orders table ?></td>
                            <td><?php echo $total; // Show total for each product ?></td>

                            <form action="../website/code.php" method="POST">
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="0" <?php echo ($rows['status'] == 0) ? 'selected' : ''; ?>>Pending</option>
                                        <option value="1" <?php echo ($rows['status'] == 1) ? 'selected' : ''; ?>>Deliver</option>
                                    </select>
                                </td>

                                <td>
                                    <input type="hidden" name="p_id" value="<?php echo $rows['p_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
                                    <button class="btn btn-success" type="submit" name="update_status">
                                        Update Status
                                    </button>
                                </td>
                            </form>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>

    <?php
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
