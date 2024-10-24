<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ABC Hotel</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            let images = ["banner1.jpg", "banner2.jpg", "banner3.jpg"];
            let index = 0;
            setInterval(function() {
                $('#banner').attr('src', images[index]);
                index = (index + 1) % images.length;
            }, 2000);
        });
    </script>
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
        <img id="banner" src="banner1.jpg" alt="Banner Image">
        <h2>Hotel Profile</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
    </div>

    <footer>
        Website Footer
    </footer>
</body>
</html>