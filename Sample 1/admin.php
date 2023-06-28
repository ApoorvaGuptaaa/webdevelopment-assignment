<?php
// Include the MySQL connection file
require 'connection.php';

// Retrieve data for admin view
$query = "SELECT * FROM customer";
$result = mysqli_query($connection, $query);

// Calculate totals for Quantity, Weight, and Box Count
$customer1Query = "SELECT SUM(quantity) AS totalQuantity, SUM(weight) AS totalWeight, SUM(box_count) AS totalBoxCount FROM customer WHERE owner = 'customer1'";
$customer2Query = "SELECT SUM(quantity) AS totalQuantity, SUM(weight) AS totalWeight, SUM(box_count) AS totalBoxCount FROM customer WHERE owner = 'customer2'";
$totalQuery = "SELECT SUM(quantity) AS totalQuantity, SUM(weight) AS totalWeight, SUM(box_count) AS totalBoxCount FROM customer";

$customer1Result = mysqli_query($connection, $customer1Query);
$customer2Result = mysqli_query($connection, $customer2Query);
$totalResult = mysqli_query($connection, $totalQuery);

$customer1Data = mysqli_fetch_assoc($customer1Result);
$customer2Data = mysqli_fetch_assoc($customer2Result);
$totalData = mysqli_fetch_assoc($totalResult);
?>

<!-- HTML admin view -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin View</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>

    <h3>Customer Data</h3>
    <table>
        <tr>
            <th>Item/Customer</th>
            <th>Quantity</th>
            <th>Weight</th>
            <th>Box Count</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['item']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                <td><?php echo $row['box_count']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h3>Customer1 Totals</h3>
    <ul>
        <li>Total Quantity: <?php echo $customer1Data['totalQuantity']; ?></li>
        <li>Total Weight: <?php echo $customer1Data['totalWeight']; ?></li>
        <li>Total Box Count: <?php echo $customer1Data['totalBoxCount']; ?></li>
    </ul>

    <h3>Customer2 Totals</h3>
    <ul>
        <li>Total Quantity: <?php echo $customer2Data['totalQuantity']; ?></li>
        <li>Total Weight: <?php echo $customer2Data['totalWeight']; ?></li>
        <li>Total Box Count: <?php echo $customer2Data['totalBoxCount']; ?></li>
    </ul>

    <h3>Total for Customer1 & Customer2</h3>
    <ul>
        <li>Total Quantity: <?php echo $totalData['totalQuantity']; ?></li>
        <li>Total Weight: <?php echo $totalData['totalWeight']; ?></li>
        <li>Total Box Count: <?php echo $totalData['totalBoxCount']; ?></li>
    </ul>
</body>
</html>
