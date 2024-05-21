<?php
session_start();
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <!-- <link rel="stylesheet" href="../CSS/style-contactform.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
        body {
            background: #191919;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: "Montserrat", sans-serif;
            font-size: 10px;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 14px 28px rgba(246, 4, 4, 0.25), 0 10px 10px rgba(254, 3, 3, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 300px;
            min-width: 370px;
        }
        .card-container {
            display: flex;
        }
        .right {
            display: flex;
            flex: 1;
            height: 400px;
            background-color: #fff;
            justify-content: center;
            align-items: center;
        }
        .right-container {
            width: 70%;
            height: 80%;
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        input, textarea {
            background-color: #eee;
            border: none;
            padding: 8px 15px;
            margin: 5px 0;
            width: 60%;
            font-size: 0.8rem;
        }
        .tombol {
            border-radius: 20px;
            border: 1px solid #191919;
            background-color: #191919;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 5px 5px rgba(0, 0, 0, 0.22);
            text-transform: uppercase;
            transition: transform 80ms ease-out;
        }
        .tombol:hover {
            opacity: 0.7;
        }
        @media (max-width: 613px) {
            .container {
                max-width: 80%;
            }
            h2 {
                font-size: 1.5em;
            }
        }
        .btn {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top:10px;
            margin-bottom: 10px;
            margin-left: -100px;
        }
        .remember-me input {
            margin-right: -300px;
        }
        .form-regist{
            font-size: 15px;
            color: black;
            margin-top: 60px;
            margin-left: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-container">
            <div class="right">
                <div class="right-container">
                    <form id="regist" action="regist.php" method="post" onSubmit="return validasi()">
                        <h2>Silahkan Daftar</h2>
                        <input type="text" value="<?php if (isset($_COOKIE['user'])) { echo $_COOKIE['user']; } ?>" name="username" id="inputEmail" placeholder="Username">
                        <input type="text" value="<?php if (isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" name="email" id="inputEmail" placeholder="Email Address">
                        <input type="password" value="<?php if (isset($_COOKIE['pass'])) { echo $_COOKIE['pass']; } ?>" name="password" id="inputPassword" placeholder="Password">
                        <input type="password" value="<?php if (isset($_COOKIE['pass2'])) { echo $_COOKIE['pass2']; } ?>" name="password2" id="inputPassword2" placeholder="Konfirmasi Password">
                        
                        <input type="submit" class="btn" value="Daftar" name="daftar">
                        <div>
                            <span style="font-size: 15px; color: red; margin: 10px 0 10px 0;">    
                                <?php
                                    if (isset($_SESSION['message'])){
                                    echo $_SESSION['message'];
                                    }
                                     unset($_SESSION['message']);
                                ?>
                            </span>
                        </div>
                    </form>
                    <p class="form-regist">Sudah Ada Akun ? Login <a href="index.php">disini</a> </p>

                </div>
            </div>
        </div>
    </div>

    <script>
        function validasi() {
            const username = document.getElementById('inputEmail').value;
            const password = document.getElementById('inputPassword').value;

            if (username === '' || password === '') {
                alert('Username and Password must be filled out');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
