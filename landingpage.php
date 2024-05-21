<?php
    session_start();
     
    if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
        header('Location: index.php');
        exit();
    }
    include('conn.php');
    $query = mysqli_query($conn, "SELECT * FROM user WHERE user_id='" . $_SESSION['id'] . "'");
    $row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap");

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            background-image: url('asset/bg-home.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            justify-content: center;
            align-items: center;
            position: relative;
        h4 {
            font-size: 30px;
        }

        p {
            font-size: 32px;
        }
        h2 {
            font-size: 58px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .text {
            text-align: center;
            background-color: transparent;
            color: white;
            text-shadow: 2px 2px 4px black;
            padding: 10px;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .text {
                color: white;
                text-shadow: 2px 2px 4px black;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text">
            <p>SSSSSS</p>
            <h2>DI WEBSITE SAYA</h2>
            <h4>Dari Progdi Teknik Informatika</h4>
        </div>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
