<?php
// Include the MySQL connection file
require 'connection.php';

// Rest of your form submission code

// Retrieve the submitted form data
$orderDate = $_POST['order_date'];
$company = $_POST['company'];
$owner = $_POST['owner'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$requestShipment = isset($_POST['request_shipment']) ? 1 : 0;
$trackingID = $_POST['tracking_id'];
$shipmentSize = $_POST['shipment_size'];
$boxCount = $_POST['box_count'];
$specification = $_POST['specification'];
$checklistQuantity = $_POST['checklist_quantity'];

// Prepare and execute the INSERT statement to store the data in the customer table
$query = "INSERT INTO customer (order_date, company, owner, item, quantity, weight, request_shipment, tracking_id, shipment_size, box_count, specification, checklist_quantity) VALUES ('$orderDate', '$company', '$owner', '$item', $quantity, $weight, $requestShipment, '$trackingID', '$shipmentSize', $boxCount, '$specification', $checklistQuantity)";
mysqli_query($connection, $query);

// Provide feedback to the user upon successful data submission
$successMessage = "Data submitted successfully!";
?>

<!-- HTML feedback page -->
<!DOCTYPE html>
<html>
<head>
    <title>Submission Successful</title>
</head>
<body>
    <h2>Data Submission</h2>
    <?php if (isset($successMessage)): ?>
        <p><?php echo $successMessage; ?></p>
    <?php endif; ?>
</body>
</html>
