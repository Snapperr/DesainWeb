<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$totalPrice = "";
$totalDiscount = 0; // Initialize total discount
$totalPayment = 0; // Initialize total payment

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $floor = $_POST['floor'];
    $roomType = $_POST['room_type'];
    $days = $_POST['days'];
    $discount = $_POST['discount'];

    // Base prices for each room type
    $roomPrices = ['standard' => 5000, 'superior' => 6000, 'deluxe' => 7000];
    $basePrice = $roomPrices[$roomType] * $days;
    
    // Floor surcharge
    $floorSurcharge = ($floor > 5) ? 1000 : 0;
    
    // Calculate total price
    $totalPrice = $basePrice + $floorSurcharge;

    // Discount application
    if ($discount == 'member') {
        $totalDiscount = $totalPrice * 0.1; // 10% discount
        $totalPayment = $totalPrice - $totalDiscount;
    } elseif ($discount == 'birthday') {
        $totalDiscount = 500; // Fixed discount
        $totalPayment = $totalPrice - $totalDiscount;
    } else {
        $totalPayment = $totalPrice; // No discount
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Check - ABC Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">ABC Hotel</div>
        <nav>
            <a href="home.php">Home</a>
            <a href="price-check.php">Price Check</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="content">
        <h2>Input to Check The Price</h2>
        <form method="POST">
            <input type="number" name="floor" placeholder="Floor" required>
            <select name="room_type" required>
                <option value="standard">Standard</option>
                <option value="superior">Superior</option>
                <option value="deluxe">Deluxe</option>
            </select>
            <input type="number" name="days" placeholder="Day(s)" required>
            <select name="discount">
                <option value="none">None</option>
                <option value="member">Member</option>
                <option value="birthday">Birthday</option>
            </select>
            <button type="submit">CHECK</button>
        </form>

        <?php if ($totalPrice): ?>
            <p>Total Price: <?php echo number_format($totalPrice, 2); ?></p>
            <p>Total Discount: <?php echo number_format($totalDiscount, 2); ?> </p>
            <p style="color: red; margin-top: 20px;">Total Payment: <?php echo number_format($totalPayment, 2); ?></p>
        <?php endif; ?>
    </div>

    <footer>
        Website Footer
    </footer>
</body>
</html>