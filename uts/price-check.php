<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$totalPrice = "";
$totalDiscount = 0; 
$totalPayment = 0; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $floor = $_POST['floor'];
    $roomType = $_POST['room_type'];
    $days = $_POST['days'];
    $discount = $_POST['discount'];

    $roomPrices = ['standard' => 5000, 'superior' => 6000, 'deluxe' => 7000];
    $basePrice = $roomPrices[$roomType] * $days;
    
    $floorSurcharge = ($floor > 5) ? 1000 : 0;
    
    $totalPrice = $basePrice + $floorSurcharge;

    if ($discount == 'member') {
        $totalDiscount = $totalPrice * 0.1; 
        $totalPayment = $totalPrice - $totalDiscount;
    } elseif ($discount == 'birthday') {
        $totalDiscount = 500; 
        $totalPayment = $totalPrice - $totalDiscount;
    } else {
        $totalPayment = $totalPrice; 
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